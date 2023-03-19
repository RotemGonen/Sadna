<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>4Play | Main</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css">
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>

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
        </script>";
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
                    <a class="nav-link" href="#">Home </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/Sadna/player/reservefield.php">Reserve a sport field</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Schedule a training</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Store</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">More options</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                        <a class="dropdown-item" href="#">Manage user</a>
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
                    <h1 class="display-3" id="greeting">Hello, *user*</h1>
                    <p><span class="font-weight-bold">It's good to see you here!</span>
                        Tired of the hassle of arriving at your local park with your team,
                        only to find it already occupied? Say goodbye to disappointment and hello to convenience with
                        our
                        cutting-edge platform! With just a few clicks, you can locate available sports fields in your
                        area
                        and be on your way to your next epic game. Don't let a crowded park get in the way of your
                        victory!
                    </p>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div id="reservationcarousel" class="carousel carousel-dark slide">
                            <div class="carousel-inner text-center" id="cards"></div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#reservationcarousel"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#reservationcarousel"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div style="height: 300px;">
                            <div id="map" class="w-100 h-100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <script>
            var data; // define data outside of AJAX call
            $(document).ready(function () {
                $.ajax({
                    url: 'http://localhost/Sadna/player/pagehelpers/carouseldata.php', // change this to the url of your server-side script that fetches the data from the database
                    type: 'get',
                    dataType: 'json',
                    data: { username: '<?php echo $_SESSION['username'] ?>' },
                    success: function (response) {
                        data = response.data;
                        var cards = '';
                        for (var i = 0; i < data.length; i++) {
                            var active = '';
                            if (i == 0) {
                                active = 'active';
                            }
                            cards += '<div class="carousel-item ' + active + '">';
                            cards += '<div>';
                            cards += '<div class="card">';
                            cards += '<div class="card-body">';
                            cards += '<h4 class="card-title">' + data[i].date + '</h5>';
                            cards += '<p class="font-weight-bold">' + data[i].type + '-' + data[i].location + '</p>';
                            cards += '<h6 class="card-subtitle mb-2 text-muted">' + data[i].starttime + ' - ' + data[i].endtime + '</h6>'; // change this to the format of your data
                            cards += '<div class="row col">';
                            cards += '<div class="col">';
                            cards += '<button class="btn btn-danger remove-row" data-id="' + data[i].reservation_Id + '">Remove</button>'; // add a button with a data-id attribute that contains the row id
                            cards += '</div>';
                            cards += '<div class="col">';
                            cards += '<button class="btn btn-primary send-coords" data-lat="' + data[i].latitude + '" data-lon="' + data[i].longitude + '">Show location</button>'; // add a button with data-lat and data-lon attributes that contain the latitude and longitude data
                            cards += '</div>';
                            cards += '</div>';
                            cards += '</div>';
                            cards += '</div>';
                            cards += '</div>';
                            cards += '</div>';
                            $('#cards').html(cards); // replace the table body with the generated cards
                        }
                    }
                })
            });

            $(document).ready(function () {

                // Set up the map
                var map = L.map('map').setView([31.80309338, 35.10942674], 7);
                // Add the tile layer
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                }).addTo(map);
                var markerLayer = L.layerGroup().addTo(map);


                var carousel = $('#reservationcarousel');

                carousel.on('click', '.send-coords', function () {
                    var lat = $(this).data('lat');
                    var lon = $(this).data('lon');
                    changeCoords(lat, lon);
                });
                function changeCoords(lat, lng) {
                    // Remove existing marker layer from the map
                    if (markerLayer) {
                        map.removeLayer(markerLayer);
                    }

                    // Create a new marker layer and add it to the map
                    markerLayer = L.layerGroup();
                    var marker = L.marker([lat, lng]);
                    markerLayer.addLayer(marker);
                    map.addLayer(markerLayer);
                    // Center the map on the new coordinates
                    map.setView([lat, lng], 17);
                }
            })


        </script>

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
</body>

</html>