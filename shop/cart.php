<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cart</title>

    <!-- CSS resources -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css"> <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css">

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

        <style>
    .table-scroll {
        overflow-x: auto;
        white-space: nowrap;
    }

    @media (max-width: 767px) {
    .table td, .table th {
        font-size: 0.8rem;
        padding: 0.25rem;
    }
}
</style>
</head>

<body>
    
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
                    <a class="nav-link" href="http://localhost/Sadna/shop/shophtml.php">Store</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">More options</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                        <a class="dropdown-item" href="http://localhost/Sadna/player/manageuser.php">Manage user</a>
                        <a class="dropdown-item" href="http://localhost/Sadna/player/about.php">About us</a>
                        <a class="dropdown-item" href="http://localhost/Sadna/registerlogin/loginpage.php">Sign out</a>
                    </div>
                </li>
                
            </ul>

            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="http://localhost/Sadna/shop/cart.php"><img src="http://localhost/Sadna/images/cart.png" alt="cart" width='35' height='25'></a>
                </li>
            </ul>
        </div>
    </nav>

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
                    <div class="col-10">
                        <h1 class="display-3" id='greeting'>Hello, </h1>
                        <p><span class="font-weight-bold">we are happy to see you here.</span>
                        Here you can pay for your items using your Google Pay account. <br> 
                        Payment is made in a secure way under the strict SSL standards, so you can feel comfortable making purchases on this site<br><br>
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
                                
                                <tr>
                                    <td class="px-3 text-nowrap"></td>
                                    <td class="px-3 text-primary font-weight-bold text-nowrap">Total amount</td>
                                    <td class="px-3 text-nowrap"></td>
                                    <td class="px-3 text-nowrap"></td>
                                    <td class="px-3 text-primary font-weight-bold text-nowrap">$<?php echo $total; ?></td>
                                    <td class="px-3 text-nowrap"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <br><br>
            <div class="align-items-center text-center">
                <button class="btn btn-primary" onclick="window.location.href='checkout.php?total=<?php echo $total; ?>'">Proceed to checkout</button>
            </div>

            <!-- <div class="row">
                <form>
                    <h2>Enter your payment Details</h2>
                    <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                        <label for="card-number">Card Number:</label>
                        <input type="text" class="form-control" id="card-number">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                        <label for="expiration-date">Expiration Date:</label>
                        <input type="date" class="form-control" id="expiration-date">
                        </div>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                        <label for="cvv">CVV:</label>
                        <input type="text" class="form-control" id="cvv">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                        <label for="owner-name">Owner Name:</label>
                        <input type="text" class="form-control" id="owner-name">
                        </div>
                    </div>
                    </div>
                    <h4>your total amount is: $<?php echo $total; ?> </h4>
                        <button type="submit" class="btn btn-primary">Submit Payment</button>
                </form>
            </div> -->
        </div>
    </main>
</body>

<footer class="container">
    <p>&copy; 20232W89</p>
</footer>

<script>

    $(document).ready(function(){
        $(document).on('click', '.delete_product', function() {
            var productId = $(this).data('id');
            var orderId = $(this).data('order');
            $.ajax({ 
                url: 'http://localhost/Sadna/shop/delete_product_from_cart.php',
                type: 'GET',
                data: { 
                    productId:productId,
                    orderId:orderId,
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
    });


</script>

</html>