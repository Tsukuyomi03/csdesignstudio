<?php
include ("assets/php/config.php");
session_start();

if (!isset($_SESSION['User'])) {
    header("Location: " . $folder . "index_login.php");
    exit();
} else {
    $user = $_SESSION['User'];
}
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

    .dropdown-divider {
        color: white !important;
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
        <?php endif; ?>
        <?php unset($_SESSION['message']); ?>
        <?php unset($_SESSION['status']); ?>
    </div>
    <nav class="navbar navbar-expand-lg bg-black" style="padding:40px;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="assets/img/logo_long.jpg" style="width:10%;"></a>
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

                    <li></li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="user_index.php"
                            style="color:white; ">HOME</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false" style="color:white; font-weight:bold;">
                            ABOUT US
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="user_about.php">CS DESIGN STUDIO</a></li>
                            <li><a class="dropdown-item" href="user_services.php">SERVICES</a></li>
                            <li><a class="dropdown-item" href="user_portfolio.php">PORTFOLIO</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="user_shop.php" style="color:white;">SHOP</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="user_contact.php" style="color:white;">CONTACT</a>
                    </li>
                    <li class="nav-item dropdown" style="border:2px solid white; border-radius :10px;">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false" style="color:white;">
                            <i class="fa-solid fa-user">&nbsp;</i>
                            <?php echo $user ?>
                        </a>
                        <ul class="dropdown-menu" style="border: 1px solid white;">
                            <li><a class="dropdown-item" href="user_profile.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a></li>
                            <li><a class="dropdown-item" href="user_cart.php">
                                    <i class="fas fa-shopping-cart fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Cart
                                </a></li>
                            <li>
                                <hr class="hr" style="color:white;">
                            </li>
                            <li><a class="dropdown-item" onclick="logout();">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a></li>
                        </ul>
                    </li>
                </div>
            </div>
        </div>
    </nav>
    <div class="container" style="margin-top:2%">
        <div class="row d-flex justify-content-around">
            <h2 style="text-align:center; font-weight:bold; margin-bottom:2%">Services</h2>
            <div class="col-xl-3 col-md-6 d-flex align-items-stretch aos-init aos-animate" data-aos="zoom-in"
                data-aos-delay="100">
                <div class="icon-box">
                    <center><img src="assets/img/chouse.png" style="width:50%;" loading="lazy"></center>
                    <br>
                    <h3 style="text-align: center">Exterior & Interior</h3>
                    <p style="text-align: center">Transform Your Home Inside and Out</p>
                    <p style="text-align: center">Our team of seasoned designers is dedicated to creating spaces that
                        reflect your personality and
                        lifestyle. With a keen eye for detail, we seamlessly integrate exterior and interior design,
                        ensuring
                        a cohesive and inviting atmosphere throughout your home Exterior Design: From captivating
                        facades to stunning outdoor living spaces, we elevate your home's curb appeal with innovative
                        designs.</p>
                </div>
            </div>
            <div class="col-lg-3 col-sm-2 services" style="text-align: center;">
                <div class="icon-box">
                    <center><img src="assets/img/cpen.png" style="width:50%;" loading="lazy"></center>
                    <br>
                    <h3 style="text-align: center"> Designing and Building</h3>
                    <p style="text-align: center">Crafting Dreams into Reality</p>
                    <p style="text-align: center">Our design and build services are tailored to turn your vision into a
                        tangible reality. With a comprehensive approach that covers everything from conceptualization to
                        construction, we ensure a seamless and stress-free experience.Design Phase: Collaborate with our
                        skilled designers to conceptualize your ideal space. Through detailed discussions and
                        visualizations, we refine the design until it perfectly captures your vision. </p>
                </div>
            </div>
            <div class="col-lg-3 col-sm-2 services" style="text-align: center;">
                <div class="icon-box">
                    <center><img src="assets/img/cfur.png" style="width:50%;" loading="lazy"></center>
                    <br>
                    <h3 style="text-align: center">Renovations</h3>
                    <p style="text-align: center">Breathe New Life into Your Home</p>
                    <p style="text-align: center">Whether you're looking to update a single room or transform your
                        entire home, our renovation services are designed to enhance both functionality and aesthetics.
                        We understand that your home is a reflection of your lifestyle, and we are dedicated to
                        revitalizing it to suit your evolving needs.Comprehensive Renovations: Our team tackles
                        renovations of all sizes, from kitchen and bathroom remodels to whole-house transformations.
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-sm-2 services" style="text-align: center;">
                <div class="icon-box">
                    <center><img src="assets/img/cnote.png" style="width:50%;" loading="lazy"></center>
                    <br>
                    <h3 style="text-align: center">Planning</h3>
                    <p style="text-align: center">Precision Blueprints for Perfect Spaces</p>
                    <p style="text-align: center">
                        Our meticulous planning services provide the foundation for your project's success. Whether
                        you're starting from scratch or renovating an existing space, our detailed blueprints ensure
                        that every aspect of the design is carefully considered.Conceptualization: Work with our
                        experienced designers to develop initial concepts and layouts for your space. Through sketches
                        and 3D renderings, we bring your ideas to life, allowing you to visualize the final result.</p>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <script>
        function logout() {
            Swal.fire({
                title: 'CONFIRMATION',
                text: "Are you sure you want to logout?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'assets/php/user_logout.php';
                }
            })
        };

    </script>
</body>

</html>