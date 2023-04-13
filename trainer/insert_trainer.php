<?php
// connect to database
$conn = mysqli_connect("localhost", "test", "12345", "sadna");

// check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// get data
$id = $_POST['id'];
$date = $_POST['date'];
$starttime = $_POST['starttime'];
$endtime = $_POST['endtime'];
$datepickers = $_POST['datepickers'];
$datepickere=  $_POST['datepickere']; 
$price= $_POST['price']; 
$trainer_username = $_POST['trainer_username'];
if (isset($_POST['trainer_username']))
    $trainer_username = $_POST['trainer_username'];
// insert data into table
$sql = "INSERT INTO trainer_availability (city, sport_type, startdate, enddate, starttime, endtime,  trainer_username	) VALUES ('$id', '$date', '$starttime', '$endtime','$player_username','$trainer_username')";

if (mysqli_query($conn, $sql)) {
    // it passes the error in the diffrent page
    echo "Query executed successfully";
} else {
    echo "Error: " . mysqli_error($conn);
}

// close database connection
mysqli_close($conn);
?>