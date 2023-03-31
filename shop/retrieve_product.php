<?php
// this file is getting the locations in the table and using it in the location search bar
$conn = mysqli_connect("localhost", "test", "12345", "sadna");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$q = $_GET['q'];

$sql = "SELECT DISTINCT name FROM products WHERE name LIKE '" . $q . "%'";
$result = $conn->query($sql);

$data = array();

while ($row = $result->fetch_assoc()) {
    $data[] = array(
        'name' => $row['name']
    );
}

echo json_encode($data);

$conn->close();
?>
