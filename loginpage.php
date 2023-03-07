<?php
$host = "localhost"; // database host
$username = "test"; // database username
$password = "12345"; // database password
$dbname = "sadna"; // database name

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = $_POST['username'];
$password = $_POST['password'];
$login_time = date('Y-m-d H:i:s');

// Query the registration table to see if the username and password exists
$sql_user = "SELECT * FROM registrations WHERE username='$username'";
$result_user = $conn->query($sql_user);
$sql_pass = "SELECT * FROM registrations WHERE password='$password'";
$result_pass = $conn->query($sql_user);

// If the username and password exists, check the login table for a matching email and password
if ($result_user->num_rows > 0 && $result_pass->num_rows > 0) {
    echo "User is authenticated";
    echo "<br>";
    // perform the database insertion
    $sql = "INSERT INTO logins (username, password, login_time)
    VALUES ('$username', '$password', '$login_time')";
    if (mysqli_query($conn, $sql)) {
        echo "login successful"; }
 }
else 
    echo "Incorrect email or password";

 ?>