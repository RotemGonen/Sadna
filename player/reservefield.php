<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>4Play | fields</title>
    <style>
        th {
            position: sticky;
            top: -1%;
            background-color: white;
        }

        .checked {
            background-color: #cce7e8;
        }
    </style>
    <!-- CSS resources -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css">

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
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/Sadna/player/playerpage.php">Home </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="http://localhost/Sadna/player/reservefield.php">Reserve a sport
                        field</a>
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
                        <a class="dropdown-item" href="http://localhost/Sadna/player/about.php">About us</a>
                        <a class="dropdown-item" href="http://localhost/Sadna/registerlogin/loginpage.php">Sign out</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <main role="main">
        <div class="jumbotron">
            <div class="container">
                <h1 class="display-3">Creating a reservation</h1>
                <p>By using our platform, you can easily reserve a sports field in your area based on your preferences.
                    Simply select the sport you want to play, the location, and the date and time that works best for
                    you. If you're looking for some extra guidance or training, you can also select the option to meet
                    with a trainer. This will prompt you to enter some additional details so that we can match you with
                    the right trainer for your needs. With just a few clicks, you'll be well on your way to reserving
                    the perfect field and improving your skills!</p>
            </div>
        </div>

        <div class="container">

            <div class="row justify-content-around">
                <div class="col-md-5">
                    <div>
                        <div style="height:500px;">
                            <div id="map" class="w-100 h-100"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mt-3 m-md-0">
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
                                <option value="אולם ספורט">אולם ספורט</option>
                                <option value="מגרש ספורט">מגרש ספורט</option>
                                <option value="כדורגל">כדורגל</option>
                                <option value="כדורסל">כדורסל</option>
                                <option value="טניס">טניס</option>
                            </select>
                        </div>
                    </div>
                    <div class="row" id="form-row">
                        <div class="form-group col">
                            <!-- select start time bar -->
                            <Label for="starttime">Select start time:</Label>
                            <input type="time" class="form-control" id="starttime">
                        </div>
                        <div class="form-group col">
                            <!-- selece end time bar -->
                            <Label for="endtime">Select end time:</Label>
                            <input type="time" class="form-control" id="endtime">
                        </div>


                        <div class="form-group col">
                            <!-- search date bar -->
                            <Label for="datepicker">Choose date:</Label>
                            <input type="date" id="datepicker" class="form-control" autocomplete="off">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col" id="errorrow"></div>
                    </div>
                    <!-- the table element -->
                    <div class="table-responsive" style="max-height: 300px;height: 300px;">
                        <table class=" table">
                            <thead>
                                <tr>
                                    <th>Select</th>
                                    <th>Lighting</th>
                                    <th>Accessible</th>
                                    <th>Parking</th>
                                </tr>
                            </thead>
                            <tbody id="table-body">
                                <!-- Table rows with data here -->
                            </tbody>
                        </table>
                    </div>

                </div>
                <div class="col-md-6 offset-md-3 text-center mt-2">

                    <button class="btn btn-success btn-lg mb-2 mt-2" disabled id="confirmbutton">Reserve for your
                        team</button>
                </div>

                <div class="col-md-6 offset-md-3 text-center mt-2">
                    <label for="trainer-checkbox">
                        <input type="checkbox" id="trainer-checkbox">
                        Schedule with trainer
                    </label>

                    <div class="col-md-6 offset-md-3 text-center mt-2" id="successmsg">
                        <!-- success alert appear here -->
                    </div>
                </div>
            </div>

            <div class="" id="trainerChooserDiv">
                <!-- the table element -->
                <div class="table-responsive" style="max-height: 300px;height: 300px;">
                    <table class=" table">
                        <thead>
                            <tr>
                                <th>Photo</th>
                                <th>First name</th>
                                <th>Last name</th>
                                <th>Phone Number</th>
                                <th>Price</th>
                                <th>Choose</th>
                            </tr>
                        </thead>
                        <tbody id="trainer-table-body" class="">
                            <!-- Table rows with data here -->
                        </tbody>
                    </table>
                </div>
            </div>

        </div>


    </main>

    <footer class=" container">
        <p>&copy; 20232W89</p>
    </footer>

    <!-- jQuery script to retrieve data and update table -->
    <script>
        var selectedFieldId = null;
        var starttime = null;
        var endtime = null;
        var date = null;
        var flag = false;

        $(document).ready(function () {
            $('#trainerChooserDiv').hide();
            $(function () {
                var today = new Date().toISOString().split('T')[0];
                $('#datepicker').attr('min', today);
            });

            const startTime = document.getElementById('starttime');
            const endTime = document.getElementById('endtime');

            endTime.addEventListener('change', checkTimeDifference);
            startTime.addEventListener('change', checkTimeDifference);

            function checkTimeDifference() {
                const start = new Date(`01/01/2022 ${startTime.value}`);
                const end = new Date(`01/01/2022 ${endTime.value}`);

                const timeDiff = (end.getTime() - start.getTime()) / 1000 / 60; // Difference in minutes

                if (startTime.value !== "" && endTime.value !== "") {
                    let errorMessage = "";

                    // check for time difference
                    if (timeDiff < 45 || timeDiff > 90) {
                        errorMessage = "Please reserve at least 45 minutes, but no more than 90 minutes.";
                    }

                    // check for start and end times
                    if (startTime.value >= endTime.value) {
                        errorMessage = "The start time cannot be before or equal to the end time.";
                    }

                    if (errorMessage !== "") {
                        // Find existing alert, if any
                        const alertDiv = document.querySelector(".alert.alert-danger");

                        if (alertDiv) {
                            // Update existing alert's text, if it exists
                            alertDiv.textContent = errorMessage;
                            endTime.value = "";
                            flag = false;
                        } else {
                            // Create new alert if there isn't one already
                            const alertDiv = document.createElement("div");
                            alertDiv.classList.add("alert", "alert-danger");
                            alertDiv.classList.add("alert", "col");
                            alertDiv.textContent = errorMessage;

                            const inputRow = document.querySelector("#errorrow");
                            endTime.value = "";
                            flag = false;
                            inputRow.appendChild(alertDiv);

                            // Remove the alert after 5 seconds
                            setTimeout(() => {
                                alertDiv.remove();
                            }, 5000);
                        }
                    } else {
                        flag = true;
                        errorMessage = ""
                        setTimeout(() => {
                            $('#starttime').change();
                        }, 100);
                    }
                }
            }
        })

        $(document).ready(function () {

            // Get the checkbox and div elements
            var trainerCheckbox = $('#trainer-checkbox');
            var divElement = $('#trainerChooserDiv');

            // Hide the div by default
            divElement.hide();

            // Create an event listener for the checkbox
            trainerCheckbox.click(function () {
                if (this.checked) {

                } else {
                    // Checkbox is not checked, hide the div
                    divElement.hide();
                    // Check if the trainer checkbox is not checked
                    if (!$('#trainer-checkbox').prop('checked')) {

                        // The trainer checkbox is checked, do not execute the prior AJAX request
                        $('#starttime, #endtime, #datepicker').prop('readonly', false);
                        // Get the Select2 element
                        var select2Element = $('#location-search,#type-select');

                        // Disable the Select2 element
                        select2Element.prop('disabled', false);
                    }
                }
            });

            // check button logic
            const trainercheckbox = document.querySelector('#trainer-checkbox');
            const confirmButton = document.querySelector('#confirmbutton');

            trainercheckbox.addEventListener('change', () => {
                if (trainercheckbox.checked) {
                    confirmButton.textContent = 'Schedule with trainer!';
                } else {
                    confirmButton.textContent = 'Reserve for your team';
                }
            });

            // Listen for changes to location select dropdown and the type select dropdown
            $('#type-select,#location-search,#starttime,#datepicker,#endtime').on('change', function () {
                var location = $('#location-search').val();
                var type = $('#type-select').val();
                starttime = $('#starttime').val();
                endtime = $('#endtime').val();
                date = $('#datepicker').val();
                if (location && type && starttime && endtime && date && flag) {
                    // Send AJAX request to server to retrieve data
                    console.log('the refresh is run');
                    $('#confirmbutton').attr('disabled', true);
                    $.ajax({
                        url: 'http://localhost/Sadna/player/pagehelpers/retrieve_data.php',
                        method: 'POST',
                        data: { location: location, type: type, date: date, starttime: starttime, endtime: endtime },
                        dataType: 'json',
                        success: function (data) {
                            // Clear existing table rows
                            $('#table-body').empty();
                            // Append new rows to table
                            data.forEach(function (row) {
                                var tr = $('<tr>');
                                const latitude = row.latitude;
                                const longitude = row.longitude;
                                var selectButton = $('<button>').addClass('btn btn-secondary').text('Select');
                                selectButton.click(function () {
                                    changeCoords(latitude, longitude)
                                    $('tr').removeClass('checked');
                                    $(this).closest('tr').addClass('checked');
                                    selectedFieldId = row.id;
                                    $('#confirmbutton').attr('disabled', false);
                                });
                                const lighting = row.lighting;
                                const suitable_for_the_disabled = row.suitable_for_the_disabled;
                                const parking = row.parking;


                                tr.append($('<td>').append(selectButton));
                                tr.append($('<td>').text(lighting));
                                tr.append($('<td>').text(suitable_for_the_disabled));
                                tr.append($('<td>').text(parking));
                                $('#table-body').append(tr);
                            });
                        },
                        error: function (xhr, status, error) {
                            console.log('Error retrieving data:', error);
                        }
                    });
                } else {
                    // Clear table if no location is selected
                    $('#table-body').empty();
                }
            });
        });
        // function to get the city
        $(document).ready(function () {
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

        // Set up the map
        var map = L.map('map').setView([31.80309338, 35.10942674], 7);
        // Add the tile layer
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        }).addTo(map);
        var markerLayer = L.layerGroup().addTo(map);

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
        $('#confirmbutton').on('click', function () {
            // Check if the trainer checkbox is not checked
            if (!$('#trainer-checkbox').prop('checked')) {

                // The trainer checkbox is checked, do not execute the prior AJAX request
                $('#starttime, #endtime, #datepicker').prop('readonly', false);
                // Get the Select2 element
                var select2Element = $('#location-search,#type-select');

                // Disable the Select2 element
                select2Element.prop('disabled', false);
                // Execute the AJAX request
                $.ajax({
                    url: 'http://localhost/Sadna/player/pagehelpers/insert_reservation.php',
                    method: 'POST',
                    data: { id: selectedFieldId, date: date, starttime: starttime, endtime: endtime, player_username: '<?php echo $_SESSION["username"]; ?>' },
                    dataType: 'json',
                    success: function (data) {
                        $('#starttime').change();
                    },
                    error: function (xhr, status, error) {
                        // the error is Handling the response from server
                        $('#starttime').change();
                        $('#confirmbutton').attr('disabled', true);
                        $('#successmsg').after('<div class="alert alert-success" role="alert">Your reservation has been confirmed.</div>');
                        setTimeout(function () {
                            $('.alert').alert('close');
                        }, 5000);

                    }
                });
            } else {
                // The trainer checkbox is checked, do not execute the prior AJAX request
                $('#starttime, #endtime, #datepicker').prop('readonly', true);
                // Get the Select2 element
                var select2Element = $('#location-search,#type-select');

                // Disable the Select2 element
                select2Element.prop('disabled', true);

                $('#trainerChooserDiv').show();
                var location = $('#location-search').val();
                var type = $('#type-select').val();
                starttime = $('#starttime').val();
                endtime = $('#endtime').val();
                date = $('#datepicker').val();
                $.ajax({
                    url: 'http://localhost/Sadna/player/pagehelpers/retrieve_data_trainer.php',
                    method: 'POST',
                    data: { location: location, type: type, date: date, starttime: starttime, endtime: endtime },
                    dataType: 'json',
                    success: function (data) {
                        // Clear existing table rows
                        $('#trainer-table-body').empty();
                        // Append new rows to table
                        data.forEach(function (row) {
                            var tr = $('<tr>');
                            var photo = row.photo_path ? 'http://localhost/Sadna/images/' + row.photo_path : 'http://localhost/Sadna/images/default-avatar.png';
                            tr.append($('<td>').append($('<img>').attr('src', photo).addClass('img-fluid')));
                            tr.append($('<td>').text(row.first_name));
                            tr.append($('<td>').text(row.last_name));
                            tr.append($('<td>').text(row.phone));
                            tr.append($('<td>').text(row.trainer_price));
                            var button = $('<button>').addClass('btn btn-primary').text('Send Request');
                            button.on('click', function () {
                                // Send a PHP request with the row data
                                $.ajax({
                                    url: 'http://localhost/Sadna/player/pagehelpers/insert_reservation.php ',
                                    type: 'POST',
                                    data: { id: selectedFieldId, date: date, starttime: starttime, endtime: endtime, player_username: '<?php echo $_SESSION["username"]; ?>', trainer_username: row.trainer_username },
                                    success: function (response) {
                                        console.log('Request sent successfully:', response);
                                        $('#starttime, #endtime, #datepicker').prop('readonly', false);
                                        var select2Element = $('#location-search,#type-select');
                                        select2Element.prop('disabled', false);

                                        $('#successmsg').after('<div class="alert alert-success" role="alert">Your reservation has been confirmed.</div>');
                                        setTimeout(function () {
                                            $('.alert').alert('close');
                                        }, 5000);

                                        $('#trainer-checkbox').prop('checked', false);
                                        $('#trainerChooserDiv').hide();
                                    },
                                    error: function (xhr, status, error) {
                                        console.log('Error sending request:', error);
                                    }
                                });
                            });

                            tr.append($('<td>').append(button));
                            // Set the height and width of the column
                            tr.find('td:first-child').css({ 'height': '100px', 'width': '100px' });
                            $('#trainer-table-body').append(tr);
                        });
                    },
                    error: function (xhr, status, error) {
                        console.log('Error retrieving data:', error);
                    }
                });

            }
        });

    </script>
</body>

</html>