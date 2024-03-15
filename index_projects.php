<?php
include ("assets/php/config.php");
session_start();

if (isset ($_SESSION['User'])) {
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
        <section id="projects" class="menu">
            <div class="container">
                <div class="section-header">
                    <h2>Our Projects</h2>
                    <p>Check Our <span>Recent Projects</span></p>
                </div>
                <ul class="nav nav-tabs d-flex justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#menu-paete">
                            <h4>Paete</h4>
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade active show" id="menu-paete">
                        <div class="tab-header text-center">
                            <h3>Paete Laguna</h3>
                        </div>
                        <div class="row gy-5">
                            <div class="col-lg-4 menu-item">
                                <a href="assets/img/paete/1.jpg" class="glightbox"><img src="assets/img/paete/1.jpg"
                                        class="menu-img img-fluid" alt=""></a>
                            </div>
                            <div class="col-lg-4 menu-item">
                                <a href="assets/img/paete/2.jpg" class="glightbox"><img src="assets/img/paete/2.jpg"
                                        class="menu-img img-fluid" alt=""></a>
                            </div>
                            <div class="col-lg-4 menu-item">
                                <a href="assets/img/paete/3.jpg" class="glightbox"><img src="assets/img/paete/3.jpg"
                                        class="menu-img img-fluid" alt=""></a>
                            </div>
                            <div class="col-lg-4 menu-item">
                                <a href="assets/img/paete/4.jpg" class="glightbox"><img src="assets/img/paete/4.jpg"
                                        class="menu-img img-fluid" alt=""></a>
                            </div>
                            <div class="col-lg-4 menu-item">
                                <a href="assets/img/paete/5.jpg" class="glightbox"><img src="assets/img/paete/5.jpg"
                                        class="menu-img img-fluid" alt=""></a>
                            </div>
                            <div class="col-lg-4 menu-item">
                                <a href="assets/img/paete/6.jpg" class="glightbox"><img src="assets/img/paete/6.jpg"
                                        class="menu-img img-fluid" alt=""></a>
                            </div>
                            <div class="col-lg-4 menu-item">
                                <a href="assets/img/paete/7.jpg" class="glightbox"><img src="assets/img/paete/7.jpg"
                                        class="menu-img img-fluid" alt=""></a>
                            </div>
                            <div class="col-lg-4 menu-item">
                                <a href="assets/img/paete/8.jpg" class="glightbox"><img src="assets/img/paete/8.jpg"
                                        class="menu-img img-fluid" alt=""></a>
                            </div>
                            <div class="col-lg-4 menu-item">
                                <a href="assets/img/paete/9.jpg" class="glightbox"><img src="assets/img/paete/9.jpg"
                                        class="menu-img img-fluid" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>