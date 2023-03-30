<?php
include '../connection.php';

$sql = "SELECT * FROM products";
$result = $conn->query($sql);

if (mysqli_num_rows($result) > 0) {
    // Output container div
        while($row = mysqli_fetch_assoc($result)) {
        //Output product div with data
        echo "<div class='border border-dark col-md-4 d-flex flex-column'>";
        echo "<div class='text-center mr-3' id='one'>";
        echo "<ul style='list-style: none;'> <li>";
        echo "<div class='align-items-center'>";
        echo "<img src='data:image/jpeg;base64, " . base64_encode($row["picture"]) . "' class='img-fluid mt-3' width='200' height='200'>";
        echo "</div>";
        echo "<h3 id='two'>" . $row["name"] . "</h2>";
        echo "<p>" . $row["content"] . "</p>";
        echo "<p style='text-decoration:underline;'> Price: " . $row["price"] . "</p>";
        echo "<label for='quantity'>Quantity:</label>
        <input type='number' id='quantity' name='quantity' min='1' style='width:40%' placeholder='0'>"; 
        echo "</li> </ul>";
        echo "</div>";
        echo "<div class='mt-auto text-center'>"; 
        echo "<button class='btn btn-dark mb-1' id='add'> add to cart </button>";
        echo "</div>";
        echo "</div>";

        // echo "<div class='card border border-dark col-md-4 d-flex flex-column'>";
        // echo "<div class='card-body align-items-center ml-4' id='one'>";
        // echo "<ul style='list-style: none;'> <li>";
        // echo "<div class='align-items-center'>";
        // echo "<img src='data:image/jpeg;base64, " . base64_encode($row["picture"]) . "' class='img-fluid mt-3' width='200' height='200'>";
        // echo "</div>";
        // echo "<h3 class='card-text' id='two'>" . $row["name"] . "</h2>";
        // echo "<p class='card-text'>" . $row["content"] . "</p>";
        // echo "<p class='card-text' style='text-decoration:underline;'> Price: " . $row["price"] . "</p>";
        // echo "<label for='quantity'>Quantity:</label>
        // <input type='number' id='quantity' name='quantity' min='1' style='width:40%' placeholder='0'>"; 
        // echo "</li> </ul>";
        // echo "</div>";
        // echo "<div class='mt-auto text-center'>"; 
        // echo "<button class='btn btn-dark mb-1' id='add'> add to cart </button>";
        // echo "</div>";
        // echo "</div>";
    }
}
?>
