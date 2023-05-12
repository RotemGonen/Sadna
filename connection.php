<?php
$host = "localhost"; // database host
$username = "irrotema_test"; // database username
$password = "12345"; // database password
$dbname = "irrotema_sadna"; // database name

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
