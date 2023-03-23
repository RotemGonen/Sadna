<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php
    session_start();
    if (!isset($_SESSION['authenticated']) || !$_SESSION['authenticated']) {
        header('Location: http://localhost/Sadna/registerlogin/loginpage.php');
        exit;
    } else {
        echo "<script>
        window.onload = function() {
            var usernameDiv = document.getElementById('greeting');
            usernameDiv.innerHTML =  'Hello, " . $_SESSION['username'] . "';
            }
        </script>";}
        ?>
    
    <!-- show the navbar -->
    <div id="navbar"></div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
     $("document").ready(function(){
        $("#navbar").load("../navbar.html")    
    });
    </script>
    
    <main role="main">
        <div class="jumbotron">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h1 class="display-3" id='greeting'>Hello, </h1>
                        <p><span class="font-weight-bold">It's good to see you here!</span>
                            here you can purchase our products in cheap prices that can be use in any game that you like to play.<br>
                            you can use our search bar right down or scroll down and see our products. 
                        </p>
                        <form class="d-flex ms-auto mt-2" method="POST" action=''>
                            <input class="form-control me-2" type="search" name="char" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit" name="submit"><svg id="svg" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                    </svg></button>
                        </form>
                    </div>
                    <div class="col-md-6" style="padding-left: 90px;">
                        <img src="gif.gif" width="400px" height="280px">
                    </div>
                </div>
            <div>
        </div>

        <div class="container m-4">
            <div class="row">
                <?php include 'shop.php'; ?>
            </div>
        </div> 
    </main>

    <!-- search bar - using ajax -->
<!-- <?php 
    // include '../connection.php';
    // if (isset($_POST["submit"])) {
    //     $char = $_POST["char"];
    //     // $char = trim($_POST['char']);
    //     $products = array();
    //     if (!empty($char)) {
    //         // run the query
    //         $sql = "SELECT * FROM `product` WHERE `name` LIKE '%$char%' ";
    //         $result =mysqli_query($conn, $sql);
    //         if ($result === FALSE) {
    //             die(mysqli_error($conn));
    //         }
    //         else if (mysqli_num_rows($result) > 0) {
    //             $products[] = $row;
    //     ?>
    //             <br><br>
    //             <div class="container m-4">
    //                 <div class="row">
    //                     <?php
    //                         while($row = mysqli_fetch_assoc($result)) {
    //                             // Output product div with data
    //                             echo "<div class='product border border-dark col-lg-4'>";
    //                             echo "<div class='text-center mx-auto'>";
    //                             echo "<img src='data:image/jpeg;base64, " . base64_encode($row["picture"]) . "'>";
    //                             echo "<h2>" . $row["name"] . "</h2>";
    //                             echo "<p>" . $row["content"] . "</p>";
    //                             echo "<p>Price: " . $row["price"] . "</p>";
    //                             echo "<label for='quantity'>Quantity:</label>
    //                             <input type='number' id='quantity' name='quantity' min='1' max='100' placeholder='0'>"; 
    //                             echo "<button style='margin-bottom:0' class='dark'> add to cart </button>";
    //                             echo "</div>";
    //                             echo "</div>";        
    //                         }
                            
    //                 echo "</div>";
    //             echo "</div>";
//         }
//     }
// }
?> -->
</body>

<footer class="container">
    <p>&copy; 20232W89</p>
</footer>



<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.1/dist/umd/popper.min.js"> </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>


</html>
</html>