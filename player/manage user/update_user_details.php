<?php
// Get the form data
$username = $_POST['username'];
$password = $_POST['password'];
$city = $_POST['city'];
$account_type = $_POST['account_type'];

// Validate the form data (optional)

// Connect to the database
$conn = mysqli_connect("localhost", "test", "12345", "sadna");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Build the SQL query
$sql = "UPDATE registrations SET ";
if (!empty($password)) {
    $sql .= "password='$password', ";
}
if (!empty($city)) {
    $sql .= "city='$city', ";
}
if (!empty($account_type)) {
    $sql .= "account_type='$account_type', ";
}
$sql = rtrim($sql, ', ');
$sql .= " WHERE username='$username'";

// Execute the SQL query
if (mysqli_query($conn, $sql)) {
    // Return a success message to the AJAX request
    echo "User details updated successfully!";
} else {
    // Return an error message to the AJAX request
    echo "Error updating user details: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>