<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>checkout</title>

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

</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="navbar-brand">4Play</div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="http://irrotemamr.mtacloud.co.il/player/playerpage.php">Home </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://irrotemamr.mtacloud.co.il/player/reservefield.php">Reserve a sport field</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://irrotemamr.mtacloud.co.il/shop/shophtml.php">Store</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">More options</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                        <a class="dropdown-item" href="http://irrotemamr.mtacloud.co.il/player/manageuser.php">Manage user</a>
                        <a class="dropdown-item" href="http://irrotemamr.mtacloud.co.il/player/about.php">About us</a>
                        <a class="dropdown-item" href="http://irrotemamr.mtacloud.co.il/registerlogin/loginpage.php">Sign out</a>
                    </div>
                </li>

            </ul>

            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="http://irrotemamr.mtacloud.co.il/shop/cart.php"><img src="http://irrotemamr.mtacloud.co.il/images/cart.png" alt="cart" width='35' height='25'></a>
                </li>
            </ul>
        </div>
    </nav>

    <?php
    session_start();
    if (!isset($_SESSION['authenticated']) || !$_SESSION['authenticated']) {
        header('Location: http://irrotemamr.mtacloud.co.il/registerlogin/loginpage.php');
        exit;
    } else {
        echo "<script>
            window.onload = function() {
                var usernameDiv = document.getElementById('greeting');
                usernameDiv.innerHTML =  'Hello, " . $_SESSION['username'] . "';
                }
            </script>";
    }
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
                            <h4>your total amount is: $<?php echo $total = isset($_GET['total']) ? $_GET['total'] : 0; ?> </h4>
                            <button type="submit" class="btn btn-primary">Submit Payment</button>
                        </form>
                    </div>
                </div>

    </main>

</body>

</html>