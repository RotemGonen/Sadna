<?php
// the reserve field use this php file
// Connect to database
$conn = mysqli_connect("localhost", "test", "12345", "sadna");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve data based on selected location
if (isset($_POST['location']) && isset($_POST['type'])) {
    $location = $_POST['location'];
    $type = $_POST['type'];
    $sql = "SELECT * FROM sportfield WHERE location = '$location' AND type = '$type'";
    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($data);
}
// Close database connection
mysqli_close($conn);
?>