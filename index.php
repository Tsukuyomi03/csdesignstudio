<?php
include("assets/php/config.php");
session_start();

if (isset($_SESSION['User'])) {
    header('Location: user_index.php');
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
                    <li><a href="#hero">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#projects">Projects</a></li>
                    <li><a href="#contact">Contact</a></li>
                    <li><a href="login_user.php">Login</a></li>
                </ul>
            </nav>
            <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
            <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

        </div>
    </header>
    <section id="hero" class="hero d-flex align-items-center section-bg">
        <div class="container">
            <div class="row justify-content-between gy-5">
                <div
                    class="col-lg-5 order-2 order-lg-1 d-flex flex-column justify-content-center align-items-center align-items-lg-start text-center text-lg-start">
                    <h2>CS <span style="color:gray;">Design Studio</span> </h2>
                    <p>is a interior and exterior designer company it offers design and build for the customer
                        convinience.</p>
                    <div class="d-flex">
                    </div>
                </div>
                <div class="col-lg-5 order-1 order-lg-2 text-center text-lg-start">
                    <img src="assets/img/modular_kitchen.jpg" class="img-fluid" alt="" data-aos="zoom-out"
                        data-aos-delay="300">
                </div>
            </div>
        </div>
    </section>
    <main id="main">
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
        <section id="contact" class="contact">
            <div class="container">
                <div class="section-header">
                    <h2>Contact</h2>
                    <p>Need Help? <span style="color:gray;">Contact Us</span></p>
                </div>
                <div>
                    <div style="max-width:100%;overflow:hidden;color:red;width:100%;height:500px;">
                        <div id="canvas-for-googlemap" style="height:100%; width:100%;max-width:100%;"><iframe
                                style="height:100%;width:100%;border:0;" frameborder="0"
                                src="https://www.google.com/maps/embed/v1/place?q=14.27180718647457,+121.42470728378021&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8"></iframe>
                        </div><a class="code-for-google-map" href="https://www.bootstrapskins.com/themes"
                            id="authorize-map-data"></a>
                        <style>
                            #canvas-for-googlemap img {
                                max-width: none !important;
                                background: none !important;
                                font-size: inherit;
                                font-weight: inherit;
                            }
                        </style>
                    </div>
                </div>
                <br>
                <div class="row gy-4">
                    <div class="col-md-6">
                        <div class="info-item  d-flex align-items-center">
                            <i class="icon bi bi-map flex-shrink-0" style="background-color:black;"></i>
                            <div>
                                <h3>Our Address</h3>
                                <p>Pagsawitan, Santa Cruz, Laguna</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="info-item d-flex align-items-center">
                            <i class="icon bi bi-envelope flex-shrink-0" style="background-color:black;"></i>
                            <div>
                                <h3>Email Us</h3>
                                <p>tjrc_11@yahoo.com</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="info-item  d-flex align-items-center">
                            <i class="icon bi bi-telephone flex-shrink-0" style="background-color:black;"></i>
                            <div>
                                <h3>Call Us</h3>
                                <p>(+63) 956 068 8086</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="info-item  d-flex align-items-center">
                            <i class="icon bi bi-share flex-shrink-0" style="background-color:black;"></i>
                            <div>
                                <h3>Opening Hours</h3>
                                <div>
                                    <span style="color:green">Always Open</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <form action="forms/contact.php" method="post" role="form" class="php-email-form p-3 p-md-4">
                    <div class="row">
                        <div class="col-xl-6 form-group">
                            <input type="text" name="name" class="form-control" id="name" placeholder="Your Name"
                                required>
                        </div>
                        <div class="col-xl-6 form-group">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Your Email"
                                required>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject"
                            required>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="message" rows="5" placeholder="Message"
                            required></textarea>
                    </div>
                    <div class="my-3">
                        <div class="loading">Loading</div>
                        <div class="error-message"></div>
                        <div class="sent-message">Your message has been sent. Thank you!</div>
                    </div>
                    <div class="text-center"><button type="submit" style="background-color:black;">Send Message</button>
                    </div>
                </form>

            </div>
        </section>

    </main>
    <footer id="footer" class="footer">
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