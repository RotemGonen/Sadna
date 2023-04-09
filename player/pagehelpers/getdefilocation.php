<?php
// Set up database connection
$mysqli = new mysqli("localhost", "test", "12345", "sadna");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}

// Retrieve location data from POST variable
$location = $_POST['location'];

// Execute query and retrieve results
$query = "SELECT * FROM defibrillator WHERE location_city = '$location'";
$result = $mysqli->query($query);

// Create array to hold query results
$results = array();

// Loop through query results and add to array
while ($row = $result->fetch_assoc()) {
    array_push($results, $row);
}

// Output results as JSON
header('Content-Type: application/json');
echo json_encode($results);

// Close database connection
$mysqli->close();
