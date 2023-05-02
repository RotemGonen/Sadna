<?php
include '../connection.php';


// get data
$price = $_GET['price'];
$endtime = $_GET['endtime'];
$starttime = $_GET['starttime'];
$enddate = $_GET['datepickere'];
$startdate = $_GET['datepickers'];
$sport_type = $_GET['sport_type'];
$city = $_GET['city'];
$username = $_GET['username'];
// insert data into table
$sql = "INSERT INTO trainer_availability (trainer_price,endtime,starttime,enddate,startdate,sport_type,city,trainer_username) VALUES 
('$price', '$endtime', '$starttime','$enddate','$startdate','$sport_type','$city','$username')";

if (mysqli_query($conn, $sql)) {
    // it passes the error in the diffrent page
    echo "Query executed successfully";
} else {
    echo "Error: " . mysqli_error($conn);
}

// close database connection
mysqli_close($conn);
?>