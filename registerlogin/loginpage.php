<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Sign In</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://localhost/Sadna/registerlogin/registerloginhelper/style.css">
</head>

<header>
    <div class="container"> <img src="http://localhost/Sadna/images/4Playlogo.png"
            class=" mt-3 img-fluid mx-auto d-block w-auto" alt="Responsive image">
    </div>
</header>

<body>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4 my-5">
                <h2 class="text-center">Sign In</h2>
                <form action="http://localhost/Sadna/registerlogin/registerloginhelper/loginpagehelper.php"
                    class="needs-validation" method="post" novalidate>
                    <?php
                    //check if an error message is present in the URL query parameters
                    if (isset($_GET['error'])) {
                        $error = $_GET['error'];
                    }

                    //display the error message if it is set
                    if (isset($error)) {
                        echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
                    }
                    ?>
                    <div class="form-group col">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username"
                            placeholder="Enter username" required>
                        <div class="invalid-feedback">
                            The field cannot be empty </div>
                    </div>
                    <div class="form-group col">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password"
                            required>
                        <div class="invalid-feedback">
                            The field cannot be empty </div>
                    </div>
                    <button type="submit" class="btn btn-primary col-5 m-auto d-block">Sign In</button>
                    <p class="mt-3">Doesn't have an account yet? <a href="registration.html">Create an
                            account</a></p>
                </form>
            </div>
        </div>
    </div>

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

    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.1/dist/umd/popper.min.js"
        integrity="sha384-0oaoe+2KvlOJuz1tt0XTODM+5CvQFJ5/eg/pzLbdN/0pzxST36JgEJ+D5HSPSwKJ"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>