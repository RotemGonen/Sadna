<?php
include '../connection.php';


// Retrieve product information from AJAX request
$productId = $_GET['productId'];
$productName = $_GET['productName'];
$quantity = $_GET['quantity'];
$username = $_GET['username'];


// Get product details from database
$sql = "SELECT * FROM products WHERE product_id = $productId";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $productName = $row['name'];
    $productPicture = base64_encode($row['picture']);
    $productPrice = $row['price'];
    $dateTime = date("Y-m-d H:i:s");

    if ($quantity > 0) {
        // Insert order details into orders table
        $sql = "INSERT INTO shop_reservations (username, product, product_id, picture, price, quantity, date_time) 
                VALUES ('$username', '$productName', $productId, '$productPicture', '$productPrice', '$quantity', '$dateTime')";

        if ($conn->query($sql) === TRUE) {
            echo "Order placed successfully.";
        } else {
            echo "Failed to place order. Error: " . $conn->error;
        }
    }
} else {
    echo "Failed to retrieve product details.";
}

$conn->close();
