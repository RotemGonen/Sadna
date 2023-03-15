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
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
        integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
        integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
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
                <li class="nav-item">
                    <a class="nav-link" href="#">Home </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Reserve a sport field</a>
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
                        <a class="dropdown-item" href="#">Manage user</a>
                        <a class="dropdown-item" href="#">About us</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <main role="main">
        <div class="jumbotron">
            <div class="container">
                <h1 class="display-3">Hello, *user*</h1>
                <p><span class="font-weight-bold">It's good to see you here!</span>
                    Tired of the hassle of arriving at your local park with your team,
                    only to find it already occupied? Say goodbye to disappointment and hello to convenience with our
                    cutting-edge platform! With just a few clicks, you can locate available sports fields in your area
                    and be on your way to your next epic game. Don't let a crowded park get in the way of your victory!
                </p>
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
                            <label for="location-search"> Search city name in Hebrew:</label>
                            <select class="form-control" id="location-search" style="width: 100%">
                            </select>
                        </div>
                        <div class="form-group col-6 col-md-5">
                            <!-- search type bar -->
                            <Label for="type-select">Select sport field type:</Label>
                            <select class="form-control" id="type-select" style="width: 100%">
                                <option value="אולם ספורט">אולם ספורט</option>
                                <option value="מגרש ספורט">מגרש ספורט</option>
                                <option value="כדורגל">כדורגל</option>
                                <option value="כדורסל">כדורסל</option>
                                <option value="טניס">טניס</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <!-- search date bar -->
                            <Label for="datepicker">Choose date:</Label>
                            <input type="date" id="datepicker" class="form-control" autocomplete="off">
                        </div>
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
                    </div>
                    <!-- the table element -->
                    <div class="table-responsive" style="max-height: 300px;height: 300px;">
                        <table class=" table">
                            <thead>
                                <tr>
                                    <th>Show</th>
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

                    <button class="btn btn-success btn-lg mb-2 mt-2" disabled id="confirmbutton">Confirm</button>
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

        $(document).ready(function () {
            // Listen for changes to location select dropdown and the type select dropdown
            $('#type-select,#location-search,#starttime,#datepicker,#endtime').on('change', function () {
                var location = $('#location-search').val();
                var type = $('#type-select').val();
                starttime = $('#starttime').val();
                endtime = $('#endtime').val();
                date = $('#datepicker').val();

                if (location && type && starttime && endtime && date) {
                    // Send AJAX request to server to retrieve data
                    console.log(event.type);
                    $.ajax({
                        url: 'retrieve_data.php',
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
                                var selectButton = $('<button>').addClass('btn btn-secondary').text('Show');
                                selectButton.click(function () {
                                    changeCoords(latitude, longitude)
                                    $('tr').removeClass('checked');
                                    $(this).closest('tr').addClass('checked');
                                    selectedFieldId = row.id;
                                    $('#confirmbutton').removeAttr("disabled");
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
                placeholder: "Search city...",
                ajax: {
                    url: 'retrieve_locations.php',
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



        $(document).ready(function () {
        })

        $('#confirmbutton').on('click', function () {
            $.ajax({
                url: 'insert_reservation.php',
                method: 'POST',
                data: { id: selectedFieldId, date: date, starttime: starttime, endtime: endtime },
                dataType: 'json',
                success: function (data) {
                },
                error: function (xhr, status, error) {
                    // Handle error response from server
                    console.log(xhr.responseText);
                }
            });
            // trigger reload the table eventד
            $('#starttime').change();

        });

    </script>
</body>

</html>