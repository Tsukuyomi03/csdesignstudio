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
    <main id="main" style="margin-top:2%">
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
                <form action="assets/php/inquire.php" method="post" role="form" class="php-email-form p-3 p-md-4">
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
                    <div class="text-center"><button type="submit" style="background-color:black;">Send Message</button>
                    </div>
                </form>

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