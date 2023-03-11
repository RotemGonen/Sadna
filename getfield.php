<!DOCTYPE html>
<html>

<head>
    <title>Bootstrap Select Search Example</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
        integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg=="
        crossorigin="anonymous"></script>
</head>

<body>
    <!-- the select city element -->

    <select class="selectpicker form-control" data-live-search="true" id="location-select">
        <option value="">-- Select Location --</option>
        <?php
        // Make a connection to the database
        $host = "localhost";
        $username = "test";
        $password = "12345";
        $dbname = "sadna";
        $conn = new mysqli($host, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        // Query the table for location field
        $sql = "SELECT DISTINCT location FROM sportfields ORDER BY location ASC";
        $result = $conn->query($sql);
        // Loop through the results and create options
        while ($row = $result->fetch_assoc()) {
            echo "<option value=\"" . $row["location"] . "\">" . $row["location"] . "</option>";
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

    <!-- jQuery script to retrieve data and update table -->
    <script>
        $(document).ready(function () {
            // Listen for changes to location select dropdown
            $('#location-select').on('change', function () {
                var location = $(this).val();
                if (location) {
                    // Send AJAX request to server to retrieve data
                    $.ajax({
                        url: 'retrieve_data.php',
                        method: 'POST',
                        data: { location: location },
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