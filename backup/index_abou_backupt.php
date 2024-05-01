<?php
include ("assets/php/config.php");
session_start();

if (isset($_SESSION['User'])) {
    header("Location: " . $folder . "user/user_index.php");
    exit();
}
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
</head>
<style>
    .menu-img {
        width: 100%;
        height: 100%;
    }
</style>

<body>
    <header id="header" class="header fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">
            <a href="index.php" class="logo d-flex align-items-center me-auto me-lg-0">
                <h1>CS <span style="color:gray">Design Studio</span></h1>
            </a>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="index_about.php">About</a></li>
                    <li><a href="index_projects.php">Projects</a></li>
                    <li><a href="index_contacts.php">Contact</a></li>
                    <li><a href="login_user.php">Login</a></li>
                </ul>
            </nav>
            <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
            <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

        </div>
    </header>
    <main id="main" style="margin-top:2%">
        <section id="about" class="why-us section-bg">
            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-4">
                        <div class="why-box">
                            <h3>Why Choose CS Design Studio</h3>
                            <p>
                                Our mission is to create a space of beauty, functionality, and comfort that perfectly
                                matches your personality and your business or family's needs. We achieve this by
                                considering every facet of your life – including your daily rituals, profession, hobbies
                                and of course design tastes. CS Design Studio aim to translate the client's ideas and
                                the professional holistic vision in a renovated space combining aesthetics, comfort and
                                practicality.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-8 d-flex align-items-center">
                        <div class="row gy-4">

                            <div class="col-xl-4">
                                <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                                    <i class="bi bi-clipboard-data"></i>
                                    <h4>Interior Designs</h4>
                                    <p> improve the effectiveness, accessibility, functionality and aesthetic appeal of
                                        an environment in a way that ensures the safe and optimal occupation and use of
                                        the interior space</p>
                                </div>
                            </div>

                            <div class="col-xl-4">
                                <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                                    <i class="bi bi-gem"></i>
                                    <h4>Furnitures</h4>
                                    <p>structurally sound, solid and well-built to ensure its prolonged use over the
                                        years. You should feel safe when sitting in, or leaning on the piece, and you
                                        shouldn't be able to recognize any sway, give or flex in it</p>
                                </div>
                            </div>

                            <div class="col-xl-4">
                                <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                                    <i class="bi bi-inboxes"></i>
                                    <h4>Printing Services</h4>
                                    <p>large and small print runs, finishing services such as folding, trimming and
                                        bindery, large format printing of posters and banners, and much more</p>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

            </div>
        </section>
    </main>
    <footer id="footer" class="footer fixed-bottom">
        <div class="container">
            <div class="row gy-3">
                <div class="col-lg-3 col-md-6 d-flex">
                    <i class="bi bi-geo-alt icon"></i>
                    <div>
                        <h4>Address</h4>
                        <p>
                            Brgy. Pagsawitan <br>
                            Santa Cruz Laguna<br>
                        </p>
                    </div>

                </div>

                <div class="col-lg-3 col-md-6 footer-links d-flex">
                    <i class="bi bi-telephone icon"></i>
                    <div>
                        <h4>For Estimate/Canvas</h4>
                        <p>
                            <strong>Phone:</strong> (+63) 956 068 8086 <br>
                            <strong>Email:</strong> tjrc_11@yahoo.com<br>
                        </p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 footer-links d-flex">
                    <i class="bi bi-clock icon"></i>
                    <div>
                        <h4>Opening Hours</h4>
                        <p>
                            <span style="color:green">Always Open</span>
                        </p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Follow Us</h4>
                    <div class="social-links d-flex">
                        <a href="https://www.facebook.com/CALLADOSUNGA.DESIGNSTUDIO" target="_blank" class="facebook"><i
                                class="bi bi-facebook"></i></a>
                    </div>
                </div>

            </div>
        </div>
    </footer>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>