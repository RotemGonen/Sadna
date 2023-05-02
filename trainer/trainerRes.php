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
                    <a class="nav-link" href="http://localhost/Sadna/trainer/playerpage.php">Home </a>
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
                <h1 class="display-3">Coach Availability</h1>
                <p>We aim to maximize the connection between coaches and players, 
                while ensuring coaches have a fair opportunity to earn a steady income. 
                Our priority is to emphasize the availability of coaches to ensure an optimal match with players.</p>
            </div>
        </div>

        <div class="container">
  <div class="row justify-content-around">
    <div class="col-md-5">
      <img src="http://localhost/Sadna/images/Coach.jpg" class="img-fluid">
    </div>
    <div class="col-md-6 mt-3 m-md-0">
      <!-- search city bar -->
      <div class="row">
        <div class="form-group col-6 col-md-6">
          <label for="location-search" class="form-label">Search city name in Hebrew:</label>
          <select class="form-select" id="location-search" style="width: 100%"></select>
        </div>
        <div class="form-group col">
          <label for="chooseSport" class="form-label">Sport type:</label>
          <select class="form-select" id="sport_type" style="width: 100%">
            <option value="תחום ספורט">תחום ספורט</option>
            <option value="כדורגל">כדורגל</option>
            <option value="כדורסל">כדורסל</option>
            <option value="טניס">טניס</option>
          </select>                  
        </div>
      </div>
      <div class="row" id="form-row">
        <div class="col-md-6 mt-3 m-md-0">
          <!-- select start time bar -->
          <label for="starttime" class="form-label">Select start time:</label>
          <input type="time" class="form-control" id="starttime">
        </div>
        <div class="form-group col">
          <!-- select end time bar -->
          <label for="endtime" class="form-label">Select end time:</label>
          <input type="time" class="form-control" id="endtime">
        </div>
        <div class="form-group col">
          <!-- search date bar -->
          <label for="datepicker" class="form-label">From date:</label>
          <input type="date" id="datepickers" class="form-control" autocomplete="off">
        </div>
        <div class="form-group col">
          <!-- search date bar -->
          <label for="datepicker" class="form-label">To date:</label>
          <input type="date" id="datepickere" class="form-control" autocomplete="off">
        </div>
        <div class="form-group col">
          <label for="inputPrice" class="form-label">Price:</label>
          <input type="number" min="1" max="10000000000" class="form-control" id="price" name="price" placeholder="Price" autocomplete="off" required>
        </div>
      </div>
      <div class="row justify-content-center">
      <div class="col-md-4 text-center mt-2">
         <button class="btn btn-success btn-lg mb-2 mt-2" id="service" onclick="offerfunc()" style="width: 200px;">Offer Your Service</button>
      </div>
      </div>
       
        <div class="col-md-6 text-center mt-2">
        <div class="col-md-6 offset-md-3 text-center mt-2" id="successmsg">
        <!-- success alert appear here -->
        </div>
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

        $(document).ready(function() {
            $('#trainerChooserDiv').hide();
            $(function() {
                var today = new Date().toISOString().split('T')[0];
                $('#datepicker').attr('min', today);
            });
            const startTime = document.getElementById('starttime');
            const endTime = document.getElementById('endtime');


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

                            flag = false;
                            inputRow.appendChild(alertDiv);

                            // Remove the alert after 5 seconds
                            setTimeout(() => {
                                alertDiv.remove();
                                endTime.value = "";
                            }, 3000);
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
        )

        $(document).ready(function() {

            $('#confirmReservation').on('click', function() {
                $('#ReservationModal').hide();
            });

            // Get the checkbox and div elements
            var trainerCheckbox = $('#trainer-checkbox');
            var divElement = $('#trainerChooserDiv');

            // Hide the div by default
            divElement.hide();

            // Create an event listener for the checkbox
            trainerCheckbox.click(function() {
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
                        var timeselector = $('#starttime,#endtime');
                        // Disable the Select2 element
                        select2Element.prop('disabled', false);
                        timeselector.prop('disabled', false)
                    }
                }
            });

            // check button logic
            const trainercheckbox = document.querySelector('#trainer-checkbox');
            const confirmButton = document.querySelector('#confirmbutton');

            

            // Listen for changes to location select dropdown and the type select dropdown
            $('#type-select,#location-search,#starttime,#datepicker,#endtime').on('change', function() {
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
                        data: {
                            location: location,
                            type: type,
                            date: date,
                            starttime: starttime,
                            endtime: endtime,
                        },
                        dataType: 'json',
                        success: function(data) {
                            // Clear existing table rows
                            $('#table-body').empty();
                            // Append new rows to table
                            data.forEach(function(row) {
                                var tr = $('<tr>');
                                const latitude = row.latitude;
                                const longitude = row.longitude;
                                var selectButton = $('<button>').addClass('btn btn-secondary').text('Select');
                                selectButton.click(function() {
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
                        error: function(xhr, status, error) {
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
        });

      
        // Add the tile layer
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {}).addTo(map);
        var markerLayer = L.layerGroup().addTo(map);

  
        $('#confirmbutton').on('click', function() {
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
                    data: {
                        id: selectedFieldId,
                        date: date,
                        starttime: starttime,
                        endtime: endtime,
                        player_username: '<?php echo $_SESSION["username"]; ?>'
                    },
                    dataType: 'json',
                    success: function(data) {
                        $('#starttime').change();
                    },
                    error: function(xhr, status, error) {
                        // the error is Handling the response from server
                        $('#starttime').change();
                        $('#confirmbutton').attr('disabled', true);
                        $('#ReservationModal').show();
                    }
                });
            } else {
                // The trainer checkbox is checked, do not execute the prior AJAX request
                $('#datepicker').prop('readonly', true);
                // Get the Select2 element
                var select2Element = $('#location-search,#type-select');
                var timeselector = $('#starttime,#endtime');
                // Disable the Select2 element
                select2Element.prop('disabled', true);
                timeselector.prop('disabled', true)
                $('#trainerChooserDiv').show();
                // Scroll to the div with ID "myDiv" using the scrollTo plugin
                $.scrollTo('#trainerChooserDiv', 1000); // Scroll animation time in milliseconds
                var location = $('#location-search').val();
                var type = $('#type-select').val();
                starttime = $('#starttime').val();
                endtime = $('#endtime').val();
                date = $('#datepicker').val();
                $.ajax({
                    url: 'http://localhost/Sadna/player/pagehelpers/retrieve_data_trainer.php',
                    method: 'POST',
                    data: {
                        location: location,
                        type: type,
                        date: date,
                        starttime: starttime,
                        endtime: endtime
                    },
                    dataType: 'json',
                    success: function(data) {
                        // Clear existing table rows
                        $('#trainer-table-body').empty();
                        // Append new rows to table
                        data.forEach(function(row) {
                            var tr = $('<tr>');
                            var photo = row.photo_path ? 'http://localhost/Sadna/images/profile/' + row.photo_path : 'http://localhost/Sadna/images/profile/default-avatar.png';
                            tr.append($('<td>').append($('<img>').attr('src', photo).addClass('img-fluid')));
                            tr.append($('<td>').text(row.first_name));
                            tr.append($('<td>').text(row.last_name));
                            tr.append($('<td>').text(row.phone));
                            tr.append($('<td>').text(row.trainer_price));
                            var button = $('<button>').addClass('btn btn-primary confirm').text('Send Request');
                            button.on('click', function() {
                                // Send a PHP request with the row data
                                $.ajax({
                                    url: 'http://localhost/Sadna/player/pagehelpers/insert_reservation.php ',
                                    type: 'POST',
                                    data: {
                                        id: selectedFieldId,
                                        date: date,
                                        starttime: starttime,
                                        endtime: endtime,
                                        player_username: '<?php echo $_SESSION["username"]; ?>',
                                        trainer_username: row.trainer_username
                                    },
                                    success: function(response) {
                                        console.log('Request sent successfully:', response);
                                        $('#starttime, #endtime, #datepicker').prop('readonly', false);
                                        var select2Element = $('#location-search,#type-select');
                                        select2Element.prop('disabled', false);

                                        $('#trainer-checkbox').prop('checked', false);
                                        $('#trainerChooserDiv').hide();
                                        $('#ReservationModal').show();
                                        var select2Element = $('#location-search,#type-select');
                                        var timeselector = $('#starttime,#endtime');
                                    },
                                    error: function(xhr, status, error) {
                                        console.log('Error sending request:', error);
                                    }
                                });
                            });

                            tr.append($('<td>').append(button));
                            // Set the height and width of the column
                            tr.find('td:first-child').css({
                                'height': '100px',
                                'width': '100px'
                            });
                            $('#trainer-table-body').append(tr);
                        });

                        if ($('#trainer-table-body tr').length === 0) {
                            // If no rows, add a new row with a message
                            $('#trainer-table-body').append('<tr><td colspan="6" class="no-rows text-center font-weight-bold">No rows found</td></tr>');

                        }

                    },
                    error: function(xhr, status, error) {
                        console.log('Error retrieving data:', error);
                    }
                });
            }
        });

        $(document).ready(function() {
            flatpickr('#starttime', {
                enableTime: true,
                noCalendar: true,
                dateFormat: "H:i",
                time_24hr: true,
                minuteIncrement: 15,
                minTime: "07:00",
                maxTime: "23:00",
                defaultDate: new Date()
            });

            flatpickr('#endtime', {
                enableTime: true,
                noCalendar: true,
                dateFormat: "H:i",
                time_24hr: true,
                minuteIncrement: 15,
                minTime: "07:00",
                maxTime: "23:00",
                defaultDate: new Date()
            });


            $('#alert-btn').on('click', function() {
                var selectedTime = $('#starttime').val();
                alert('Selected Time: ' + selectedTime);
            });

        
     });



function offerfunc() {
  var sport_type = $('#sport_type').val();
  var starttime = $('#starttime').val();
  var endtime = $('#endtime').val();
  var datepickers = $('#datepickers').val();
  var datepickere = $('#datepickere').val();
  var price = $('#price').val();
  var city = $('#location-search').val();
  alert("done")
  $.ajax({
    url: 'http://localhost/Sadna/trainer/insert_trainer.php',
    type: 'GET',
    data: { 
      sport_type: sport_type, 
      starttime: starttime, 
      endtime: endtime, 
      datepickers: datepickers, 
      datepickere: datepickere, 
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
    </script>
</body>

</html>