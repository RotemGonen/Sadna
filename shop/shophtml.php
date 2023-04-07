<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>shop</title>
    <!-- CSS resources -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css">    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css">
    <link rel="stylesheet" type="text/css" href="sho.css">

    <!-- JavaScript resources -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>

    <!-- Bootstrap bundle (JS, Popper, and jquery for Bootstrap) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
</head>

<header>
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="navbar-brand">4Play</div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
            aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="http://localhost/Sadna/player/playerpage.php">Home </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/Sadna/player/reservefield.php">Reserve a sport field</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/Sadna/trainer.php">Schedule a training</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/Sadna/shop/shophtml.php">Store</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">More options</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                        <a class="dropdown-item" href="http://localhost/Sadna/player/manageuser.php">Manage user</a>
                        <a class="dropdown-item" href="http://localhost/Sadna/player/about.php">About us</a>
                    </div>
                </li>
                
            </ul>

            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#"><img src="http://localhost/Sadna/images/cart.png" alt="cart" width='35' height='25'></a>
                </li>
            </ul>
        </div>
    </nav>
</header>
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
    <!-- <div id="navbar"></div>
    <script>
    $("document").ready(function(){
        $("#navbar").load("../navbar.html")    
    });
    </script> -->
    
    <main role="main">
        <div class="jumbotron">
            <div class="container">
                <div class="row">
                    <div class="col-6">
                        <h1 class="display-3" id='greeting'>Hello, </h1>
                        <p><span class="font-weight-bold">It's good to see you here!</span>
                            here you can purchase our products in cheap prices that can be use in any game that you like to play.<br>
                            you can use our search bar right down or scroll down and see our products. 
                        </p>
                        <form class="d-flex ms-auto mt-2 mb-2" method="POST" action=''>
                            <select class="form-control" id="product-search" style="width: 100%">
                            </select>
                            <!-- <input class="form-control me-2" type="search" name="char" id="search-input" placeholder="Search" aria-label="Search">-->
                            <button class="btn btn-outline-success" id="search-btn" type="submit" name="submit"><svg id="svg" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16"> 
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                    </svg></button> 
                        </form>
                    </div>
                    <div class="col-6">
                        <img src="gif.gif" width="75%" height="100%" style="margin-left:20%;">
                    </div>
                </div>
            <div>
        </div>

        <div class="container-fluid m-4" id="pro">
            <div class="row">
            </div>
        </div> 

        <!-- <div class="container m-4" id="search-results">
            <div class="row">
            </div>
        </div>  -->

        
    </main>
    </body>
<!-- 
    <script>
    $(document).ready(function() {
        $.ajax({
            url: 'http://localhost/Sadna/shop/shop.php', 
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                var productHTML = '';
                $.each(data, function(index, product) {
                    productHTML += "<div class='border border-dark col-md-4 d-flex flex-column'>";
                    productHTML += "<div class='align-items-center ml-4' id='one'>";
                    productHTML += "<ul style='list-style: none;'> <li>";
                    productHTML += "<div class='align-items-center'>";
                    productHTML += "<img src='data:image/jpeg;base64," + btoa(product.picture) + "' class='img-fluid mt-3' width='200' height='200'>";
                    productHTML += "</div>";
                    productHTML += "<h3>" + product.name + "</h3>";
                    productHTML += "<p>" + product.content + "</p>";
                    productHTML += "<p style='text-decoration:underline;'> Price: " + product.price + "</p>";
                    productHTML += "<label for='quantity'>Quantity:</label> <input type='number' id='quantity' name='quantity' min='1' style='width:40%' placeholder='0'></li> </ul>";
                    productHTML += "</div>";
                    productHTML += "<div class='mt-auto text-center'>";
                    productHTML += "<button class='btn btn-dark mb-1' id='add'> add to cart </button>";
                    productHTML +=  "</div>";
                    productHTML +=  "</div>";
                });
                $('#pro .row').html(productHTML);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        });
    });
    </script> -->


    <!-- <script>
        $(document).ready(function () {
            $('#product-search').select2({
                theme: "classic",
                placeholder: "Search product",
                ajax: {
                    url: 'http://localhost/Sadna/shop/retrieve_product.php',
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            q: params.term
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.name,
                                    id: item.name
                                }
                            })
                        };
                    },
                    allowClear: true
                },
            })
        });
    </script> -->

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