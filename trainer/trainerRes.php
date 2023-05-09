<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>4Play | Search trainee</title>
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
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/plugins/rangePlugin.js"></script>

    <!-- Bootstrap bundle (JS, Popper, and jquery for Bootstrap) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <!-- Flatpickr JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

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
        <div class="navbar-brand"><img src="http://localhost/Sadna/images/4Play.PNG" width="70"></div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/Sadna/trainer/trianerpage.php">Home</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="http://localhost/Sadna/trainer/trainerRes.php">Look for a trainee</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/Sadna/trainer/trainershophtml.php">Store</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">More options</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                        <a class="dropdown-item" href="http://localhost/Sadna/trainer/trainermanageuser.php">Manage
                            user</a>
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
    <main role="main">
        <div class="jumbotron mt-4">
            <div class="container">
                <h1 class="display-3">Coach Availability</h1>
                <p>We aim to maximize the connection between coaches and players,
                    while ensuring coaches have a fair opportunity to earn a steady income.
                    Our priority is to emphasize the availability of coaches to ensure an optimal match with players.
                </p>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-6 mt-4 m-md-0 shadow bg-light">
                    <!-- search city bar -->
                    <div class="row">
                        <div class="form-group col-6 col-md-7">
                            <label for="location-search"> Search city name:</label>
                            <select class="form-control" id="location-search" style="width: 100%">
                            </select>
                        </div>
                        <div class="form-group col-6 col-md-5">
                            <!-- search type bar -->
                            <Label for="type-select">Select sport type:</Label>
                            <select class="form-control" id="type-select" style="width: 100%">
                                <option value="כדורגל">כדורגל</option>
                                <option value="כדורסל">כדורסל</option>
                                <option value="טניס">טניס</option>
                            </select>
                        </div>
                    </div>
                    <div class="row" id="form-row">
                        <div class="form-group col">
                            <label for="datepicker">Select a date range:</label>
                            <input type="text" id="datepicker" class="form-control" autocomplete="off">
                        </div>
                        <div class="form-group col">
                            <label for="price">Price:</label>
                            <input type="number" id="price" class="form-control" autocomplete="off">
                        </div>
                    </div>

                    <div class="col-md-6 offset-md-3 text-center mt-2">
                        <button class="btn btn-success btn-lg mb-2 mt-2" disabled id="confirmbutton" onclick="offerfunc()">Offer your service</button>
                    </div>
                </div>

                <div class="col-md-6 mt-4 mt-md-0">
                    <img src="http://localhost/Sadna/images/Coach.jpg" class="img-fluid h-100">
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Your service has been published!
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary confirm-button">OK</button>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script>
        // check if all input are with values
        function checkInputs() {
            var type = $('#type-select').val();
            var location = $('#location-search').val();
            var price = $('#price').val();
            if (type != '' && location != null && startdate != '' && enddate != '' && price != '') {
                $('#confirmbutton').prop('disabled', false);
            } else {
                $('#confirmbutton').prop('disabled', true);
            }
        }

        function offerfunc() {
            var sport_type = $('#type-select').val();
            var price = $('#price').val();
            var city = $('#location-search').val();
            $.ajax({
                url: 'http://localhost/Sadna/trainer/insert_trainer.php',
                type: 'GET',
                data: {
                    sport_type: sport_type,
                    datepickers: startdate,
                    datepickere: enddate,
                    price: price,
                    city: city,
                    username: '<?php echo $_SESSION["username"]; ?>'
                },
                dataType: 'json',
                success: function() {
                    $('#successmsg').html('<div class="alert alert-success">Offer submitted successfully.</div>');
                },
                error: function(xhr, textStatus, errorThrown) {
                    $('#successmsg').html('<div class="alert alert-danger">Offer submission failed. Error: ' + errorThrown + '</div>');
                }
            });
        }

        $(document).ready(function() {
            startdate = null
            enddate = null

            $("#datepicker").flatpickr({
                mode: 'range',
                onChange: function(dates) {
                    if (dates.length == 2) {
                        startdate = dates[0];
                        enddate = dates[1];
                        startdate = startdate.toISOString().slice(0, 10).replace('T', ' ');
                        enddate = enddate.toISOString().slice(0, 10).replace('T', ' ');
                    }
                }
            })
        });
        // function to get the city
        $(document).ready(function() {
            $('#type-select').select2({
                theme: "classic"
            })
            $('#location-search').select2({
                theme: "classic",
                placeholder: "Search city(Hebrew) ...",
                ajax: {
                    url: 'http://localhost/Sadna/player/pagehelpers/retrieve_locations.php',
                    dataType: 'json',
                    delay: 250,
                    data: function(params) {
                        return {
                            q: params.term
                        };
                    },
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
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
            $('#type-select,#location-search,#datepicker,#price').on('input', function() {
                checkInputs();
            });
        });

        $(document).ready(function() {
            $('.confirm-button').click(function() {
                $('#exampleModal').modal('hide');
                // Show success message here
            });
            $('.close').click(function() {
                $('#exampleModal').modal('hide');
            });
        });

        $(document).ready(function() {
            $('#confirmbutton').click(function() {
                $('#exampleModal').modal('show');
            });
        });
    </script>
</body>

</html>