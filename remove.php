<?php
// check if the ID parameter was passed
if (isset($_POST['id'])) {
    // get the ID parameter value
    $id = $_POST['id'];

    $mysqli = new mysqli("localhost", "test", "12345", "sadna");

    // check for errors
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli->connect_error;
        exit();
    }

    // prepare the delete statement
    $query = "DELETE FROM my_table WHERE id = ?"; // replace "my_table" with the actual name of your table
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("i", $id);

    // execute the statement
    if (!$stmt->execute()) {
        echo "Failed to delete row from MySQL: " . $stmt->error;
        exit();
    }

    // close the statement and database connection
    $stmt->close();
    $mysqli->close();

    // return a success message
    echo "Row deleted successfully";
} else {
    // return an error message if the ID parameter was not passed
    echo "ID parameter is missing";
}
