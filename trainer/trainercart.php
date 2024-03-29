<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cart</title>

    <!-- CSS resources -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css">

    <!-- JavaScript resources -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>

    <!-- Bootstrap bundle (JS, Popper, and jquery for Bootstrap) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <!-- API to Paypal -->
    <script src="https://www.paypal.com/sdk/js?client-id=AY6bFReVUVISpKrLF1_LaVgud8umuLQr7lvOLjus3soqaTf_fZgZwTQE5hyUZ4Xw7I-u_9CcTL1QPZpJ&currency=USD"></script>


    <style>
        .table-scroll {
            overflow-x: auto;
            white-space: nowrap;
        }

        @media (max-width: 767px) {

            .table td,
            .table th {
                font-size: 0.8rem;
                padding: 0.25rem;
            }
        }
    </style>
</head>

<body>

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
                <li class="nav-item">
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
                    <div class="col-11">
                        <h1>Welcome to your cart</h1><br>
                        <p>
                            Here you can pay for your items using your Paypal account. <br>
                            Payment is made in a secure way under the strict SSL standards of Paypal, so you can feel comfortable making purchases on this site<br><br>
                        </p>
                    </div>
                </div>
                <div>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col text-center justify-content-center">
                            <h2>Your Cart Items:</h2> <br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-center">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-scroll">
                                    <thead>
                                        <tr>
                                            <th class="text-nowrap">Product Image</th>
                                            <th class="text-nowrap">Product Name</th>
                                            <th class="text-nowrap">Price</th>
                                            <th class="text-nowrap">Quantity</th>
                                            <th class="text-nowrap">total price</th>
                                            <th class="text-nowrap">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include '../connection.php';

                                        // Retrieve cart items for the logged-in user
                                        $username = $_SESSION['username'];
                                        $sql = "SELECT * FROM shop_reservations WHERE username = '$username'";
                                        $result = $conn->query($sql);

                                        // Check if any products are in the cart
                                        $total = 0;
                                        if ($result->num_rows > 0) {
                                            // Loop through each cart item and display its details
                                            while ($row = $result->fetch_assoc()) {
                                                $orderId = $row['order_id'];
                                                $productName = $row['product'];
                                                $productPicture = ($row['picture']);
                                                $productId = $row['product_id'];
                                                $productPrice = $row['price'];
                                                $quantity = $row['quantity'];
                                                $total += $productPrice * $quantity;
                                                echo "<tr>";
                                                echo "<td class='px-3 text-nowrap'><img src='data:image/jpeg;base64," . $productPicture . "' width='200' height='120'></td>";
                                                echo "<td class='px-3 text-nowrap'>" . $productName . "</td>";
                                                echo "<td class='px-3 text-nowrap'>$" . $productPrice . "</td>";
                                                echo "<td class='px-3 text-nowrap'>" . $quantity . "</td>";
                                                echo "<td class='px-3 text-nowrap'>$" . $productPrice * $quantity . "</td>";
                                                echo "<td class='px-3 text-nowrap'><button class='delete_product' data-id='" . $productId . "' data-order='" . $orderId . "'>Delete Product</td>";
                                                echo "</tr>";
                                            }
                                        } else {
                                            // Display a message if no products are in the cart
                                            echo "<tr><td colspan='6'>No products in cart</td></tr>";
                                        }
                                        $conn->close();
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <br>
                    <h3 class='justify-content-center text-center'>Total amount $<?php echo $total; ?></h3>
                    <br><br>
                    <div class="align-items-center text-center">
                        <div> checkout with <img src="http://localhost/Sadna/images/paypal_icon.png" width="60" class="mb-1"></div><br>
                        <div id="paypal-button-container">
                        </div>
                    </div>
                </div>
    </main>
</body>

<footer class="container">
    <p>&copy; 20232W89</p>
</footer>

<script>
    $(document).ready(function() {
        $(document).on('click', '.delete_product', function() {
            var productId = $(this).data('id');
            var orderId = $(this).data('order');
            $.ajax({
                url: 'http://localhost/Sadna/shop/delete_product_from_cart.php',
                type: 'GET',
                data: {
                    productId: productId,
                    orderId: orderId,
                    username: '<?php echo $_SESSION["username"]; ?>'
                },
                dataType: 'json',
                success: function(products) {
                    console.log("Product deleted from cart successfully.");
                    location.reload();
                },
                error: function(xhr, textStatus, errorThrown) {
                    console.error("Failed to delete product from cart. Error: " + errorThrown);
                }
            });
        });

        //API to Paypal
        paypal.Buttons({
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '<?php echo $total; ?>'
                        }
                    }]
                });
            },
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                    $.ajax({
                        url: 'http://localhost/Sadna/shop/clear_cart.php',
                        type: 'GET',
                        data: {
                            username: '<?php echo $_SESSION["username"]; ?>'
                        },
                        dataType: 'json',
                        success: function(products) {
                            console.log("All products are deleted from cart successfully.");
                            var message = '<div class="modal" tabindex="-1">';
                            message += '<div class="modal-dialog modal-dialog-centered">';
                            message += '<div class="modal-content">';
                            message += '<div class="modal-header">';
                            message += '<button type="button" id="close" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>'; // Close button ('X')
                            message += '</div>';
                            message += '<div class="modal-body">';
                            message += 'The payment completed by ' + details.payer.name.given_name + '!';
                            message += '</div>';
                            message += '</div>';
                            message += '</div>';
                            message += '</div>';
                            $('body').append(message);
                            $('.modal').modal('show');
                            $('#close').on('click', function() {
                                location.reload();
                            });
                        },
                        error: function(xhr, textStatus, errorThrown) {
                            console.error("Failed to delete products from cart. Error: " + errorThrown);
                        }
                    });
                });
            }
        }).render('#paypal-button-container');
    });
</script>

</html>