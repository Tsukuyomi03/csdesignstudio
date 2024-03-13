<?php
include("assets/php/config.php");
session_start();
if (!isset($_SESSION['User'])) {
    header("Location: " . $folder . "login_user.php");
    exit();
} else {
    $user = $_SESSION['User'];
    $sql = "SELECT * FROM `tbl_users` WHERE Username = '$user' LIMIT 1";
    $result = $db->query($sql);
    $user_row = $result->fetch_assoc();
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="assets/css/main.css" rel="stylesheet">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/files.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.all.min.js"></script>
</head>
<style>
    .menu-img {
        width: 100%;
        height: 100%;
    }

    .btn {
        border: 1px solid gray;
        text-align: left;
    }

    table {
        border: 1px solid black;
    }
</style>

<body onload="loadCounters();">
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
    <header id="header" class="header fixed-top d-flex align-items-center fixed-top">
        <div class="container d-flex align-items-center justify-content-between">
            <a href="user_index.php" class="logo d-flex align-items-center me-auto me-lg-0">
                <h1>CS <span style="color:gray">Design Studio</span></h1>
            </a>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a href="user_index.php"> Products</a></li>
                    <li><a> </a></li>
                    <div class="vr"></div>
                    <li><a> </a></li>
                    <a href="user_cart.php"><button class="btn btn-outline-dark" type="submit">
                            <i class="bi-cart-fill me-1"></i>
                            Cart
                            <span class="badge bg-dark text-white ms-1 rounded-pill" id="tatc"></span>
                        </button></a>
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span
                                class="mr-2 d-none d-lg-inline text-gray-600">
                                <?php echo $user ?>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="user_profile.php">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profile
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" onclick="logout();">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
            <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
        </div>
    </header>
    <main id="main" style="overflow-x:hidden; overflow-y:scroll;">
        <div class="row">
            <br>
        </div>
        <section id="projects" class="menu">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2">
                        <a href="user_orders.php"><button class="btn btn-primary form-control"><i class="bi-box"
                                    style="font-size:20px;">
                                </i> Orders</button></a>
                        <a href="user_profile.php"><button class="btn form-control"><i class="bi-person"
                                    style="font-size:20px;">
                                </i> Profile</button></a>
                        <a href="user_settings.php"><button class="btn form-control"><i class="bi-gear"
                                    style="font-size:20px;">
                                </i> Settings</button></a>
                    </div>
                    <div class="col-lg-10">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <ul class="nav nav-pills mb-3 flex-column flex-sm-row nav-justified" id="pills-tab"
                                        role="tablist">
                                        <li class="nav-item flex-sm-fill" role="presentation">
                                            <button class="nav-link active" id="pills-pending-tab" data-bs-toggle="pill"
                                                data-bs-target="#pills-pending" type="button" role="tab"
                                                aria-controls="pills-pending" aria-selected="true"><i
                                                    class="bi-clock-fill" style="font-size:20px;">
                                                </i>PENDING PAYMENT <span
                                                    class="badge bg-dark text-white ms-1 rounded-pill"
                                                    id="totalPending"></span></button>
                                        </li>
                                        <li class="nav-item flex-sm-fill" role="presentation">
                                            <button class="nav-link" id="pills-tracking-tab" data-bs-toggle="pill"
                                                data-bs-target="#pills-tracking" type="button" role="tab"
                                                aria-controls="pills-tracking" aria-selected="false"><i
                                                    class="bi-truck-front-fill" style="font-size:20px;">
                                                </i>TRACKING <span class="badge bg-dark text-white ms-1 rounded-pill"
                                                    id="totalTracking"></span></button>
                                        </li>
                                        <li class="nav-item flex-sm-fill" role="presentation">
                                            <button class="nav-link" id="pills-completed-tab" data-bs-toggle="pill"
                                                data-bs-target="#pills-completed" type="button" role="tab"
                                                aria-controls="pills-completed" aria-selected="false"><i
                                                    class="bi-bag-check-fill" style="font-size:20px;">
                                                </i>COMPLETED<span class="badge bg-dark text-white ms-1 rounded-pill"
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
                                            style="overflow-y:scroll; overflow-x: hidden">
                                            <?php
                                            $sql = "SELECT * FROM `tbl_products` LEFT JOIN `tbl_orders` ON tbl_products.ID = tbl_orders.Order_ProductID WHERE Order_User = '$user' AND Order_Status='Pending'";
                                            $result = $db->query($sql);
                                            while ($prow = mysqli_fetch_array($result)) {
                                                ?>
                                                <div class="row">
                                                    <table class="table table-borderless">
                                                        <tr>
                                                            <td rowspan="5" style="width: 200px;backgroud-image:url('')">
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
                                                                    value="P <?php echo $prow['Order_Total'] ?>" readonly>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <input type="text" class="form-control quantity"
                                                                    style="text-align:center;"
                                                                    value="<?php echo $prow['Order_Remarks'] ?>" readonly>
                                                            </td>
                                                            <td colspan=2>
                                                                <?php if ($prow['Order_Payment_Img'] == ''): ?>
                                                                    <button class="btn btn-primary payment"
                                                                        style="text-align:center;margin:2px; float:right;"
                                                                        data-toggle="modal" data-target="#payment"
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
                                            style="overflow-y:scroll; overflow-x: hidden">
                                            <?php
                                            $sql = "SELECT * FROM `tbl_products` LEFT JOIN `tbl_orders` ON tbl_products.ID = tbl_orders.Order_ProductID WHERE Order_User = '$user' AND Order_Status='Tracking'";
                                            $result = $db->query($sql);
                                            while ($prow = mysqli_fetch_array($result)) {
                                                ?>
                                                <div class="row">
                                                    <table class="table table-borderless">
                                                        <tr>
                                                            <td rowspan="5" style="width: 200px;backgroud-image:url('')">
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
                                                                    value="P <?php echo $prow['Order_Total'] ?>" readonly>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan=3>
                                                                <input type="text" class="form-control quantity"
                                                                    style="text-align:center;"
                                                                    value="<?php echo $prow['Order_Remarks'] ?>" readonly>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            <?php } ?>
                                        </div>
                                        <!--==========TABS FOR COMPLETED ORDERS==========-->
                                        <div class="tab-pane fade" id="pills-completed" role="tabpanel"
                                            aria-labelledby="pills-completed-tab"
                                            style="overflow-y:scroll; overflow-x: hidden">
                                            <?php
                                            $sql = "SELECT * FROM `tbl_products` LEFT JOIN `tbl_orders` ON tbl_products.ID = tbl_orders.Order_ProductID WHERE Order_User = '$user' AND Order_Status='Completed'";
                                            $result = $db->query($sql);
                                            while ($prow = mysqli_fetch_array($result)) {
                                                ?>
                                                <div class="row">
                                                    <table class="table table-borderless">
                                                        <tr>
                                                            <td rowspan="5" style="width: 200px;backgroud-image:url('')">
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
                                                                    value="P <?php echo $prow['Order_Total'] ?>" readonly>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <input type="text" class="form-control quantity"
                                                                    style="text-align:center;"
                                                                    value="<?php echo $prow['Order_Remarks'] ?>" readonly>
                                                            </td>
                                                            <td colspan=2>
                                                                <?php if ($prow['Order_Payment_Img'] == ''): ?>
                                                                    <button class="btn btn-primary payment"
                                                                        style="text-align:center;margin:2px; float:right;"
                                                                        data-toggle="modal" data-target="#payment"
                                                                        data-id="<?php echo $prow['Order_ID'] ?>">PAY</button>
                                                                    <button class="btn btn-danger"
                                                                        style="text-align:center; margin:2px; float:right;">CANCEL</button>
                                                                <?php else: ?>
                                                                <?php endif; ?>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            <?php } ?>
                                        </div>
                                        <!--==========TABS FOR CANCELED ORDERS==========-->
                                        <div class="tab-pane fade" id="pills-canceled" role="tabpanel"
                                            aria-labelledby="pills-canceled-tab">
                                            <?php
                                            $sql = "SELECT * FROM `tbl_products` LEFT JOIN `tbl_orders` ON tbl_products.ID = tbl_orders.Order_ProductID WHERE Order_User = '$user' AND Order_Status='Canceled'";
                                            $result = $db->query($sql);
                                            while ($prow = mysqli_fetch_array($result)) {
                                                ?>
                                                <div class="row">
                                                    <table class="table table-borderless">
                                                        <tr>
                                                            <td rowspan="5" style="width: 200px;backgroud-image:url('')">
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
                                                                    value="P <?php echo $prow['Order_Total'] ?>" readonly>
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
    <div class="modal fade" id="payment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Payment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
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
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/js/main.js"></script>
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
                }
                else {
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