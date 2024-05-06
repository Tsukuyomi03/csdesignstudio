<?php
include ("assets/php/config.php");
session_start();

if (!isset($_SESSION['User'])) {
    header("Location: " . $folder . "index_login.php");
    exit();
} else {
    if (($_GET['patc'] == null || $_GET['patc'] == "") && ($_GET['qty'] == null || $_GET['qty'] == "") && ($_GET['cid'] == null || $_GET['cid'] == "")) {
        header("Location: " . $folder . "user/user_shop.php");
        exit();
    } else {
        $user = $_SESSION['User'];
        $patc = $_GET['patc'];
        $qty = $_GET['qty'];
        $cid = $_GET['cid'];
        $sql = "SELECT * FROM tbl_products WHERE ID='$patc'";
        $result = $db->query($sql);
        $row = $result->fetch_assoc();
        $sql2 = "SELECT * FROM tbl_users WHERE Username='$user'";
        $result2 = $db->query($sql2);
        $row2 = $result2->fetch_assoc();

    }

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
        pointer-events: none;
    }

    h6 {
        color: black;

    }
</style>

<body onload="display_shop('')">
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
                        <a class="nav-link" href="user_shop.php" style="color:white; font-weight:bold">SHOP</a>
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
    <br>
    <div class="container" style="background-color:white;">
        <form action="assets/php/user_checkout_cart.php" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="row">
                    <div class="col-lg-4" style="text-align: center; border: 1px dashed gray">
                        <img src="<?php echo 'data:' . $row['P_Img_Type'] . ';base64,' . base64_encode($row['P_Img_Name']) ?>"
                            id="sample" width="100%" style="margin:5px">
                    </div>
                    <div class="col-lg-8" style=" border: 1px dashed gray">
                        <div class="row">
                            <h6>ORDER INFO</h6>
                            <table class="table">
                                <tr>
                                    <td>
                                        <span>Product Name</span>
                                    </td>
                                    <td>
                                        <span> : </span>
                                    </td>
                                    <td>
                                        <span id="uname"></span><?php echo $row['P_Name'] ?><span id="usname"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>Product Description</span>
                                    </td>
                                    <td>
                                        <span> : </span>
                                    </td>
                                    <td>
                                        <span id="uname"></span><?php echo $row['P_Description'] ?> <span
                                            id="usname"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>Product Type</span>
                                    </td>
                                    <td>
                                        <span> : </span>
                                    </td>
                                    <td>
                                        <span id="uname"></span><?php echo $row['P_Type'] ?> <span id="usname"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>Product Type</span>
                                    </td>
                                    <td>
                                        <span> : </span>
                                    </td>
                                    <td>
                                        <span id="uname"></span>P <?php echo number_format($row['P_Price']) ?> <span
                                            id="usname"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>Order By</span>
                                    </td>
                                    <td>
                                        <span> : </span>
                                    </td>
                                    <td>
                                        <span id="uname"></span><?php echo $row2['Name'] ?>
                                        <span id="usname"><?php echo $row2['Last_Name'] ?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>Shipping Address</span>
                                    </td>
                                    <td>
                                        <span> : </span>
                                    </td>
                                    <td>
                                        <span id="ustreet"><?php echo $row2['Street'] ?></span>,
                                        <span id="ubrgy"><?php echo $row2['Brgy'] ?></span>,
                                        <span id="ucity"><?php echo $row2['City'] ?></span>,
                                        <span id="uprovince"><?php echo $row2['Province'] ?></span>,
                                        <span id="region"><?php echo $row2['Region'] ?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>Order Quantity</span>
                                    </td>
                                    <td>
                                        <span> : </span>
                                    </td>
                                    <td>
                                        <span id="oqty"><?php echo $qty ?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>Order Total</span>
                                    </td>
                                    <td>
                                        <span> : </span>
                                    </td>
                                    <td>
                                        P <span id="ototal"><?php echo number_format($qty * $row['P_Price']) ?></span>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <input type="text" value="<?php echo $patc ?>" hidden name="OID">
                    <input type="text" value="<?php echo $qty ?>" hidden name="OQTY">
                    <input type="text" value="<?php echo $cid ?>" hidden name="OCID">
                    <label for="recipient-name" class="col-form-label text-black">Payment Method:</label>
                    <select class="form-control" required name="paymentMethod">
                        <option value="" hidden>--Select Payment Method--</option>
                        <option value="GCASH">GCASH</option>
                        <option value="PAYMAYA">PAYMAYA</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="message-text" class="col-form-label text-black">Reference No:</label>
                    <input type="num" class="form-control" required name="referenceNo">
                </div>

                <div class="col-lg-12 files">
                    <label for="message-text" class="col-form-label text-black">Upload Payment</label>
                    <br>
                    <input type="file" name="file" id="up" accept="image/*">
                    <br>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-6" style="text-align:center;">
                    <h6 style="color:blue;">GCASH</h6>
                    <h6>Gino Toralba</h6>
                    <h6>09465354675</h6>
                </div>
                <div class="col-lg-6" style="text-align:center;">
                    <h6 style="color:green;">PAYMAYA</h6>
                    <h6>Gino Toralba</h6>
                    <h6>09465354675</h6>
                </div>
            </div>
            <div class="row">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <br>
                            <button type="submit" class="btn btn-primary mb-4 form-control" id="ups"
                                disabled>SUBMIT</button>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </form>
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
        $(document).ready(function () {
            $('#up').change(function () {
                if ($('#up').val() == '') {
                    $('#ups').attr('disabled', true);
                } else {
                    $('#ups').attr('disabled', false);
                }
            });
        });

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