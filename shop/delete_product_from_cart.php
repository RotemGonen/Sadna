<?php
include '../connection.php';

// Retrieve product information from AJAX request
$productId = $_GET['productId'];
$username = $_GET['username'];
$orderId = $_GET['orderId'];

// Update the SQL query to use prepared statements with parameter binding
$sql = "DELETE FROM shop_reservations WHERE product_id = ? AND username = ? AND order_Id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iss", $productId, $username, $orderId); // "iss" for integer and string parameters
$response = array();

if ($stmt->execute()) {
    // Product deleted successfully
    $response['status'] = 'success';
    $response['message'] = 'Product deleted from cart successfully.';
} else {
    // Failed to delete product
    $response['status'] = 'error';
    $response['message'] = 'Failed to delete product from cart.';
}

// Close database connection
mysqli_close($conn);

// Return JSON response
echo json_encode($response);
?>
