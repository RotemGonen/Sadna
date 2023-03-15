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

// insert data into table
$sql = "INSERT INTO field_reservation (id,date, starttime, endtime) VALUES ('$id', '$date', '$starttime', '$endtime')";

if (mysqli_query($conn, $sql)) {
    echo "HI";
} else {
    echo "Error: " . mysqli_error($conn);
}

// close database connection
mysqli_close($conn);
?>