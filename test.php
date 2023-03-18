<?php
// connect to the database (replace "hostname", "username", "password", and "dbname" with your actual database credentials)
$mysqli = new mysqli("localhost", "test", "12345", "sadna");

// check for errors
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}

// query the database for the data
$query = "SELECT * FROM field_reservation";
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
?>