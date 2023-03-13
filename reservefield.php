<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>4Play | fields</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
        integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg=="
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>

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
            <div class="col">
                <!-- search city bar -->
                <select class="form-control" id="location-search" style="width: 100%">
                </select>
                <!-- search type bar -->
                <select class="form-control" id="type-select" style="width: 100%">
                    <option value="אולם ספורט">אולם ספורט</option>
                    <option value="מגרש ספורט">מגרש ספורט</option>
                    <option value="כדורגל">כדורגל</option>
                    <option value="כדורסל">כדורסל</option>
                    <option value="טניס">טניס</option>
                </select>
                <!-- the table element -->
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Map</th>
                                <th>Street</th>
                                <th>Number</th>
                            </tr>
                        </thead>
                        <tbody id="table-body">
                            <!-- Table rows with data here -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <footer class="container">
        <p>&copy; 20232W89</p>
    </footer>

    <!-- jQuery script to retrieve data and update table -->
    <script>
        $(document).ready(function () {
            // Listen for changes to location select dropdown and the type select dropdown
            $('#type-select,#location-search').on('change', function () {
                var location = $('#location-search').val();
                var type = $('#type-select').val();

                if (location && type) {
                    // Send AJAX request to server to retrieve data
                    $.ajax({
                        url: 'retrieve_data.php',
                        method: 'POST',
                        data: { location: location, type: type },
                        dataType: 'json',
                        success: function (data) {
                            // Clear existing table rows
                            $('#table-body').empty();
                            // Append new rows to table
                            data.forEach(function (row) {
                                var tr = $('<tr>');

                                var selectButton = $('<button>').addClass('btn btn-primary').text('Select');
                                selectButton.click(function () {
                                    // Do something with the selected value
                                    alert(row.id)
                                });
                                tr.append($('<td>').append(selectButton));

                                // Fetch the closest street name using OpenStreetMap Nominatim API
                                const latitude = row.latitude;
                                const longitude = row.longitude;
                                const url = `https://nominatim.openstreetmap.org/reverse?lat=${latitude}&lon=${longitude}&zoom=18&format=json`;
                                fetch(url)
                                    .then(response => response.json())
                                    .then(data => {
                                        if (data.address) {
                                            const address = data.address;
                                            const street = address.road || 'NA';
                                            const houseNumber = address.house_number || 'NA';
                                            tr.append('<td>' + street + '</td>'); // Add the street name and number to the table row
                                            tr.append('<td>' + houseNumber + '</td>'); // Add the street name and number to the table row
                                        }
                                    })
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

    </script>
</body>

</html>