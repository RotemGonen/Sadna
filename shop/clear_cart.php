<?php
include '../connection.php';

$username = $_GET['username'];


// Update the SQL query to use prepared statements with parameter binding
$sql = "DELETE FROM shop_reservations WHERE  username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iss", $productId, $username, $orderId); // "iss" for integer and string parameters
$response = array();

if ($stmt->execute()) {
    // Product deleted successfully
    $response['status'] = 'success';
    $response['message'] = 'All products are deleted from cart successfully.';
} else {
    // Failed to delete product
    $response['status'] = 'error';
    $response['message'] = 'Failed to delete products from cart.';
}

// Close database connection
mysqli_close($conn);

// Return JSON response
echo json_encode($response);
?>
