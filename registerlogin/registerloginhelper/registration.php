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

$username = $_POST['username'];
$password = $_POST['password'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$date_of_birth = $_POST['date_of_birth'];
$city = $_POST['city'];
$email = $_POST['email'];
$account_type = $_POST['account_type'];
$phone = $_POST['phone'];
if (isset($_POST['submit'])) {

    // perform the database insertion
    $sql = "INSERT INTO registrations (photo_path, username, password, first_name, last_name, date_of_birth, city, email, account_type, phone)
    VALUES ('default-avatar.png', '$username', '$password', '" .  ucwords(strtolower($first_name)) . "', '" . ucwords(strtolower($last_name)) . "', '$date_of_birth', '$city', '$email', '$account_type', '$phone')";
    if (mysqli_query($conn, $sql)) {
        header("Location: http://localhost/Sadna/registerlogin/loginpage.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
tesstt