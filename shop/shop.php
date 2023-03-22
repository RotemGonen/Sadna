<?php
include '../connection.php';

$sql = "SELECT * FROM products";
$result = $conn->query($sql);

if (mysqli_num_rows($result) > 0) {
    // Output container div
        while($row = mysqli_fetch_assoc($result)) {
        // Output product div with data
        echo "<div class='product border border-dark col-md-4'>";
        echo "<div class='text-center mx-auto'>";
        echo "<img src='data:image/jpeg;base64, " . base64_encode($row["picture"]) . "'>";
        echo "<h2>" . $row["name"] . "</h2>";
        echo "<p>" . $row["content"] . "</p>";
        echo "<p>Price: " . $row["price"] . "</p>";
        echo "<label for='quantity'>Quantity:</label>
        <input type='number' id='quantity' name='quantity' min='1' max='100' placeholder='0'>"; 
        echo "<br>";
        echo "<button style='margin-bottom:0;' class='dark'> add to cart </button>";
        echo "</div>";
        echo "</div>";        
    }
}
?>
