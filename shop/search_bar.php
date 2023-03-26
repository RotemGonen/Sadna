<?php

include "../connection.php";
if(isset($_POST['searchTerm'])) {
    $searchTerm = '%' . $_POST['searchTerm'] . '%';
    
    // Prepare the database query with a parameter placeholder
    $stmt = $pdo->prepare("SELECT * FROM products WHERE name LIKE :searchTerm");
    
    // Bind the search term parameter to the prepared statement
    $stmt->bindParam(':searchTerm', $searchTerm);
    
    // Execute the query
    $stmt->execute();
    
    // Check if any results were found
    if ($stmt->rowCount() > 0) {
        // Loop through the results and display them
        while ($row = $stmt->fetch()) {
            echo "<div class='border border-dark col-md-4'>";
            echo "<div class='text-center mx-auto'>";
            echo "<img src='data:image/jpeg;base64, " . base64_encode($row["picture"]) . "' class='img-fluid'>";
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
    else {
        echo '<p>No results found.</p>';}
    }
}
?>