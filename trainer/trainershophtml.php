<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>shop</title>
    <!-- CSS resources -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <!-- JavaScript resources -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>

    <!-- Bootstrap bundle (JS, Popper, and jquery for Bootstrap) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-scrollTo/2.1.3/jquery.scrollTo.min.js"></script>

    <!-- Flatpickr JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <style>
        @media (max-width: 400px) {
            .col-6 img {
                display: none;
            }
        }
    </style>
</head>

<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="navbar-brand"><img src="http://localhost/Sadna/images/4Play.PNG" width="70"></div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/Sadna/trainer/trianerpage.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/Sadna/trainer/trainerRes.php">Look for a trainee</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="http://localhost/Sadna/trainer/trainershophtml.php">Store</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">More options</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                        <a class="dropdown-item" href="http://localhost/Sadna/trainer/trainermanageuser.php">Manage user</a>
                        <a class="dropdown-item" href="http://localhost/Sadna/trainer/trainerabout.php">About us</a>
                        <a class="dropdown-item" href="http://localhost/Sadna/registerlogin/loginpage.php">Sign out</a>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/Sadna/trainer/trainercart.php"><img src="http://localhost/Sadna/images/carticon.png" alt="cart" width='40' height='40'></a>
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
    }
    ?>

    <main role="main" class="mt-4">
        <div class="jumbotron">
            <div class="container">
                <div class="row">
                    <div class="col-6">
                        <h1>Welcome to our shop</h1> <br>
                        <p>
                            Our goal is to provide you with the best shopping experience possible, offering high-quality products and exceptional customer service.<br>
                            <span class="font-weight-bold">All prices on the site are displayed according to the dollar currency.</span><br><br>
                            You can use our search bar right down or scroll down and see our products.
                        </p>
                        <div class="d-flex ms-auto mt-2 mb-2" method="POST" action=''>
                            <input class="form-control me-2" type="search" name="char" id="search-input" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" id="search-btn" type="submit" name="submit"><svg id="svg" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                </svg></button>
                        </div><br>
                        <div class='sen'></div>
                    </div>
                    <div class="col-6">
                        <img src="http://localhost/Sadna/images\messi_with_ball.jpg" width="75%" height="90%" style="max-width: 100%; margin-left:20%;">
                    </div>
                </div>
                <div>
                </div>

                <div class="container-fluid m-4" id="pro">
                    <div class="row">
                    </div>
                </div>

    </main>
</body>

<footer class="container">
    <p>&copy; 20232W89</p>
</footer>

