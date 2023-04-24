<?php
include '../connection.php';

// Retrieve products from database
$sql = "SELECT * FROM products";
$result = $conn->query($sql);

// Create an array to hold the products
$products = array();

if ($result->num_rows > 0) {
    // Loop through each row in the result set
    while ($row = $result->fetch_assoc()) {
        // Encode the picture data as a Base64 string
        $picture_data = base64_encode($row['picture']);
        // Add each product to the array
        $products[] = array(
            'picture' => $picture_data,
            'name' => $row['name'],
            'content' => $row['content'],
            'price' => $row['price'],
            'id' => $row['product_id']
        );
    }
}

// Close the database connection
$conn->close();

// Return the products as JSON
header('Content-Type: application/json');
echo json_encode($products);
?>
