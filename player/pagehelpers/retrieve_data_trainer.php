<?php
// the reserve field use this php file
// Connect to database
$conn = mysqli_connect("localhost", "irrotema_test", "12345", "irrotema_sadna");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if data is being received correctly
if (isset($_POST['location'], $_POST['type'], $_POST['date'], $_POST['starttime'], $_POST['endtime'])) {
    $location = $_POST['location'];
    $type = $_POST['type'];
    $date = $_POST['date'];
    $starttime = $_POST['starttime'];
    $endtime = $_POST['endtime'];

    $sql = "SELECT t.*, r.*
    FROM trainer_availability t
    JOIN registrations r ON t.trainer_username = r.username
    WHERE t.sport_type = '$type'
    AND t.city = '$location'
    AND t.startdate <= '$date'
    AND t.enddate >= '$date'
    AND NOT EXISTS (
        SELECT 1
        FROM field_reservation fr
        WHERE fr.trainer_username = t.trainer_username
        AND fr.date = '$date'
        AND (
            ('$starttime' BETWEEN fr.starttime AND fr.endtime
            OR '$endtime' BETWEEN fr.starttime AND fr.endtime)
            OR (fr.starttime < '$starttime' AND fr.endtime > '$endtime')
            OR ('$starttime' < fr.starttime AND '$endtime' > fr.endtime)
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
