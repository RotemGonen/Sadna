<?php
// Connect to database
$conn = mysqli_connect("localhost", "test", "12345", "sadna");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}



// Retrieve data based on selected location
if (isset($_POST['location'])) {
    $location = $_POST['location'];
    $sql = "SELECT * FROM sportfields WHERE location = '$location'";
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($data);
}
// Close database connection
mysqli_close($conn);
?>