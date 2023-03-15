<?php
// the reserve field use this php file
// Connect to database
$conn = mysqli_connect("localhost", "test", "12345", "sadna");

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

    $sql = "SELECT sportfield.*
    FROM sportfield
    LEFT JOIN field_reservation
    ON sportfield.id = field_reservation.id
    AND field_reservation.date = '$date'
    AND NOT (
        field_reservation.endtime BETWEEN '$starttime' AND '$endtime' OR
        field_reservation.starttime BETWEEN '$starttime' AND '$endtime' OR
        (field_reservation.starttime < '$starttime' AND field_reservation.endtime > '$endtime')
    )
    WHERE sportfield.location = '$location'
    AND sportfield.type = '$type'
    AND field_reservation.id IS NULL
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
?>