<?php
header('Content-Type: text/html; charset=utf-8');

// connect to the database (replace "hostname", "username", "password", and "dbname" with your actual database credentials)
$mysqli = new mysqli("localhost", "irrotema_test", "12345", "irrotema_sadna");
$mysqli->set_charset("utf8");

// check for errors
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}
$username = $_GET['username'];
// query the database for the data
$query = "SELECT *
FROM field_reservation
JOIN sportfield ON field_reservation.field_id = sportfield.id 
JOIN registrations ON registrations.username = field_reservation.trainer_username
WHERE field_reservation.player_username = '$username' 
ORDER BY field_reservation.date ASC, field_reservation.starttime ASC;
";
$result = $mysqli->query($query);

// check for errors
if (!$result) {
    echo "Failed to query data from MySQL: " . $mysqli->error;
    exit();
}

// create an array to hold the data
$data = array();

// loop through the result set and add each row to the data array
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

// return the data as JSON
echo json_encode(array("data" => $data));

// close the database connection
$mysqli->close();
