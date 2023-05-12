<?php
session_start();

// Connect to database
$conn = mysqli_connect("localhost", "irrotema_test", "12345", "irrotema_sadna");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get logged in trainer's username from session
$username = $_SESSION['username'];

// Select field reservations where trainer username is the same as logged in trainer's username and approval is false
$sql = "SELECT fr.*, r.first_name AS player_first_name, r.last_name AS player_last_name, r.phone AS player_phone,sf.*
        FROM field_reservation fr
        LEFT JOIN registrations r ON fr.player_username = r.username 
        JOIN sportfield sf ON fr.field_id = sf.id
        WHERE fr.trainer_username = '$username' 
        AND fr.approval = 'false'";

$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

$data = mysqli_fetch_all($result, MYSQLI_ASSOC);
echo json_encode($data);

// Close database connection
mysqli_close($conn);
