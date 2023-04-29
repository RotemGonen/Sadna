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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <!-- Instascan -->
    <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        #preview {
            width: 100%;
            height: auto;
            max-width: 100%;
            max-height: 100%;
        }

        .modal-content {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
    </style>

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
            usernameDiv.innerHTML =  'Hello, " . $_SESSION['first_name'] . "';
            var img = document.getElementById('personal-photo');
            var src = 'http://localhost/Sadna/images/profile/" . $_SESSION['photo_path'] . "';
            if (src) {
                img.src = src;
            }
    
            }
        </script>";
        $num_reservations = null;
    }
    ?>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="navbar-brand"><img src="http://localhost/Sadna/images/4Play.PNG" width="70"></div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
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
                    <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">More options</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                        <a class="dropdown-item" href="http://localhost/Sadna/player/manageuser.php">Manage user</a>
                        <a class="dropdown-item" href="http://localhost/Sadna/player/about.php">About us</a>
                        <a class="dropdown-item" href="http://localhost/Sadna/registerlogin/loginpage.php">Sign out</a>
                    </div>
                </li>
            </ul>

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/Sadna/shop/cart.php"><img src="http://localhost/Sadna/images/carticon.png" alt="cart" width='40' height='40'></a>
                </li>
            </ul>
        </div>
    </nav>

    <main role="main" class="mt-4">
        <div class="jumbotron">
            <div class="container">
                <div class="w-25 rounded-3 p-2 text-center col-md-2" style="background-color: #b5b5bd">
                    <img src="" id="personal-photo" alt="personal photo" class="img-fluid rounded-circle">
                </div>
                <h1 class="display-3" id="greeting"></h1>
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
            <div class="jumbotron text-center" style="background-color: #e1e1ea;">
                <h2 class="mb-3">Scan QR Code</h2>
                <p>Use your device's camera to Scan the QR code located in the field to let us know you have reached it.</p>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#qrModal">
                    <i class="fas fa-camera mr-2"></i>Scan QR Code
                </button>
            </div>

            <!-- QR Code Scanner Modal -->
            <div class="modal fade" id="qrModal" tabindex="-1" role="dialog" aria-labelledby="qrModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="qrModalLabel">Scan QR Code</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <video id="preview" class="w-100"></video> <!-- Added 'w-100' class for full-width -->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Success Alert -->
            <div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert" style="display:none;">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>Success!</strong>
            </div>

            <!-- Error Alert -->
            <div id="error-alert" class="alert alert-danger alert-dismissible fade show" role="alert" style="display:none;">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>Error!</strong>
            </div>

            <div class="modal" id="cancelReservationModal">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Cancel Reservation</h5>
                            <button type="button" class="btn-close" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure you want to cancel this reservation?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary cancelaction">Cancel</button>
                            <button type="button" class="btn btn-danger" id="confirmCancelReservation">Yes,
                                cancel it</button>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-8">

                    <div>
                        <h3 class="fs-2">Your Current Reservation</h3>
                        <p>Below you will find the details of your current reservation, including the date, time,
                            type of sport, location and a button to view the location on a map. You can also remove
                            your reservation by clicking the "Remove" button.</p>
                    </div>
                    <div id="reservationcarousel" class="carousel carousel-dark slide mb-3 mb-md-0 shadow">
                        <div class="carousel-inner text-center" id="cards">
                            <?php if ($num_reservations > 0) { ?>
                                <!-- Display carousel items here -->
                            <?php } else { ?>
                                <!-- Display default message here -->
                                <div class="carousel-item active">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">No reservations found</h5>
                                            <p class="card-text">Your reservations will appear here once you have made a
                                                reservation.</p>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#reservationcarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#reservationcarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>

                </div>

                <div class="col-lg-4">
                    <div style="height: 100%">
                        <div id="map" class="w-100 h-100"></div>
                    </div>
                </div>

            </div>
    </main>

    <script>
        function createGoogleCalendarLink(date, starttime, endtime, type, location) {
            // encode the event details in the URL
            var details = encodeURIComponent('Type: ' + type + '\nLocation: ' + location);
            // create the start and end datetime strings in the correct format
            var startDate = moment(date + ' ' + starttime, 'YYYY-MM-DD HH:mm').utc().format('YYYYMMDDTHHmmss[Z]');
            var endDate = moment(date + ' ' + endtime, 'YYYY-MM-DD HH:mm').utc().format('YYYYMMDDTHHmmss[Z]');
            // create the URL for the Google Calendar event
            return 'https://www.google.com/calendar/render?action=TEMPLATE&text=' + encodeURIComponent('Training reservation') + '&dates=' + startDate + '/' + endDate + '&details=' + details;
        }

        function Getreserv() {
            $.ajax({
                url: 'http://localhost/Sadna/player/pagehelpers/carouseldata.php', // change this to the url of your server-side script that fetches the data from the database
                type: 'get',
                dataType: 'json',
                data: {
                    username: '<?php echo $_SESSION['username']; ?>'
                },
                success: function(response) {
                    data = response.data;
                    var cards = '';
                    if (data.length == 0) {
                        cards += '<div class="carousel-item active">';
                        cards += '<div>';
                        cards += '<div class="card">';
                        cards += '<div class="card-body">';
                        cards += '<h4 class="card-title">No reservations found</h5>';
                        cards += '<p class="font-weight-bold">Make a reservation to see it here</p>';
                        cards += '</div>';
                        cards += '</div>';
                        cards += '</div>';
                        cards += '</div>';
                    } else {
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
                            cards += '<a href="' + createGoogleCalendarLink(data[i].date, data[i].starttime, data[i].endtime, data[i].type, data[i].location) + '" target="_blank">Add to the calendar <img src="http://localhost/Sadna/images/google_calendar_icon.png" alt="Google Calendar" style="width: 8%;"><a>'
                            cards += '<div class="row col">';
                            cards += '<div class="col">';
                            cards += '<button class="btn btn-danger remove-row" data-id="' + data[i].reservation_Id + '">Remove</button>'; // add a button with a data-id attribute that contains the row id
                            cards += '</div>';
                            cards += '<div class="col">';
                            cards += '<button class="btn btn-primary send-coords" data-lat="' + data[i].latitude + '" data-lon="' + data[i].longitude + '" data-loc="' + data[i].location + '">Show on map</button>'; // add a button with data-lat and data-lon attributes that contain the latitude and longitude data
                            cards += '</div>';
                            cards += '</div>';
                            cards += '</div>';
                            cards += '</div>';
                            cards += '</div>';
                            cards += '</div>';
                        }
                    }
                    $('#cards').html(cards); // replace the table body with the generated cards
                }
            });
        }

        var data; // define data outside of AJAX call
        $(document).ready(function() {
            Getreserv()
        });

        $(document).ready(function() {
            var southWest = L.latLng(28.0, 34.0);
            var northEast = L.latLng(35.0, 37.0);
            var bounds = L.latLngBounds(southWest, northEast);

            // Set up the map
            var map = L.map('map', {
                minZoom: 7 // set the minimum zoom level to 7
                    ,
                maxBounds: bounds,
                maxBoundsViscosity: 0.5
            }).setView([31.80309338, 35.10942674], 7);
            // Add the tile layer
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {}).addTo(map);
            var markerLayer = L.layerGroup().addTo(map);


            var carousel = $('#reservationcarousel');

            carousel.on('click', '.send-coords', function() {
                var lat = $(this).data('lat');
                var lon = $(this).data('lon');
                var loc = $(this).data('loc');
                changeCoords(lat, lon, loc);
            });

            function changeCoords(lat, lng, location) {
                // Remove existing marker layer from the map
                if (markerLayer) {
                    map.removeLayer(markerLayer);
                }

                // Create a new marker layer and add it to the map
                markerLayer = L.layerGroup();
                var marker = L.marker([lat, lng]);
                var popup = L.popup();

                // Use Nominatim to get the closest address to the marker location
                var url = 'https://nominatim.openstreetmap.org/reverse?lat=' + lat + '&lon=' + lng + '&format=json';
                $.getJSON(url, function(data) {
                    var address = data.display_name;
                    // Update the marker popup with the address
                    popup.setContent(address);
                    marker.bindPopup(popup);
                });
                markerLayer.addLayer(marker);
                map.addLayer(markerLayer);
                // Center the map on the new coordinates
                map.setView([lat, lng], 17);

                // Define the custom icon for the defibrillator
                var defibIcon = L.icon({
                    iconUrl: 'http://localhost/Sadna/images/defib-icon.png',
                    iconSize: [32, 32], // size of the icon
                    iconAnchor: [16, 16], // point of the icon which will correspond to marker's location
                    popupAnchor: [0, -16] // point from which the popup should open relative to the iconAnchor
                });

                $.ajax({
                    url: 'http://localhost/Sadna/player/pagehelpers/getdefilocation.php',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        location
                    },
                    success: function(data) {
                        // Loop through the response data and add a marker for each set of coordinates
                        for (var i = 0; i < data.length; i++) {
                            var lat_defi = data[i].latitude;
                            var lng_defi = data[i].longitude;
                            var location_name = data[i].location_name;
                            var location_description = data[i].location_description;
                            var street = data[i].location_street;
                            var street_num = data[i].location_street_num;

                            // Create the marker with the defibIcon and popup content
                            var marker = L.marker([lat_defi, lng_defi], {
                                    icon: defibIcon
                                })
                                .bindPopup("<b>" + location_name + "</b><br>" + location_description + "<br>" + street_num + " " + street);
                            markerLayer.addLayer(marker);
                        }
                        // Add the marker layer to the map
                        map.addLayer(markerLayer);
                    },
                });

            }
        })
        $(document).ready(function() {
            var reservation_Id = null
            var carousel = $('#reservationcarousel');
            // Add a click event listener to the "remove" button
            carousel.on('click', '.remove-row', function() {
                reservation_Id = $(this).data('id')
                $('#cancelReservationModal').show()
            })

            $('#confirmCancelReservation').on('click', function() {

                $.ajax({
                    url: 'http://localhost/Sadna/player/pagehelpers/remove_reservation.php', // The URL of the server-side script that will handle the AJAX request
                    method: 'POST',
                    data: {
                        reservation_Id: reservation_Id
                    }, // The data to be sent with the AJAX request (in this case, just the reservation ID)
                    success: function(response) {
                        // If the AJAX request was successful, remove the corresponding carousel item from the DOM
                        console.log('refresh done');
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        // If the AJAX request failed, log the error message to the console
                        console.error(error);
                    }
                });
            });

            $('.cancelaction,.btn-close').on('click', function() {
                $('#cancelReservationModal').hide();
            });
        });
    </script>

    <footer class="container">
        <p>&copy; 20232W89</p>
    </footer>


    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.1/dist/umd/popper.min.js"> </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <!-- QR Code Scanner Script -->
    <script>
        $(document).ready(function() {
            var scanner = new Instascan.Scanner({
                video: document.getElementById('preview')
            });
            scanner.addListener('scan', function(content) {
                scanner.stop();
                $("#qrModal .close").trigger("click");
                $.ajax({
                    url: 'http://localhost/Sadna/player/pagehelpers/arrivalverify.php',
                    type: 'POST',
                    data: {
                        username: '<?php echo $_SESSION['username']; ?>',
                        code: content
                    },
                    success: function(response) {
                        if (response === "good") {
                            $('#success-alert').html('You have been marked as arrived to the field.').fadeIn().delay(5000).fadeOut(); // show success alert message for 3 seconds
                        } else {
                            $('#error-alert').html('It seems you don\'t currently have a reservation.').fadeIn().delay(5000).fadeOut(); // show error alert message for 3 seconds
                        }
                    }
                })
            });
            $('#qrModal').on('shown.bs.modal', function(e) {
                console.log('Modal is shown.'); // Check if event listener is working
                Instascan.Camera.getCameras().then(function(cameras) {
                    console.log('Cameras found:', cameras); // Check if cameras are found
                    if (cameras.length > 0) {
                        scanner.start(cameras[0]);
                        console.log('Scanner started.'); // Check if scanner is started
                    } else {
                        alert('No cameras found.');
                    }
                }).catch(function(e) {
                    console.error(e);
                });
            });
            $('#qrModal').on('hidden.bs.modal', function(e) {
                scanner.stop();
            });
        });
    </script>

</body>

</html>