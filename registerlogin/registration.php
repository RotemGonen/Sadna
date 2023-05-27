<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Registration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="http://irrotemamr.mtacloud.co.il/registerlogin/registerloginhelper/style.css" defer>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js" defer></script>


</head>

<header>
</header>

<body>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-5 mt-5">
                <h2 class="text-center"><b>Registration</b></h2>
                <form class=" mx-5 needs-validation"
                    action="http://irrotemamr.mtacloud.co.il/registerlogin/registerloginhelper/registration.php"
                    method="post" novalidate>
                    <div class="form-group mb-2">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username"
                            placeholder="Enter username" required pattern="^[a-zA-Z]{2}[a-zA-Z0-9]*$">
                        <div class="invalid-feedback" id="usernamevalid">
                            Please choose a username that starts with at least 2 letters.
                        </div>
                    </div>
                    <div class="form-group mb-2">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password"
                            required pattern="^[a-zA-Z0-9]{5,}">
                        <div class="invalid-feedback">
                            Please insert a password that contain at least 5 characters.
                        </div>

                    </div>
                    <div class="row mb-2">
                        <div class="col"> <label for="first_name">First name</label>
                            <input type="text" class="form-control" id="first_name" name="first_name"
                                placeholder="First name" required pattern="^[A-Za-z]{2,30}$">
                            <div class="invalid-feedback">
                                Please insert only letters. </div>
                        </div>

                        <div class="col"> <label for="last_name">Last name</label>
                            <input type="text" class="form-control" id="last_name" name="last_name"
                                placeholder="Last name" required pattern="^^[A-Za-z]{2,30}$">
                            <div class="invalid-feedback">
                                Please insert only letters. </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col"> <label for="date_of_birth">Date of birth</label>
                            <input type="date" class="form-control" id="date_of_birth" name="date_of_birth"
                                placeholder="date of birth" required>
                            <div class="invalid-feedback">
                                The field cannot be empty </div>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="form-group col">
                            <label for="location-search"> Search city name:</label>
                            <select class="form-control" id="location-search" name="city" style="width: 100%" required>
                                <option value="">Select a city</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select a city.
                            </div>
                        </div>

                    </div>

                    <div class="form-group mb-2">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                        <div class="invalid-feedback">
                            Please enter a valid email address.
                        </div>
                    </div>

                    <div class="form-group mb-2">
                        <label for="phone">Phone Number</label>
                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="Phone Number"
                            required>
                        <div class="invalid-feedback">
                            Please enter a valid phone number.
                        </div>
                    </div>

                    <div class="input-group col-6 mt-4">
                        <label class="input-group-text" for="inputGroupSelect">Select your account type:</label>
                        <select class="form-select" id="inputGroupSelect" name="account_type">
                            <option value="player">player</option>
                            <option value="trainer">trainer</option>
                        </select>
                    </div>
                    <button class="mt-4 mx-auto signlog" type="submit" name="submit">Register</button>
            </div>
            </form>
        </div>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script>
        (function () {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')
            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function (form) {
                    form.addEventListener('submit', function (event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }
                        form.classList.add('was-validated')
                    }, false)
                })
        })()


        // setting the max to today
        $(document).ready(function () {
            var today = new Date();
            var year = today.getFullYear();
            var month = today.getMonth() + 1;
            var day = today.getDate();
            if (month < 10) {
                month = '0' + month;
            }
            if (day < 10) {
                day = '0' + day;
            }
            var maxDate = year + '-' + month + '-' + day;
            $('input[type="date"]').attr('max', maxDate);
        })
        // function to get the city
        $(document).ready(function () {
            $('#location-search').select2({
                theme: "classic",
                placeholder: "Search city(Hebrew) ...",
                ajax: {
                    url: 'http://irrotemamr.mtacloud.co.il/player/pagehelpers/retrieve_locations.php',
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
            // make sure the user name is not already taken
            $('#username').change(function () {
                var username = $(this).val();
                $.post('http://irrotemamr.mtacloud.co.il/registerlogin/registerloginhelper/check_username.php', { username: username }, function (data) {
                    if (data == 'taken') {
                        $('#usernamevalid').html('Username already taken');
                        $('#username').addClass('is-invalid');
                        $('#username').val('')
                        $('#username').attr('placeholder', (username.toLowerCase()));
                    } else {
                        $('#usernamevalid').html('Please choose a username that starts with at least 2 letters.');
                        $('#username').removeClass('is-invalid');
                        $('#username').attr('placeholder', ('Enter username'));
                    }
                });
            });
        });
    </script>
</body>

</html>