<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the reservation ID and action from the request body
    $reservation_id = $_POST['reservation_id'];
    $action = $_POST['action'];

    // Create a database connection
    $conn = mysqli_connect("localhost", "irrotema_test", "12345", "irrotema_sadna");

    if (!$conn) {
        die('Failed to connect to database: ' . mysqli_connect_error());
    }

    // Update or delete the reservation based on the action
    if ($action == 'confirm') {
        // Set the approval column to true
        $query = "UPDATE field_reservation SET approval = '1' WHERE reservation_Id = '$reservation_id'";
        $result = mysqli_query($conn, $query);

        if (!$result) {
            echo 'Failed to confirm reservation: ' . mysqli_error($conn);
        } else {
            echo 'success';
        }
    } else if ($action == 'remove') {
        // Delete the reservation
        $query = "DELETE FROM field_reservation WHERE reservation_Id = '$reservation_id'";
        $result = mysqli_query($conn, $query);

        if (!$result) {
            echo 'Failed to remove reservation: ' . mysqli_error($conn);
        } else {
            echo 'success';
        }
    } else {
        echo 'Invalid action';
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    echo 'Invalid request method';
}
