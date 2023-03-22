<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>4Play | Settings</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css">
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body>
    <?php
    session_start();
    if (!isset($_SESSION['authenticated']) || !$_SESSION['authenticated']) {
        header('Location: http://localhost/Sadna/registerlogin/loginpage.php');
        exit;
    }

    ?>

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
                    <a class="nav-link" href="#">Meet the trainers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Store</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">More options</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                        <a class="dropdown-item" href="http://localhost/Sadna/player/manageuser.php">Manage user</a>
                        <a class="dropdown-item" href="#">About us</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <body>
        <main role="main">
            <div class="jumbotron">
                <div class="container">
                    <h1 class="display-3" id="greeting">Personal Settings</h1>
                    <p>
                        You can customize your personal data from this page. <br>
                        You can choose to update some or all of your information to ensure that it is accurate and
                        up-to-date.
                    </p>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div id="my-alerts"></div>

                    <div class="col-md-6">
                        <form>
                            <div class="mb-3">
                                <div class="col-8">
                                    <label for="password" class="form-label">Password (remember it before
                                        changing!)</label>
                                    <input type="password" class="form-control" id="password">
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="col-8">
                                    <label for="location-search">City Address:</label>
                                    <select class="form-control" id="location-search" name="city" style="width: 100%">
                                    </select>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                    <div class="col-md-6 mt-3 mt-md-0">
                        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="http://localhost/Sadna/images/basketball.jpg" class="d-block w-100"
                                        alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="http://localhost/Sadna/images/soccer.jpg" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="http://localhost/Sadna/images/tennis.jpg" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="http://localhost/Sadna/images/volleyball.jpg" class="d-block w-100"
                                        alt="...">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#myCarousel"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>

            </div>





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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>

    <script>        // function to get the city
        $(document).ready(function () {
            $('#location-search').select2({
                theme: "classic",
                placeholder: "Search city(Hebrew) ...",
                ajax: {
                    url: 'http://localhost/Sadna/player/pagehelpers/retrieve_locations.php',
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
                                    text: item.location,
                                    id: item.location
                                }
                            })
                        };
                    },
                    placeholder: "Select a state",
                    allowClear: true
                },
            })
        });

        $(document).ready(function () {
            $('form').submit(function (event) {
                // Prevent the form from submitting normally
                event.preventDefault();

                // Get the form data
                var formData = {
                    'username': '<?php echo $_SESSION["username"]; ?>',
                    'password': $('input#password').val(),
                    'city': $('#location-search').val(),
                };

                // Send the AJAX request
                $.ajax({
                    type: 'POST',
                    url: 'http://localhost/Sadna/player/pagehelpers/update_user_details.php',
                    data: formData,
                    success: function (data) {
                        // Create a success alert with a timeout of 5 seconds
                        var alertSuccess = $('<div class="alert alert-success" role="alert">User details updated successfully!</div>');
                        $('#my-alerts').append(alertSuccess);
                        setTimeout(function () {
                            alertSuccess.remove();
                        }, 5000);
                        $('#password').val('');
                    },
                    error: function () {
                        // Create an error alert with a timeout of 5 seconds
                        var alertError = $('<div class="alert alert-danger" role="alert">An error occurred while updating user details.</div>');
                        $('#my-alerts').append(alertError);
                        setTimeout(function () {
                            alertError.remove();
                        }, 5000);
                    }

                });
            });
        });


    </script>
</body>

</html>