<script>
    //function that show the products
    $(document).ready(function show_products() {
        $.ajax({
            url: 'http://localhost/Sadna/shop/shop.php',
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                var productHTML = '';
                $.each(data, function(index, product) {
                    productHTML += "<div class='col-md-4 mb-4'>";
                    productHTML += "<div class='card h-100'>";
                    productHTML += "<div class='card-body'>";
                    productHTML += "<div class='text-center'>";
                    productHTML += "<img src='data:image/jpeg;base64," + product.picture + "' class='card-img-top' alt='" + product.name + "' style='max-height: 200px;'>";
                    productHTML += "</div>";
                    productHTML += "<h3 class='card-title'>" + product.name + "</h3>";
                    productHTML += "<p class='card-text'>" + product.content + "</p>";
                    productHTML += "<p class='card-text'><strong>Price:</strong> " + product.price + "</p>";
                    productHTML += "<label for='quantity'>Quantity:</label> <input type='number' id='quantity' name='quantity' min='1' style='width:40%' placeholder='0'>";
                    productHTML += "</div>";
                    productHTML += "<div class='card-footer mt-auto text-center d-flex justify-content-center'>";
                    productHTML += "<button class='btn btn-dark mb-1' id='add' data-id='" + product.id + "'>Add to cart</button>";
                    productHTML += "</div>";
                    productHTML += "</div>";
                    productHTML += "</div>";
                });
                $('#pro .row').html(productHTML);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        });


        // Handle search button click
        $('#search-btn').click(function() {
            searchProducts();
        });

        function searchProducts() {
            // Get the search term entered by the user
            var searchTerm = $('#search-input').val();
            // Use Ajax to fetch the products from the server
            $.ajax({
                url: 'http://localhost/Sadna/shop/get-products.php',
                type: 'GET',
                data: {
                    search: searchTerm
                },
                dataType: 'json',
                success: function(products) {
                    var productHTML = '';
                    // Iterate over the products and add them to the container
                    $.each(products, function(index, product) {
                        productHTML += "<div class='col-md-4 mb-4'>";
                        productHTML += "<div class='card h-100'>";
                        productHTML += "<div class='card-body'>";
                        productHTML += "<div class='text-center'>";
                        productHTML += "<img src='data:image/jpeg;base64," + product.picture + "' class='card-img-top' alt='" + product.name + "' style='max-height: 200px;'>";
                        productHTML += "</div>";
                        productHTML += "<h3 class='card-title'>" + product.name + "</h3>";
                        productHTML += "<p class='card-text'>" + product.content + "</p>";
                        productHTML += "<p class='card-text'><strong>Price:</strong> " + product.price + "</p>";
                        productHTML += "<label for='quantity'>Quantity:</label> <input type='number' id='quantity' name='quantity' min='1' style='width:40%' placeholder='0'>";
                        productHTML += "</div>";
                        productHTML += "<div class='card-footer mt-auto text-center d-flex justify-content-center'>";
                        productHTML += "<button class='btn btn-dark mb-1' id='add' data-id='" + product.id + "'>Add to cart</button>";
                        productHTML += "</div>";
                        productHTML += "</div>";
                        productHTML += "</div>";
                    });
                    if (productHTML === '') {
                        $('.sen').html("not match item for this search, please search again");
                        $('.sen').css('background-color', 'yellow');
                        $('.sen').css('display', 'inline-block');
                        show_products();
                    } else {
                        $('#pro .row').html(productHTML);
                        $('.sen').html('');
                    }
                },
                error: function(xhr, textStatus, errorThrown) {
                    console.log('Error fetching products: ' + errorThrown);
                }
            });
        };

        $(document).on('click', '#pro .row #add', function() {
            add_to_cart.call(this);
        });

        function add_to_cart() {
            // get the product name from the card title
            var productName = $(this).closest('.card').find('.card-title').text();
            // get the quantity entered by the user
            var quantity = $(this).closest('.card').find('input[name="quantity"]').val();
            // get the product ID from the data attribute of the parent card element
            var productId = $(this).data('id');

            // Remove any existing modals from the DOM
            $('.modal').remove();
            // Check if quantity is greater than 0
            if (quantity > 0) {
                var modalHTML = '<div class="modal" tabindex="-1">';
                modalHTML += '<div class="modal-dialog modal-dialog-centered">';
                modalHTML += '<div class="modal-content">';
                modalHTML += '<div class="modal-header">';
                modalHTML += '<h5 class="modal-title">great</h5>';
                modalHTML += '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>'; // Close button ('X')
                modalHTML += '</div>';
                modalHTML += '<div class="modal-body">';
                modalHTML += quantity + ' ' + productName + ' added to cart successfully';
                modalHTML += '</div>';
                modalHTML += '</div>';
                modalHTML += '</div>';
                modalHTML += '</div>';

                // Append modal HTML to body
                $('body').append(modalHTML);

                // Show modal
                $('.modal').modal('show');
            } else {
                var modalHTML = '<div class="modal" tabindex="-1">';
                modalHTML += '<div class="modal-dialog modal-dialog-centered">';
                modalHTML += '<div class="modal-content">';
                modalHTML += '<div class="modal-header">';
                modalHTML += '<h5 class="modal-title">Error</h5>';
                modalHTML += '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>'; // Close button ('X')
                modalHTML += '</div>';
                modalHTML += '<div class="modal-body">';
                modalHTML += 'Please enter the amount of ' + productName + ' to add to the cart';
                modalHTML += '</div>';
                modalHTML += '</div>';
                modalHTML += '</div>';
                modalHTML += '</div>';

                // Append modal HTML to body
                $('body').append(modalHTML);

                // Show modal
                $('.modal').modal('show');
            }

            $.ajax({
                url: 'http://localhost/Sadna/shop/insert_order.php',
                type: 'GET',
                data: {
                    productName: productName,
                    quantity: quantity,
                    productId: productId,
                    username: '<?php echo $_SESSION["username"]; ?>'
                },
                dataType: 'json',
                success: function(products) {
                    console.log("Product added to cart successfully.");
                },
                error: function(xhr, textStatus, errorThrown) {
                    console.error("Failed to add product to cart. Error: " + error);
                }
            });

        }

    });
</script>

</html>

</html>