<?php
include '../connection.php';


// get data
$price = $_GET['price'];
$enddate = $_GET['datepickere'];
$startdate = $_GET['datepickers'];
$sport_type = $_GET['sport_type'];
$city = $_GET['city'];
$username = $_GET['username'];
$oneDay = 24 * 60 * 60; // one day in seconds
$startdate = date("Y-m-d", strtotime($startdate . " +1 day"));
$enddate = date("Y-m-d", strtotime($enddate . " +1 day"));
// insert data into table
$sql = "INSERT INTO trainer_availability (trainer_price,enddate,startdate,sport_type,city,trainer_username) VALUES 
('$price','$enddate','$startdate','$sport_type','$city','$username')";

if (mysqli_query($conn, $sql)) {
    // it passes the error in the diffrent page
    echo "Query executed successfully";
} else {
    echo "Error: " . mysqli_error($conn);
}

// close database connection
mysqli_close($conn);
