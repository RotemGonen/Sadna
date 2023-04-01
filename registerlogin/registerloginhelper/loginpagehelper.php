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

//query the database to retrieve user information
$query = "SELECT * FROM registrations WHERE username='$username'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) == 1) {
    //if the username is found in the database, verify the password
    $row = mysqli_fetch_assoc($result);
    if ($password == $row['password']) {
        //password is correct, create session variable and redirect to desired page
        session_start();
        $_SESSION['authenticated'] = true;
        $_SESSION['username'] = $username;
        $_SESSION['first_name'] = $row['first_name'];
        $_SESSION['photo_path'] = $row['photo_path'];
        $_SESSION['account_type'] = $row['account_type'];
        if ($row['account_type'] == 'player') {
            header("Location: http://localhost/Sadna/player/playerpage.php");
            exit();
        } else {
            header("Location: trainerpage.php");
        }
    }
}
$error = "Invalid password or username.";

header("Location: http://localhost/Sadna/registerlogin/loginpage.php?error=" . urlencode($error));
//close the database connection

mysqli_close($conn);
