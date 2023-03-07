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

if (isset($_POST['submit'])) {

    // perform the database insertion
    $sql = "INSERT INTO logins (username, password, login_time)
    VALUES ('$username', '$password', '$login_time')";
    // if (mysqli_query($conn, $sql)) {
    //     echo "login successful";
    // } else {
    //     echo "Error: " . mysqli_error($conn);
    // }
    if ($conn->query($sql)==FALSE){
        echo "Can not login. Error is: ".
            $conn->error;
        }
    else
        echo "login succeesful";
}
ini_set('display_errors', 1);
error_reporting(E_ALL);

?>