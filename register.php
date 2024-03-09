<?php
include("assets/php/config.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>CS DESIGN STUDIO</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <link href="assets/img/logo.jpg" rel="icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Amatic+SC:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="assets/css/main.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.all.min.js"></script>

</head>
<style>
    .menu-img {
        width: 100%;
        height: 100%;
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
    <header id="header" class="header fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">
            <a href="index.php" class="logo d-flex align-items-center me-auto me-lg-0">
                <h1>CS <span style="color:gray">Design Studio</span></h1>
            </a>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="login_user.php">Login</a></li>
                </ul>
            </nav>
            <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
            <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

        </div>
    </header>
    <main id="main">
        <section id="hero" class="hero align-items-center section-bg">
            <div class="container">
                <form method="post" action="assets/php/register.php">
                    <div class="row">
                        <div class="col-6">
                            <h6>Personal Information</h6>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="bi-person"></i></div>
                                </div>
                                <input type="text" class="form-control" placeholder="Name" required name="name"
                                    style="text-transform: uppercase">
                            </div>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="bi-person"></i></div>
                                </div>
                                <input type="text" class="form-control" placeholder="Last Name" required name="surname"
                                    style="text-transform: uppercase">
                            </div>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="bi-telephone"></i></div>
                                </div>
                                <input type="tel" class="form-control" placeholder="Contact No" required name="contact">
                            </div>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="bi-envelope"></i></div>
                                </div>
                                <input type="email" class="form-control" placeholder="Email" required name="email">
                            </div>
                            <h6>Address</h6>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="bi bi-geo-alt icon"></i></div>
                                </div>
                                <input style="text-transform: uppercase" type="text" class="form-control"
                                    placeholder="House No. / Street / Subdivision" required name="street">
                            </div>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="bi bi-geo-alt icon"></i></div>
                                </div>
                                <input type="text" style="text-transform: uppercase" class="form-control"
                                    placeholder="Barangay" required name="brgy">
                            </div>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="bi bi-geo-alt icon"></i></div>
                                </div>
                                <input type="text" class="form-control" style="text-transform: uppercase"
                                    placeholder="City" required name="city">
                            </div>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="bi bi-geo-alt icon"></i></div>
                                </div>
                                <input type="text" class="form-control" style="text-transform: uppercase"
                                    placeholder="Province" required name="province">
                            </div>
                        </div>
                        <div class="col-6">
                            <h6>Account Information</h6>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="bi-person"></i></div>
                                </div>
                                <input type="text" class="form-control" placeholder="Username" required name="uname">
                            </div>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="bi-person"></i></div>
                                </div>
                                <input type="Password" class="form-control" placeholder="Password" id="pword1" required
                                    name="pword">
                            </div>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="bi-person"></i></div>
                                </div>
                                <input type="password" class="form-control" placeholder="Re-Enter Password" id="pword2"
                                    onkeyup='passConfirm();' required>
                            </div>


                            <div class="input-group mb-2">
                                <input id="show" type="checkbox" onclick="showPass()">&nbsp;Show Password
                            </div>


                        </div>

                    </div>
                    <button type="submit" id="submit" style="float:right;"
                        class="btn btn-outline-dark">Register</button>
                </form>
            </div>

            </div>
        </section>
    </main>

    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script>
        function showPass() {
            var x = document.getElementById("pword1");
            var y = document.getElementById("pword2");
            if (x.type === "password") {
                x.type = "text";
                y.type = "text";
            } else {
                x.type = "password";
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
    </script>
</body>

</html>