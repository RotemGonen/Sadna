<?php
$host = "localhost"; // database host
$username = "test"; // database username
$password = "12345"; // database password
$dbname = "sadna"; // database name

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM products";
$result = $conn->query($sql);

if (mysqli_num_rows($result) > 0) {
    // Output container div
    echo "<div class='product-container'>";
    // Output data of each row
    $count = 0;
    while($row = mysqli_fetch_assoc($result)) {
        // Output product div with data
        echo "<div class='product'>";
        echo "<img src = 'data:image/jpeg;base64,' .'" btoa($row["picture"])"'>"; 
        // echo "<img src='" . $row["picture"] . "' alt='" . $row["name"] . "'>";
        echo "<h2>" . $row["name"] . "</h2>";
        echo "<p>" . $row["content"] . "</p>";
        echo "<p>Price: " . $row["price"] . "</p>";
        echo "</div>";
        
    }
    
    // Close container div
    echo "</div>";
}
?>
