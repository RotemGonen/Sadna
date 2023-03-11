<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>4Play | fields</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
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
                <!-- the select city element -->
                <select class="selectpicker form-control" data-live-search="true" id="location-select">
                    <option value="">-- Select Location --</option>
                    <?php
                    // Make a connection to the database
                    $conn = mysqli_connect("localhost", "test", "12345", "sadna");
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    // Query the table for location field
                    $sql = "SELECT DISTINCT location FROM sportfield ORDER BY location ASC";
                    $result = $conn->query($sql);
                    // Loop through the results and create options
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value=\"" . $row["location"] . "\">" . $row["location"] . "</option>";
                    }
                    // Close the connection
                    $conn->close();
                    ?>
                </select>
                <select class="selectpicker form-control" data-live-search="true" id="type-select">
                    <option value="">-- Select Type --</option>
                    <?php
                    // Make a connection to the database
                    $conn = mysqli_connect("localhost", "test", "12345", "sadna");
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    // Query the table for type field
                    $sql = "SELECT DISTINCT type FROM sportfield ORDER BY type ASC";
                    $result = $conn->query($sql);
                    // Loop through the results and create options
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value=\"" . $row["type"] . "\">" . $row["type"] . "</option>";
                    }
                    // Close the connection
                    $conn->close();
                    ?>
                </select>
                <!-- the table element -->
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Location</th>
                                <th>X Axis</th>
                                <th>Y Axis</th>
                                <th>Type</th>
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
        integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg=="
        crossorigin="anonymous"></script>

    <!-- jQuery script to retrieve data and update table -->
    <script>
        $(document).ready(function () {
            // Listen for changes to location select dropdown
            $('#type-select').on('change', function () {
                var location = $('#location-select').val();
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
                                tr.append('<td>' + row.id + '</td>');
                                tr.append('<td>' + row.location + '</td>');
                                tr.append('<td>' + row.x_axis + '</td>');
                                tr.append('<td>' + row.y_axis + '</td>');
                                tr.append('<td>' + row.type + '</td>');
                                var selectButton = $('<button>').addClass('btn btn-primary').text('Select');
                                selectButton.click(function () {
                                    // Do something with the selected value
                                    alert(row.id)
                                });
                                tr.append($('<td>').append(selectButton));
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
    </script>
</body>

</html>