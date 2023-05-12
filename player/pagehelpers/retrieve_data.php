<?php
header('Content-Type: text/html; charset=utf-8');

// Connect to database
$conn = mysqli_connect("localhost", "irrotema_test", "12345", "irrotema_sadna");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Set character set for the connection
mysqli_set_charset($conn, "utf8");
// Check if data is being received correctly
if (isset($_POST['location'], $_POST['type'], $_POST['date'], $_POST['starttime'], $_POST['endtime'])) {
    $location = $_POST['location'];
    $type = $_POST['type'];
    $date = $_POST['date'];
    $starttime = $_POST['starttime'];
    $endtime = $_POST['endtime'];

    $sql = "SELECT s.*
    FROM sportfield s
    WHERE s.location = '$location'
    AND s.type = '$type'
    AND NOT EXISTS (
        SELECT 1
        FROM field_reservation r
        WHERE r.field_id = s.id
        AND r.date = '$date'
        AND (
            ('$starttime' BETWEEN r.starttime AND r.endtime
            OR '$endtime' BETWEEN r.starttime AND r.endtime)
            OR (r.starttime < '$starttime' AND r.endtime > '$endtime')
            OR ('$starttime' < r.starttime AND '$endtime' > r.endtime)
        )
    )
    ";

    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }

    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($data);
} else {
    echo "Error: Data not received correctly";
}

// Close database connection
mysqli_close($conn);
