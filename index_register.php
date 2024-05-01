<?php
include ("assets/php/config.php");
session_start();
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CS DESIGN STUDIO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;1,200&display=swap"
        rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.all.min.js"></script>
</head>
<style>
    body {
        background-color: #191919;
        color: white;
        font-family: "Montserrat", sans-serif;
        font-optical-sizing: auto;
        font-weight: <weight>;
        font-style: normal;
    }

    .dropdown-menu {
        background-color: black;
    }

    .dropdown-item {
        color: white;
    }

    .nav-item {
        font-size: 20px;
        margin: 0 5px 5px 0
    }

    .border-bottom {
        border: none;
        border-bottom: 5px solid black;
        padding: 5px 10px;
        outline: none;
        border-radius: 0%;
    }

    .border-bottom:focus {
        border-color: none;
        outline: none;
        outline-width: 0;
    }

    .dropdown:hover>.dropdown-menu {
        display: block;
    }

    .dropdown>.dropdown-toggle:active {
        /*Without this, clicking will make it sticky*/
        pointer-events: none;
    }
</style>

<body>
    <div>
        <?php if (isset($_SESSION["status"]) && $_SESSION['status'] == 'success'): ?>
            <script>
                Swal.fire({
                    icon: 'success',
                    text: '<?php echo $_SESSION['message'] ?>',
                })

            </script>
        <?php elseif (isset($_SESSION["status"]) && $_SESSION['status'] == 'error'): ?>
            <script>
                Swal.fire({
                    icon: 'error',
                    text: '<?php echo $_SESSION['message'] ?>',
                })

            </script>
        <?php elseif (isset($_SESSION["status"]) && $_SESSION['status'] == 'download'): ?>
            <script>
                Swal.fire({
                    title: 'Congrats',
                    text: "Your PDS is now generated and ready to download",
                    icon: 'success',
                    confirmButtonText: '<a href="completed/<?php echo $_SESSION['message'] ?>" download style="color:white;">Download</a>',
                    allowOutsideClick: false,
                    allowEscapeKey: false
                })

            </script>
        <?php endif; ?>
        <?php unset($_SESSION['message']); ?>
        <?php unset($_SESSION['status']); ?>
    </div>
    <nav class="navbar navbar-expand-lg bg-black" style="padding: 40px">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="assets/img/logo.jpg" style="width:50px;"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                </ul>
                <form class="d-flex" role="search">
                </form>
                <div class="navbar-nav my-2  my-lg-0 navbar-nav-scroll">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php" style="color:white;">HOME</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false" style="color:white;">
                            ABOUT US
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="index_about.php">CS DESIGN STUDIO</a></li>
                            <li><a class="dropdown-item" href="index_services.php">SERVICES</a></li>
                            <li><a class="dropdown-item" href="index_portfolio.php">PORTFOLIO</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index_shop.php" style="color:white;">SHOP</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index_contact.php" style="color:white;">CONTACT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index_login.php" style="color:white;">LOGIN</a>
                    </li>
                </div>
            </div>
        </div>
    </nav>
    <div class="container d-flex justify-content-center" style="margin-top:2%">
        <div class="container" style="border-radius:10px; background-color:rgb(41, 46, 61)">
            <br>
            <br>
            <h1 style="text-align: center;font-weight:bold;">SIGN UP</h1>
            <div class="row">
                <div class="col-lg-1">

                </div>
                <div class="col-lg-10">
                    <form method="post" action="assets/php/register.php">
                        <div class="row">
                            <div class="col-6">
                                <h6>Personal Information</h6>
                                <div class="input-group mb-2">
                                    <input type="text" class="form-control" placeholder="Name" required name="name"
                                        style="text-transform: uppercase">
                                </div>
                                <div class="input-group mb-2">
                                    <input type="text" class="form-control" placeholder="Last Name" required
                                        name="surname" style="text-transform: uppercase">
                                </div>
                                <div class="input-group mb-2">
                                    <input type="num" class="form-control" placeholder="Contact No" required
                                        name="contact" pattern="^(09|\+639)\d{9}$">
                                </div>
                                <div class="input-group mb-2">
                                    <input type="email" class="form-control" placeholder="Email" required name="email">
                                </div>
                                <h6>Address</h6>
                                <div class="input-group mb-2">
                                    <select name="region" class="form-control form-control-md" id="region">

                                    </select>
                                    <input type="hidden" class="form-control form-control-md" name="region_text"
                                        id="region-text" required>
                                </div>
                                <div class="input-group mb-2">
                                    <select name="province" class="form-control form-control-md" id="province">

                                    </select>
                                    <input type="hidden" class="form-control form-control-md" name="province_text"
                                        id="province-text" required>
                                </div>
                                <div class="input-group mb-2">
                                    <select name="city" class="form-control form-control-md" id="city">

                                    </select>
                                    <input type="hidden" class="form-control form-control-md" name="city_text"
                                        id="city-text" required>
                                </div>
                                <div class="input-group mb-2">
                                    <select name="barangay" class="form-control form-control-md" id="barangay">

                                    </select>
                                    <input type="hidden" class="form-control form-control-md" name="brgy_text"
                                        id="barangay-text" required>
                                </div>
                                <div class="input-group mb-2">

                                    <input type="text" class="form-control form-control-md" name="street_text"
                                        id="street-text" placeholder="Street (Optional)">
                                </div>
                            </div>
                            <div class="col-6">
                                <h6>Account Information</h6>
                                <div class="input-group mb-2">
                                    <input type="text" class="form-control" placeholder="Username" required
                                        name="uname">
                                </div>
                                <div class="input-group mb-2">
                                    <input type="Password" class="form-control" placeholder="Password" id="pword1"
                                        required name="pword">
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="toggle-password bi-eye-fill"
                                                id="toggle-password" onclick="showPassword();"></i></span>
                                    </div>

                                </div>
                                <div class="input-group mb-2">
                                    <input type="password" class="form-control" placeholder="Re-Enter Password"
                                        id="pword2" onkeyup='passConfirm();' required>
                                    <div class="input-group-append">
                                        <span class="input-group-text"><i class="toggle-password bi-eye-fill"
                                                onclick="showPassword2();"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" id="submit" style="float:right;"
                            class="btn btn-outline-light">Register</button>
                        <br>
                        <br>
                        <br>
                    </form>

                </div>
                <div class="col-lg-1">

                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <script src="assets/js/ph-address-selector.js"></script>
    <script>
        function showPassword2() {
            $('#toggle-password2').toggleClass("bi-eye-fill bi-eye-slash-fill");
            var y = document.getElementById("pword2");
            if (y.type === "password") {
                y.type = "text";
            } else {
                y.type = "password";
            }
        }
        var passConfirm = function () {
            if (document.getElementById("pword1").value == document.getElementById("pword2").value) {
                document.getElementById("pword1").style.border = "1px solid rgb(209, 211, 226)";
                document.getElementById("pword2").style.border = "1px solid rgb(209, 211, 226)";
                document.getElementById('submit').disabled = false;
            } else {
                document.getElementById("pword1").style.border = "2px solid red";
                document.getElementById("pword2").style.border = "2px solid red";
                document.getElementById('submit').disabled = true;
            }
        }

        function showPassword() {
            $('#toggle-password').toggleClass("bi-eye-fill bi-eye-slash-fill");
            var x = document.getElementById("pword1");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }

    </script>
</body>

</html>