<?php
include ("assets/php/config.php");
session_start();

if (!isset($_SESSION['User'])) {
    header("Location: " . $folder . "index_login.php");
    exit();
} else {
    $user = $_SESSION['User'];
    $sql = "SELECT * FROM `tbl_users` WHERE Username = '$user' LIMIT 1";
    $result = $db->query($sql);
    $user_row = $result->fetch_assoc();
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
                <span class="navbar-toggler-icon"><i class="fa fa-navicon"
                        style="color:#fff; font-size:28px;"></i></span>
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
                            aria-expanded="false" style="color:white;">
                            ABOUT US
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="user_about.php">CS DESIGN STUDIO</a></li>
                            <li><a class="dropdown-item" href="user_services.php">SERVICES</a></li>
                            <li><a class="dropdown-item" href="user_portfolio.php">PORTFOLIO</a></li>

                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="user_shop.php" style="color:white; ">SHOP</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="user_contact.php" style="color:white; font-weight:bold;">CONTACT</a>
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
    <br>
    <div class="container">
        <div class="row">
            <div class="d-flex justify-content-center">
                <h1 class="text-white" style="font-weight: bold">Contact Us</h1>
            </div>
            <div class="d-flex justify-content-center">
                <h6 class="text-white" style="font-weight: bold">Any questions or remarks? Just write us a message!</h6>
            </div>
        </div>
    </div>
    <div class="container" style="margin-top:2%">
        <section class="bg-white py-2 py-md-2 py-xl-2" style="border-radius:10px;">
            <div class="container">
                <div class="row gy-4">
                    <div class="col-5 col-md-5 col-xl-5">
                        <div class="card border-0 rounded-4">
                            <div class="card-body p-3 p-md-4 p-xl-5"
                                style="background-color:rgb(41, 46, 61); border-radius:10px;">
                                <div class="row">
                                    <div class="col-12 col-lg-12 col-sm-12">
                                        <div class="mb-4">
                                            <h2 class="text-white" style="font-weight:bold;"> Contact Information</h2>
                                            <h5 class="text-white"> Say something to start a live chat.</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 20%;">
                                    <h6 class="text-white"><i class="fas fa-phone-volume"></i> &nbsp; (+63) 956 068 8086
                                    </h6>
                                    <br>
                                    <br>
                                    <h6 class="text-white"><i class="fas fa-envelope"></i> &nbsp; tjrc_11@gmail.com
                                    </h6>
                                    <br>
                                    <br>
                                    <h6 class="text-white"><i class="fas fa-map-marker-alt"></i> &nbsp;
                                        Brgy. Pagsawitan Sta Cruz Laguna
                                    </h6>
                                </div>
                                <div class="row " style="margin-top: 30%;">
                                    <div class="d-flex align-items-start mb-3">
                                        <h4 class="text-white" style="margin-right: 5%;">
                                            <i class="fab fa-instagram"></i>
                                        </h4>
                                        <h4 class="text-white" style="margin-right: 5%;">
                                            <i class="fab fa-facebook"></i>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-7 col-md-7 col-xl-7">
                        <div class="row">
                            <form action="assets/php/inquire.php" method="post" role="form"
                                class="php-email-form p-3 p-md-4">
                                <div class="row">
                                    <div class="col-xl-6 form-group">
                                        <label class="text-black" style="font-weight:bold;">First Name</label>
                                        <input type="text" name="name" class="form-control border-bottom" id="name"
                                            required value="<?php echo $user_row['Name'] ?>" readonly>
                                    </div>
                                    <div class="col-xl-6 form-group">
                                        <label class="text-black" style="font-weight:bold;">Last Name</label>
                                        <input type="text" class="form-control border-bottom" name="email" id="email"
                                            required value="<?php echo $user_row['Last_Name'] ?>" readonly>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-xl-6 form-group">
                                        <label class="text-black" style="font-weight:bold;">Email</label>
                                        <input type="text" name="name" class="form-control border-bottom" id="name"
                                            required style=":10px;" value="<?php echo $user_row['Email'] ?>" readonly>
                                    </div>
                                    <div class="col-xl-6 form-group">
                                        <label class="text-black" style="font-weight:bold;">Phone Number</label>
                                        <input type="text" class="form-control border-bottom" name="email" id="email"
                                            required value="<?php echo $user_row['Contact'] ?>" readonly>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-xl-6 form-group">
                                        <label class="text-black" style="font-weight:bold;">Subject</label>
                                        <input type="text" name="name" class="form-control border-bottom" id="name"
                                            required style=":10px;">
                                    </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label class="text-black" style="font-weight:bold;">Message</label>
                                    <textarea class="form-control border-bottom" name="message" rows="5"
                                        placeholder="Write your message.." required></textarea>
                                </div>
                                <br>
                                <div class="d-flex justify-content-end">]
                                    <button class="btn text-white" type="submit"
                                        style="background-color:rgb(41, 46, 61);">Send
                                        Message</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
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

        function addToCart() {
            $.ajax({
                type: "POST",
                url: "assets/ajax/user_addtocart.php?user=<?php echo $user ?>",
                data: {
                    id: $("#patc").val(),
                    qty: $("#qty").val(),
                },
                success: function (dataResult) {
                    var dataResult = JSON.parse(dataResult);
                    if (dataResult.statusCode == 200) {
                        Swal.fire({
                            icon: 'success',
                            text: 'Added to Cart',
                        })
                        loadCart();
                    } else if (dataResult.statusCode == 201) {
                        Swal.fire({
                            icon: 'error',
                            text: 'Failed',
                        })
                    }
                }
            });
        }

        function buyNow() {
            $.ajax({
                type: "POST",
                url: "assets/php/user_buyNow.php",
                data: {
                    id: $("#patc").val(),
                    qty: $("#qty").val(),
                },
                success: function (dataResult) {
                    var dataResult = JSON.parse(dataResult);
                    if (dataResult.statusCode == 200) {
                        window.location = "user_orders.php";
                    } else if (dataResult.statusCode == 201) {
                        Swal.fire({
                            icon: 'error',
                            text: 'Failed',
                        })
                    }
                }
            });
        }
        $('#viewProducts').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var pid = button.data('pid')
            var pname = button.data('pname')
            var pdes = button.data('pdes')
            var ptype = button.data('ptype')
            var pprice = button.data('pprice')
            var pimg = button.data('whatever')
            var modal = $(this)

            document.getElementById("pname").textContent = pname;
            document.getElementById("pprice").textContent = "P " + pprice;
            document.getElementById("pdes").textContent = pdes;
            document.getElementById("productImage").src = pimg;
            document.getElementById("patc").value = pid;

        });

    </script>
</body>

</html>