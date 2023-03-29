<?php
include '../connection.php';

$sql = "SELECT * FROM products";
$result = $conn->query($sql);

if (mysqli_num_rows($result) > 0) {
    // Output container div
        while($row = mysqli_fetch_assoc($result)) {
        // Output product div with data
        // echo "<div class='col-sm-4 mb-4'>";
        // echo "<div class='card border border-dark'>";
        // echo "<div class='text-center mx-auto'>";
        // echo "<ul style='list-style: none;'> <li>";
        // echo "<img src='data:image/jpeg;base64, " . base64_encode($row["picture"]) . "' class='img-fluid mx-3'>";
        // echo "<div class='card-body'>";
        // echo "<h2 class='card-title'>" . $row["name"] . "</h2>";
        // echo "<p class='card-text'>" . $row["content"] . "</p>";
        // echo "<p>Price: " . $row["price"] . "</p>";
        // echo "<label for='quantity'>Quantity:</label>
        // <input type='number' id='quantity' name='quantity' min='1' max='100' placeholder='0'>"; 
        // echo "</li> </ul>";
        // echo "<br>";
        // echo "<button  class='dark mb-1'> add to cart </button>";
        // echo "</div>";
        // echo "</div>";
        // echo "</div>";  
        
        echo "<div class='border border-dark col-md-4 d-flex flex-column'>";
        echo "<div class='align-items-center ml-2' id='one'>";
        echo "<ul style='list-style: none;'> <li>";
        echo "<div class='align-items-center'>";
        echo "<img src='data:image/jpeg;base64, " . base64_encode($row["picture"]) . "' class='img-fluid mt-3' width='200' height='200'>";
        echo "</div>";
        echo "<h3>" . $row["name"] . "</h2>";
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

        
        // echo "<div class='row row-cols-1 row-cols-md-3 g-4'>"; 
        // echo "<div class='col'>";
        // echo "<div class='card border border-dark'>";
        // echo "<div class='text-center'>";
        // echo "<ul style='list-style: none;'> <li>";
        // echo "<div class='text-center'>";
        // echo "<img src='data:image/jpeg;base64, " . base64_encode($row["picture"]) . "' class=' img-fluid'>";
        // echo "</div>";
        // echo "<div class='card-body'>";
        // echo "<h2 class='card-title'>" . $row["name"] . "</h2>";
        // echo "<p class='card-text'>" . $row["content"] . "</p>";
        // echo "<p class='card-text'> Price: " . $row["price"] . "</p>";
        // echo "<label for='quantity'>Quantity:</label>
        // <input type='number' id='quantity' name='quantity' min='1' max='100' placeholder='0'>"; 
        // echo "</li> </ul>";
        // echo "</div>";
        // echo "<div class='text-center mt-auto'>";
        // echo "<div class='mt-auto text-center'>"; 
        // echo "<button class='btn btn-dark mb-0' id='add'> add to cart </button>";
        // echo "</div>";
        // echo "</div>";
        // echo "</div>";
        // echo "</div>";
        // echo "</div>";
        // echo "</div>";
    }
}
?>
