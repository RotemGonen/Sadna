<?php
// Get the form data
$username = $_POST['username'];
$password = $_POST['password'];
$city = $_POST['city'];

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


// Check if a file was uploaded
if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] == 0) {
    // Get the file name and temporary name
    $file_name = $_FILES['profile_picture']['name'];
    $file_tmp = $_FILES['profile_picture']['tmp_name'];

    // Get the file extension
    $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

    // Set the new file name as the username
    $new_file_name = $username . '.' . $file_ext;

    // Set the upload directory
    $upload_dir = "C:/xampp/htdocs/Sadna/images/profile/";


    if (move_uploaded_file($_FILES['profile_picture']['tmp_name'], $upload_dir . $new_file_name)) {
        // File was moved successfully, update the database with the file name
        $sql .= "photo_path='$new_file_name', ";
        session_start();
        $_SESSION['photo_path'] = $new_file_name;
    } else {
        // There was an error moving the file
        echo "Error uploading profile picture";
    }
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
