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
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$date_of_birth = $_POST['date_of_birth'];
$state = $_POST['state'];
$city = $_POST['city'];
$email = $_POST['email'];
$account_type = $_POST['account_type'];

if (isset($_POST['submit'])) {

    // perform the database insertion
    $sql = "INSERT INTO registrations (username, password, first_name, last_name, date_of_birth, state, city, email, account_type)
    VALUES ('$username', '$password', '$first_name', '$last_name', '$date_of_birth', '$state', '$city', '$email', '$account_type')";
    if (mysqli_query($conn, $sql)) {
        echo "Registration successful";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>