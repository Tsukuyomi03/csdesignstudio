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
    if (isset($_POST["update_profile"])) {
        $name = strtoupper($db->real_escape_string($_POST["name"]));
        $sname = strtoupper($db->real_escape_string($_POST["surname"]));
        $contact = $db->real_escape_string($_POST["contact"]);
        $email = $db->real_escape_string($_POST["email"]);
        $pword = $db->real_escape_string($_POST["pword"]);

        $sql2 = "UPDATE `tbl_users` SET `Name`='$name',`Last_Name`='$sname',`Contact`='$contact',`Email`='$email' WHERE `Username`='$user'";
        $result2 = $db->query($sql2);
        if ($result2) {
            $_SESSION['status'] = "success";
            $_SESSION['message'] = "Update Successful";
            header("Location: " . $folder . "user/user_profile.php");
            exit();
        } else {
            $_SESSION['status'] = "success";
            $_SESSION['message'] = "Login Sucessful";
            header("Location: " . $folder . "user/user_profile.php");
            exit();
        }
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="assets/css/files.css">
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

    .nav-link {
        color: white;
    }

    .nav-pills .nav-link.active,
    .nav-pills .show>.nav-link {
        color: black;
        background-color: white;
        ;
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
        <main id="main">
            <div class=" row">
                <br>
            </div>
            <section id="projects" class="menu">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-2">
                            <a href="user_orders.php"><button class="btn btn-primary form-control"><i class="bi-box"
                                        style="font-size:20px;">
                                    </i> Orders</button></a>
                            <a href="user_profile.php"><button class="btn form-control bg-light"><i class="bi-person"
                                        style="font-size:20px;">
                                    </i> Profile</button></a>
                            <a href="user_settings.php"><button class="btn form-control bg-light"><i class="bi-gear"
                                        style="font-size:20px;">
                                    </i> Settings</button></a>
                        </div>
                        <div class="col-lg-10">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <ul class="nav nav-pills mb-3 flex-column flex-sm-row nav-justified"
                                            id="pills-tab" role="tablist">
                                            <li class="nav-item flex-sm-fill" role="presentation">
                                                <button class="nav-link active" id="pills-pending-tab"
                                                    data-bs-toggle="pill" data-bs-target="#pills-pending" type="button"
                                                    role="tab" aria-controls="pills-pending" aria-selected="true"><i
                                                        class="bi-clock-fill" style="font-size:20px;">
                                                    </i>PENDING PAYMENT <span
                                                        class="badge bg-dark text-white ms-1 rounded-pill"
                                                        id="totalPending"></span></button>
                                            </li>
                                            <li class="nav-item flex-sm-fill" role="presentation">
                                                <button class="nav-link" id="pills-tracking-tab" data-bs-toggle="pill"
                                                    data-bs-target="#pills-tracking" type="button" role="tab"
                                                    aria-controls="pills-tracking" aria-selected="false"><svg
                                                        xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                        fill="currentColor" class="bi bi-truck-front-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M3.5 0A2.5 2.5 0 0 0 1 2.5v9c0 .818.393 1.544 1 2v2a.5.5 0 0 0 .5.5h2a.5.5 0 0 0 .5-.5V14h6v1.5a.5.5 0 0 0 .5.5h2a.5.5 0 0 0 .5-.5v-2c.607-.456 1-1.182 1-2v-9A2.5 2.5 0 0 0 12.5 0zM3 3a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v3.9c0 .625-.562 1.092-1.17.994C10.925 7.747 9.208 7.5 8 7.5s-2.925.247-3.83.394A1.008 1.008 0 0 1 3 6.9zm1 9a1 1 0 1 1 0-2 1 1 0 0 1 0 2m8 0a1 1 0 1 1 0-2 1 1 0 0 1 0 2m-5-2h2a1 1 0 1 1 0 2H7a1 1 0 1 1 0-2" />
                                                    </svg> TRACKING <span
                                                        class="badge bg-dark text-white ms-1 rounded-pill"
                                                        id="totalTracking"></span></button>
                                            </li>
                                            <li class="nav-item flex-sm-fill" role="presentation">
                                                <button class="nav-link" id="pills-completed-tab" data-bs-toggle="pill"
                                                    data-bs-target="#pills-completed" type="button" role="tab"
                                                    aria-controls="pills-completed" aria-selected="false"><i
                                                        class="bi-bag-check-fill" style="font-size:20px;">
                                                    </i>COMPLETED<span
                                                        class="badge bg-dark text-white ms-1 rounded-pill"
                                                        id="totalCompleted"></span></button>
                                            </li>
                                            <li class="nav-item flex-sm-fill" role="presentation">
                                                <button class="nav-link" id="pills-canceled-tab" data-bs-toggle="pill"
                                                    data-bs-target="#pills-canceled" type="button" role="tab"
                                                    aria-controls="pills-canceled" aria-selected="false"><i
                                                        class="bi-x-octagon-fill" style="font-size:20px;">
                                                    </i>CANCELED<span class="badge bg-dark text-white ms-1 rounded-pill"
                                                        id="totalCanceled"></span></button>
                                            </li>
                                        </ul>
                                        <div class="tab-content" id="pills-tabContent">
                                            <!--==========TABS FOR PENDING PAYMENTS==========-->
                                            <div class="tab-pane fade show active" id="pills-pending" role="tabpanel"
                                                aria-labelledby="pills-pending-tab"
                                                style="overflow-x: hidden; padding :5px; border-radius:10px 10px 10px 10xp;">
                                                <?php
                                                $sql = "SELECT * FROM `tbl_products` LEFT JOIN `tbl_orders` ON tbl_products.ID = tbl_orders.Order_ProductID WHERE Order_User = '$user' AND Order_Status='Pending'";
                                                $result = $db->query($sql);
                                                while ($prow = mysqli_fetch_array($result)) {
                                                    ?>
                                                    <div class="row" style="">
                                                        <table class="table table-borderless" style="padding :5px;">
                                                            <tr>
                                                                <td rowspan="5" style="width: 200px; ">
                                                                    <img class="card-img-top" style="margin-left: 2px;"
                                                                        src="<?php echo 'data:' . $prow['P_Img_Type'] . ';base64,' . base64_encode($prow['P_Img_Name']) ?>">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <?php echo $prow['P_Name'] ?>
                                                                </td>
                                                                <td>Price</td>
                                                                <td
                                                                    style="word-wrap: break-word;width: 150px;text-align:center;">
                                                                    P
                                                                    <?php echo $prow['P_Price'] ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <?php echo $prow['P_Description'] ?>
                                                                </td>
                                                                <td style="word-wrap: break-word;width: 100px;">
                                                                    Qantity</td>
                                                                <td>
                                                                    <input type="text" class="form-control quantity"
                                                                        style="text-align:center;"
                                                                        value="<?php echo $prow['Order_QTY'] ?>" readonly>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Product Type:
                                                                    <?php echo $prow['P_Type'] ?>
                                                                </td>
                                                                <td>Total</td>
                                                                <td> <input type="text" class="form-control quantity"
                                                                        style="text-align:center;"
                                                                        value="P <?php echo $prow['Order_Total'] ?>"
                                                                        readonly>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input type="text" class="form-control quantity"
                                                                        style="text-align:center;"
                                                                        value="<?php echo $prow['Order_Remarks'] ?>"
                                                                        readonly>
                                                                </td>
                                                                <td colspan=2>
                                                                    <?php if ($prow['Order_Payment_Img'] == ''): ?>
                                                                        <button class="btn btn-primary payment"
                                                                            style="text-align:center;margin:2px; float:right;"
                                                                            data-bs-toggle="modal" data-bs-target="#payment"
                                                                            data-id="<?php echo $prow['Order_ID'] ?>">PAY</button>
                                                                        <button class="btn btn-danger"
                                                                            onclick="cancelOrder(<?php echo $prow['Order_ID'] ?>);"
                                                                            style="text-align:center; margin:2px; float:right;">CANCEL</button>
                                                                    <?php else: ?>
                                                                    <?php endif; ?>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                            <!--==========TABS FOR TRACKING OF ORDERS==========-->
                                            <div class="tab-pane fade" id="pills-tracking" role="tabpanel"
                                                aria-labelledby="pills-tracking-tab"
                                                style="overflow-x: hidden; padding :5px; border-radius:10px 10px 10px 10xp;">
                                                <?php
                                                $sql = "SELECT * FROM `tbl_products` LEFT JOIN `tbl_orders` ON tbl_products.ID = tbl_orders.Order_ProductID WHERE Order_User = '$user' AND Order_Status='Tracking'";
                                                $result = $db->query($sql);
                                                while ($prow = mysqli_fetch_array($result)) {
                                                    ?>
                                                    <div class="row">
                                                        <table class="table table-borderless">
                                                            <tr>
                                                                <td rowspan="5"
                                                                    style="width: 200px;backgroud-image:url('')">
                                                                    <img class="card-img-top"
                                                                        src="<?php echo 'data:' . $prow['P_Img_Type'] . ';base64,' . base64_encode($prow['P_Img_Name']) ?>">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <?php echo $prow['P_Name'] ?>
                                                                </td>
                                                                <td>Price</td>
                                                                <td
                                                                    style="word-wrap: break-word;width: 150px;text-align:center;">
                                                                    P
                                                                    <?php echo $prow['P_Price'] ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <?php echo $prow['P_Description'] ?>
                                                                </td>
                                                                <td style="word-wrap: break-word;width: 100px;">
                                                                    Qantity</td>
                                                                <td>
                                                                    <input type="text" class="form-control quantity"
                                                                        style="text-align:center;"
                                                                        value="<?php echo $prow['Order_QTY'] ?>" readonly>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Product Type:
                                                                    <?php echo $prow['P_Type'] ?>
                                                                </td>
                                                                <td>Total</td>
                                                                <td> <input type="text" class="form-control quantity"
                                                                        style="text-align:center;"
                                                                        value="P <?php echo $prow['Order_Total'] ?>"
                                                                        readonly>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan=3>
                                                                    <input type="text" class="form-control quantity"
                                                                        style="text-align:center;"
                                                                        value="<?php echo $prow['Order_Remarks'] ?>"
                                                                        readonly>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                            <!--==========TABS FOR COMPLETED ORDERS==========-->
                                            <div class="tab-pane fade" id="pills-completed" role="tabpanel"
                                                aria-labelledby="pills-completed-tab"
                                                style="overflow-x: hidden; padding :5px; border-radius:10px 10px 10px 10xp;">
                                                <?php
                                                $sql = "SELECT * FROM `tbl_products` LEFT JOIN `tbl_orders` ON tbl_products.ID = tbl_orders.Order_ProductID WHERE Order_User = '$user' AND Order_Status='Completed'";
                                                $result = $db->query($sql);
                                                while ($prow = mysqli_fetch_array($result)) {
                                                    ?>
                                                    <div class="row">
                                                        <table class="table table-borderless">
                                                            <tr>
                                                                <td rowspan="5"
                                                                    style="width: 200px;backgroud-image:url('')">
                                                                    <img class="card-img-top"
                                                                        src="<?php echo 'data:' . $prow['P_Img_Type'] . ';base64,' . base64_encode($prow['P_Img_Name']) ?>">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <?php echo $prow['P_Name'] ?>
                                                                </td>
                                                                <td>Price</td>
                                                                <td
                                                                    style="word-wrap: break-word;width: 150px;text-align:center;">
                                                                    P
                                                                    <?php echo $prow['P_Price'] ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <?php echo $prow['P_Description'] ?>
                                                                </td>
                                                                <td style="word-wrap: break-word;width: 100px;">
                                                                    Qantity</td>
                                                                <td>
                                                                    <input type="text" class="form-control quantity"
                                                                        style="text-align:center;"
                                                                        value="<?php echo $prow['Order_QTY'] ?>" readonly>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Product Type:
                                                                    <?php echo $prow['P_Type'] ?>
                                                                </td>
                                                                <td>Total</td>
                                                                <td> <input type="text" class="form-control quantity"
                                                                        style="text-align:center;"
                                                                        value="P <?php echo $prow['Order_Total'] ?>"
                                                                        readonly>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <input type="text" class="form-control quantity"
                                                                        style="text-align:center;"
                                                                        value="<?php echo $prow['Order_Remarks'] ?>"
                                                                        readonly>
                                                                </td>
                                                                <td colspan=2>
                                                                    <?php
                                                                    if ($prow['Order_Rating'] == '' || $prow['Order_Rating'] == null) {
                                                                        echo '<button class="btn btn-success form-control"
                                                                            style="text-align:center;"
                                                                            data-toggle="modal" data-target="#rate"
                                                                            data-id="' . $prow['Order_ID'] . '">Rate</button>';
                                                                    } else {
                                                                        echo '<button class="btn btn-success"
                                                                            style="text-align:center;margin:2px; float:right;"
                                                                            data-toggle="modal" data-target="#rate"
                                                                            data-id="' . $prow['Order_ID'] . '">Archive</button>';
                                                                    }
                                                                    ?>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                            <!--==========TABS FOR CANCELED ORDERS==========-->
                                            <div class="tab-pane fade" id="pills-canceled" role="tabpanel"
                                                aria-labelledby="pills-canceled-tab"
                                                style="overflow-x: hidden; padding :5px; border-radius:10px 10px 10px 10xp;">
                                                <?php
                                                $sql = "SELECT * FROM `tbl_products` LEFT JOIN `tbl_orders` ON tbl_products.ID = tbl_orders.Order_ProductID WHERE Order_User = '$user' AND Order_Status='Canceled'";
                                                $result = $db->query($sql);
                                                while ($prow = mysqli_fetch_array($result)) {
                                                    ?>
                                                    <div class="row">
                                                        <table class="table table-borderless">
                                                            <tr>
                                                                <td rowspan="5"
                                                                    style="width: 200px;backgroud-image:url('')">
                                                                    <img class="card-img-top"
                                                                        src="<?php echo 'data:' . $prow['P_Img_Type'] . ';base64,' . base64_encode($prow['P_Img_Name']) ?>">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <?php echo $prow['P_Name'] ?>
                                                                </td>
                                                                <td>Price</td>
                                                                <td
                                                                    style="word-wrap: break-word;width: 150px;text-align:center;">
                                                                    P
                                                                    <?php echo $prow['P_Price'] ?>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <?php echo $prow['P_Description'] ?>
                                                                </td>
                                                                <td style="word-wrap: break-word;width: 100px;">
                                                                    Qantity</td>
                                                                <td>
                                                                    <input type="text" class="form-control quantity"
                                                                        style="text-align:center;"
                                                                        value="<?php echo $prow['Order_QTY'] ?>" readonly>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Product Type:
                                                                    <?php echo $prow['P_Type'] ?>
                                                                </td>
                                                                <td>Total</td>
                                                                <td> <input type="text" class="form-control quantity"
                                                                        style="text-align:center;"
                                                                        value="P <?php echo $prow['Order_Total'] ?>"
                                                                        readonly>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td></td>
                                                                <td colspan=2>
                                                                    <?php if ($prow['Order_Payment_Img'] == ''): ?>
                                                                        <button
                                                                            onclick="removeCanceled(<?php echo $prow['Order_ID'] ?>);"
                                                                            class="btn btn-danger"
                                                                            style="text-align:center; margin:2px; float:right;">CANCEL</button>
                                                                    <?php else: ?>
                                                                    <?php endif; ?>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
    <div class="modal fade" id="payment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content bg-black" style="border: 2px solid white;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Payment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="assets/php/user_payment.php" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="form-group">
                                        <input type="text" value="" id="id" hidden name="orderID">
                                        <label for="recipient-name" class="col-form-label">Payment Method:</label>
                                        <select class="form-control" required name="paymentMethod">
                                            <option value="" hidden>--Select Payment Method--</option>
                                            <option value="GCASH">GCASH</option>
                                            <option value="PAYMAYA">PAYMAYA</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="message-text" class="col-form-label">Reference No:</label>
                                        <input type="num" class="form-control" required name="referenceNo">
                                    </div>
                                    <div class="col-lg-12 files">
                                        <input type="file" name="file" id="up" accept="image/*">
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
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" id="ups" disabled>UPLOAD</button>
                                </div>
                            </div>
                        </div>
                    </form>
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
    <script src="assets/js/ph-address-selector.js"></script>
    <script>
        $(document).ready(function () {
            $.ajax({
                url: 'assets/ajax/get_total_cart.php',
                success: function (data) {
                    document.getElementById("tatc").textContent = data;
                }
            });
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
        $('#payment').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var modal = $(this)
            modal.find('#id').val(id)
        });

        function loadCounters() {
            loadPending();
            loadTracking();
            loadCompleted();
            loadCanceled();
        }

        function loadPending() {
            $.ajax({
                url: 'assets/ajax/get_pending.php',
                success: function (data) {
                    document.getElementById("totalPending").textContent = data;
                }
            })
        }

        function loadTracking() {
            $.ajax({
                url: 'assets/ajax/get_tracking.php',
                success: function (data) {
                    document.getElementById("totalTracking").textContent = data;
                }
            })
        }

        function loadCompleted() {
            $.ajax({
                url: 'assets/ajax/get_completed.php',
                success: function (data) {
                    document.getElementById("totalCompleted").textContent = data;
                }
            })
        }

        function loadCanceled() {
            $.ajax({
                url: 'assets/ajax/get_canceled.php',
                success: function (data) {
                    document.getElementById("totalCanceled").textContent = data;
                }
            })
        }

        function cancelOrder($___id) {
            Swal.fire({
                title: 'CONFIRMATION',
                text: "Are you sure you want to cancel this order?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'assets/php/user_cancel.php?oid=' + $___id;
                }
            })
        }

        function removeCanceled($___id) {
            Swal.fire({
                title: 'CONFIRMATION',
                text: "Are you sure you want to remove this order?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'assets/php/user_remove.php?oid=' + $___id;
                }
            })
        }

    </script>
</body>

</html>