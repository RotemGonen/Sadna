<?php

include "../connection.php";
if(isset($_POST['searchTerm'])) {
    // Get the search term from the Ajax request
    $searchTerm = $_POST['search'];
    
    // Perform a search query
    $sql = "SELECT * FROM products WHERE name LIKE '%$searchTerm%'";
    $result = $conn->query($sql);

    // Display the search result
    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        // Output product div with data
        echo "<div class='border border-dark col-md-4 d-flex flex-column'>";
        echo "<div class='align-items-center ml-4' id='one'>";
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
        }
    else {
        echo '<p>No results found.</p>';}
    }
}
?>