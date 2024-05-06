<?php
include ("assets/php/config.php");
session_start();
if (!isset($_GET['id'])) {
    header("Location: index_portfolio.php");
    exit();
} else {
    $id = $_GET['id'];
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
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

    .services {
        font-family: "Playfair Display", serif;
        font-optical-sizing: auto;
        font-weight: 440;
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

    .img {
        max-height: 100%;
        min-width: 100%;
        object-fit: cover;
        vertical-align: bottom;
    }

    li {
        text-decoration: none;
    }

    ul {
        text-decoration: none;
        list-style-type: none;
    }


    .modal img:hover {
        opacity: 1;
    }

    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        padding-top: 1em;
        left: 50%;
        top: 50%;
        overflow: auto;
        transform: translate(-50%, -50%) !important;
        background-color: rgb(0, 0, 0);
        /* Fallback color */
        background-color: rgba(0, 0, 0, 0.8);
        /* Black w/ opacity */

    }

    .modal-content {
        margin: auto;
        display: block;
        width: 70%;
        max-width: 600px;
    }

    @-webkit-keyframes zoom {
        from {
            transform: scale(0);
        }

        to {
            transform: scale(1);
        }
    }

    @keyframes zoom {
        from {
            transform: scale(0.1);
        }

        to {
            transform: scale(1);
        }
    }

    .close {
        position: absolute;
        top: 15px;
        right: 35px;
        color: #f1f1f1;
        font-size: 40px;
        font-weight: bold;
        transition: 0.3s;
        z-index: 1;
        color: red;
    }

    .close:hover,
    .close:focus {
        color: red;
        text-decoration: none;
        cursor: pointer;
    }

    .navbar-toggler-icon {
        color: white;
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
    <nav class="navbar navbar-expand-lg bg-black" style="padding: 40px;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="assets/img/logo.jpg" style="width:50px;"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"><i class="fa fa-navicon"
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
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false" style="color:white; font-weight:bold;">
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
    <br>
    <div class="container">
        <div class="row">
            <ul style=" display: flex; flex-wrap: wrap; text-decoration: none;">
                <?php
                $sql4 = "SELECT * FROM `tbl_portfolio_images` WHERE PI_Project='$id'";
                $result4 = $db->query($sql4);
                while ($row4 = $result4->fetch_assoc()) {

                    echo '
                <li style="height: 40vh; flex-grow: 10; margin:5px; text-decoration: none;" >
                    <img class="img" style="width:100%" loading="lazy" src="data:' . $row4['PI_Image_Type'] . ';base64,' . base64_encode($row4['PI_Images']) . '"/>
                </li>
                    ';
                } ?>
            </ul>
        </div>
    </div>
    </div>

    <div id="myModal" class="modal">

        <span class="close">&times;</span>
        <img class="modal-content" id="img01">

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
    <script src="assets/js/ph-address-selector.js"></script>
    <script>
        var modal = document.getElementById("myModal");
        var span = $(".close");

        span.on("click", function () {
            modal.style.display = "none";
        });
        var images = document.getElementsByTagName("img");
        var modalImg = document.getElementById("img01");
        var i;
        for (i = 0; i < images.length; i++) {
            images[i].onclick = function () {
                modal.style.display = "block";
                modalImg.src = this.src;
                modalImg.alt = this.alt;
            };
        }
    </script>
</body>

</html>