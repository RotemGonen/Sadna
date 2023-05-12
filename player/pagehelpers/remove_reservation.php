<?php
// get the row id from the POST request
$reservation_Id = $_POST['reservation_Id'];

// make a database connection
$conn = mysqli_connect("localhost", "irrotema_test", "12345", "irrotema_sadna");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// delete the row from the database
$sql = "DELETE FROM field_reservation WHERE reservation_Id = $reservation_Id";
if ($conn->query($sql) === TRUE) {
    echo "Reservation removed successfully";
} else {
    echo "Error removing reservation: " . $conn->error;
}

// close the database connection
$conn->close();
