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

    .dropdown:hover>.dropdown-menu {
        display: block;
    }

    .dropdown>.dropdown-toggle:active {
        /*Without this, clicking will make it sticky*/
        pointer-events: none;
    }

    .navbar-toggler-icon {
        color: white;
    }
</style>

<body>
    <nav class="navbar navbar-expand-lg bg-black" style="padding: 40px;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="assets/img/logo.jpg" style="width:50px;"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon text-white" style="font-weight:bold"><i class="fa fa-navicon"
                        style="color:#fff; font-size:28px;"></i></span>
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
                        <strong><a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false" style="color:white;">
                                ABOUT US
                            </a></strong>
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
    <div class="container" style="margin-top:5%">
        <div class="row">
            <div class="col-lg-5">
                <div class="row" style="margin-top:10%">
                    <h1>MISSION</h1>
                </div>
                <div class="row" style="margin-top:10%">
                    <hr class="hr" style="width:20%">
                </div>
                <div class="row">
                    <h4>Our mission is to deliver construction services of the utmost quality to our customers,
                        maintaining fairness and competitiveness in our pricing. We strive to consistently exceed
                        industry standards, ensuring that each project is completed to the highest level of
                        satisfaction. By upholding our commitment to excellence, we aim to provide our clients with
                        exceptional value and unmatched service.</h4>
                </div>
            </div>
            <div class="col-lg-1">
            </div>
            <div class="col-lg-6">
                <img src="assets/img/10.jpg" alt="" style="width:100%" loading="lazy">
            </div>
        </div>
        <div class="row" style="margin-top:10%">
            <div class="col-lg-6">
                <img src="assets/img/11.jpg" alt="" style="width:100%; height:110%;" loading="lazy">
            </div>
            <div class="col-lg-1">
            </div>
            <div class="col-lg-5">
                <div class="row" style="margin-top:10%">
                    <h1>VISION</h1>
                </div>
                <div class="row" style="margin-top:10%">
                    <hr class="hr" style="width:20%">
                </div>
                <div class="row">
                    <h4>Our aim is to provide exceptional service in the construction industry, ensuring that each
                        project receives superior craftsmanship. We prioritize delivering top-quality workmanship and
                        attention to detail, striving to exceed expectations in every aspect of our services. By
                        focusing on excellence in craftsmanship, we endeavor to stand out in the industry and earn the
                        trust and satisfaction of our clients. Our commitment extends to building lasting relationships
                        based on trust, reliability, and outstanding performance.</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="container" style="margin-top:5%">
        <div class=" row">
            <div class="col-lg-4 col-md-12 col-12">
                <br>
                <h2>CONTACT</h2>
                <br>
                <p>Create your brand new architecture or interioir design today! It's super easy with CS Design
                    Studio
                </p>
                <br>
                <p><i class="fa-solid fa-magnifying-glass"></i> &nbsp; Brgy. Pagsawitan Sta Cruz Laguna</p>
                <br>
                <p><i class="fa-solid fa-envelope"></i> &nbsp; tjrc_11@yahoo.com</p>
            </div>
            <br>
            <div class="col-lg-4 col-md-12 col-12">
                <br>
                <h2>FACEBOOK FEED</h2>
                <br>
                <p><i class="fab fa-facebook-square"></i> &nbsp;It is a long established fact that a reader will
                    be distracted by the readable content of a page when looking at its layout.</p>
                <br>
                <p><i class="fab fa-facebook-square"></i> &nbsp;It is a long established fact that a reader will
                    be distracted by the readable content of a page when looking at its layout.</p>
            </div>
            <br>
            <div class="col-lg-4 col-md-12 col-12">
                <br>
                <h2>BUSINESS PERMITS</h2>
                <div class="row d-flex flex-row">
                    <img src="assets/img/1.png" style="width:20%" loading="lazy">
                    <img src="assets/img/2.png" style="width:20%" loading="lazy">
                    <img src="assets/img/3.png" style="width:20%" loading="lazy">
                </div>
                <br>
                <p>Business Permit: 4096</p>
                <p>BIR: 056RC20240000000996</p>
                <p>DTI: 5682932</p>
            </div>
            <br>
        </div>
    </div>
    <div class="footer" style="background-color:black">
        <div class="container-fluid" style="padding:5%">
            <div class="d-flex justify-content-between">
                <div>
                    <img src="assets/img/logo.jpg" style="width:50px;">
                </div>
                <div>
                    <h4>© 2024 CS DESIGN STUDIO</h4>
                </div>
                <div>
                    <span style="font-size: 40px;">
                        <i class="fab fa-facebook-square" style="margin: 0 10px 10px 0;"></i>
                        <i class="fab fa-instagram" style="margin: 0 10px 10px 0;"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
</body>

</html>