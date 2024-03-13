<?php
include("assets/php/config.php");
session_start();
if (!isset($_SESSION['Admin'])) {
    header("Location: " . $folder . "login_admin.php");
    exit();
} else {
    $admin = $_SESSION['Admin'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CSDS - ADMIN</title>
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="assets/css/files.css">
    <link rel="stylesheet" href="assets/css/admin.min.css">
</head>

<body id="page-top">
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
    <div id="wrapper">
        <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="admin_dashboard.php">
                <div class="sidebar-brand-text mx-3">CS Design Studio</div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item">
                <a class="nav-link" href="admin_dashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="admin_products.php">
                    <i class="fas fa-fw fa-boxes"></i>
                    <span>Products</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link " href="admin_orders.php">
                    <i class="fas fa-cart-arrow-down"></i>
                    <span>Orders</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="admin_settings.php">
                    <i class="fas fa-cog"></i>
                    <span>Settings</span></a>
            </li>
            <hr class="sidebar-divider d-none d-md-block">
        </ul>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                    <?php echo $admin ?>
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" onclick="logout()">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <div class="container-fluid">
                    <div class="row">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pending-tab" data-toggle="tab"
                                    data-target="#pending" type="button" role="tab" aria-controls="pending"
                                    aria-selected="true">PENDING</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="tracking-tab" data-toggle="tab" data-target="#tracking"
                                    type="button" role="tab" aria-controls="tracking"
                                    aria-selected="false">TRACKING</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="completed-tab" data-toggle="tab" data-target="#completed"
                                    type="button" role="tab" aria-controls="completed"
                                    aria-selected="false">COMPLETED</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="canceled-tab" data-toggle="tab" data-target="#canceled"
                                    type="button" role="tab" aria-controls="canceled"
                                    aria-selected="false">CANCELED</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <!--========== TABS FOR PENDING TRANSACTIONS ==========-->
                            <div class="tab-pane fade show active" id="pending" role="tabpanel"
                                aria-labelledby="pending-tab">
                                <br>
                                <table class="table table-bordered" id="tblPending"
                                    style="table-layout: fixed; width: 100%">
                                    <thead>
                                        <tr>
                                            <th hidden>ID</th>
                                            <th>Username</th>
                                            <th>Product ID</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Total</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT * FROM tbl_orders LEFT JOIN tbl_products ON tbl_orders.Order_ProductID = tbl_products.ID LEFT JOIN tbl_users ON tbl_orders.Order_User = tbl_users.Username WHERE tbl_orders.Order_Status ='Pending' AND tbl_orders.Order_Payment_Img != ''";
                                        $result = $db->query($sql);
                                        while ($prow = mysqli_fetch_array($result)) {
                                            ?>
                                            <tr>
                                                <td hidden>
                                                    <?php echo $prow['Order_ID'] ?>
                                                </td>
                                                <td style="white-space:nowrap;overflow:hidden;text-overflow:ellipsis">
                                                    <?php echo $prow['Username'] ?>
                                                </td>
                                                <td style="white-space:nowrap;overflow:hidden;text-overflow:ellipsis">
                                                    <?php echo $prow['Order_ProductID'] ?>
                                                </td>
                                                <td style="white-space:nowrap;overflow:hidden;text-overflow:ellipsis">
                                                    <?php echo $prow['P_Price'] ?>
                                                </td>
                                                <td style="white-space:nowrap;overflow:hidden;text-overflow:ellipsis">
                                                    <?php echo $prow['Order_QTY'] ?>
                                                </td>
                                                <td style="white-space:nowrap;overflow:hidden;text-overflow:ellipsis">
                                                    <?php echo $prow['Order_Total'] ?>
                                                </td>
                                                <td>
                                                    <a class="btn btn-secondary btn-sm" data-target="#viewOrder"
                                                        data-toggle="modal" data-uname="<?php echo $prow['Name'] ?>"
                                                        data-usname="<?php echo $prow['Last_Name'] ?>"
                                                        data-ustreet="<?php echo $prow['Street'] ?>"
                                                        data-ubrgy="<?php echo $prow['Brgy'] ?>"
                                                        data-ucity="<?php echo $prow['City'] ?>"
                                                        data-uprovince="<?php echo $prow['Province'] ?>"
                                                        data-oid="<?php echo $prow['Order_ID'] ?>"
                                                        data-rno="<?php echo $prow['Order_Payment_ReferenceNo'] ?>"
                                                        data-opt="<?php echo $prow['Order_Payment_Type'] ?>"
                                                        data-oqty="<?php echo $prow['Order_QTY'] ?>"
                                                        data-ototal="<?php echo $prow['Order_Total'] ?>"
                                                        data-pname="<?php echo $prow['P_Name'] ?>"
                                                        data-ptype="<?php echo $prow['P_Type'] ?>"
                                                        data-pprice="<?php echo $prow['P_Price'] ?>"
                                                        data-pdes="<?php echo $prow['P_Description'] ?>"
                                                        data-pimg="<?php echo 'data:' . $prow['P_Img_Type'] . ';base64,' . base64_encode($prow['P_Img_Name']) . '' ?>"
                                                        data-whatever="<?php echo 'data:' . $prow['Order_Payment_ImgType'] . ';base64,' . base64_encode($prow['Order_Payment_Img']) . '' ?>">View</a>
                                                    <a class="btn btn-primary btn-sm"
                                                        onclick="approve(<?php echo $prow['Order_ID'] ?>);">Approve</a>
                                                    <a class="btn btn-danger btn-sm"
                                                        onclick="disapprove(<?php echo $prow['Order_ID'] ?>);">Decline</a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="tracking" role="tabpanel" aria-labelledby="tracking-tab">
                                <br>
                                <table class="table table-bordered" id="tblTracking"
                                    style="table-layout: fixed; width: 100%">
                                    <thead>
                                        <tr>
                                            <th hidden>ID</th>
                                            <th>Username</th>
                                            <th>Product ID</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Total</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT * FROM tbl_orders LEFT JOIN tbl_products ON tbl_orders.Order_ProductID = tbl_products.ID LEFT JOIN tbl_users ON tbl_orders.Order_User = tbl_users.Username WHERE tbl_orders.Order_Status ='Tracking'";
                                        $result = $db->query($sql);
                                        while ($prow = mysqli_fetch_array($result)) {
                                            ?>
                                            <tr>
                                                <td hidden>
                                                    <?php echo $prow['Order_ID'] ?>
                                                </td>
                                                <td style="white-space:nowrap;overflow:hidden;text-overflow:ellipsis">
                                                    <?php echo $prow['Username'] ?>
                                                </td>
                                                <td style="white-space:nowrap;overflow:hidden;text-overflow:ellipsis">
                                                    <?php echo $prow['Order_ProductID'] ?>
                                                </td>
                                                <td style="white-space:nowrap;overflow:hidden;text-overflow:ellipsis">
                                                    <?php echo $prow['P_Price'] ?>
                                                </td>
                                                <td style="white-space:nowrap;overflow:hidden;text-overflow:ellipsis">
                                                    <?php echo $prow['Order_QTY'] ?>
                                                </td>
                                                <td style="white-space:nowrap;overflow:hidden;text-overflow:ellipsis">
                                                    <?php echo $prow['Order_Total'] ?>
                                                </td>
                                                <td>
                                                    <a class="btn btn-warning btn-sm" data-toggle="modal"
                                                        data-target="#updateTracking"
                                                        data-oid="<?php echo $prow['Order_ID'] ?>">STATUS</a>
                                                    <a class="btn btn-success btn-sm"
                                                        data-oid="<?php echo $prow['Order_ID'] ?>"
                                                        onclick="orderComplete(<?php echo $prow['Order_ID'] ?>);">MARK AS
                                                        DONE</a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="completed" role="tabpanel" aria-labelledby="completed-tab">
                                <div class="tab-pane fade show active" id="pending" role="tabpanel"
                                    aria-labelledby="pending-tab">
                                    <br>
                                    <table class="table table-bordered" id="tblCompleted"
                                        style="table-layout: fixed; width: 100%">
                                        <thead>
                                            <tr>
                                                <th hidden>ID</th>
                                                <th>Username</th>
                                                <th>Product ID</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                                <th>Total</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql = "SELECT * FROM tbl_orders LEFT JOIN tbl_products ON tbl_orders.Order_ProductID = tbl_products.ID LEFT JOIN tbl_users ON tbl_orders.Order_User = tbl_users.Username WHERE tbl_orders.Order_Status ='Completed'";
                                            $result = $db->query($sql);
                                            while ($prow = mysqli_fetch_array($result)) {
                                                ?>
                                                <tr>
                                                    <td hidden>
                                                        <?php echo $prow['Order_ID'] ?>
                                                    </td>
                                                    <td style="white-space:nowrap;overflow:hidden;text-overflow:ellipsis">
                                                        <?php echo $prow['Username'] ?>
                                                    </td>
                                                    <td style="white-space:nowrap;overflow:hidden;text-overflow:ellipsis">
                                                        <?php echo $prow['Order_ProductID'] ?>
                                                    </td>
                                                    <td style="white-space:nowrap;overflow:hidden;text-overflow:ellipsis">
                                                        <?php echo $prow['P_Price'] ?>
                                                    </td>
                                                    <td style="white-space:nowrap;overflow:hidden;text-overflow:ellipsis">
                                                        <?php echo $prow['Order_QTY'] ?>
                                                    </td>
                                                    <td style="white-space:nowrap;overflow:hidden;text-overflow:ellipsis">
                                                        <?php echo $prow['Order_Total'] ?>
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-secondary btn-sm" data-target="#viewOrder"
                                                            data-toggle="modal" data-uname="<?php echo $prow['Name'] ?>"
                                                            data-usname="<?php echo $prow['Last_Name'] ?>"
                                                            data-ustreet="<?php echo $prow['Street'] ?>"
                                                            data-ubrgy="<?php echo $prow['Brgy'] ?>"
                                                            data-ucity="<?php echo $prow['City'] ?>"
                                                            data-uprovince="<?php echo $prow['Province'] ?>"
                                                            data-oid="<?php echo $prow['Order_ID'] ?>"
                                                            data-rno="<?php echo $prow['Order_Payment_ReferenceNo'] ?>"
                                                            data-opt="<?php echo $prow['Order_Payment_Type'] ?>"
                                                            data-oqty="<?php echo $prow['Order_QTY'] ?>"
                                                            data-ototal="<?php echo $prow['Order_Total'] ?>"
                                                            data-pname="<?php echo $prow['P_Name'] ?>"
                                                            data-ptype="<?php echo $prow['P_Type'] ?>"
                                                            data-pprice="<?php echo $prow['P_Price'] ?>"
                                                            data-pdes="<?php echo $prow['P_Description'] ?>"
                                                            data-pimg="<?php echo 'data:' . $prow['P_Img_Type'] . ';base64,' . base64_encode($prow['P_Img_Name']) . '' ?>"
                                                            data-whatever="<?php echo 'data:' . $prow['Order_Payment_ImgType'] . ';base64,' . base64_encode($prow['Order_Payment_Img']) . '' ?>">View</a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="canceled" role="tabpanel" aria-labelledby="canceled-tab">
                                <br>
                                <table class="table table-bordered" id="tblCanceled"
                                    style="table-layout: fixed; width: 100%">
                                    <thead>
                                        <tr>
                                            <th hidden>ID</th>
                                            <th>Username</th>
                                            <th>Product ID</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Total</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT * FROM tbl_orders LEFT JOIN tbl_products ON tbl_orders.Order_ProductID = tbl_products.ID LEFT JOIN tbl_users ON tbl_orders.Order_User = tbl_users.Username WHERE tbl_orders.Order_Status ='Canceled'";
                                        $result = $db->query($sql);
                                        while ($prow = mysqli_fetch_array($result)) {
                                            ?>
                                            <tr>
                                                <td hidden>
                                                    <?php echo $prow['Order_ID'] ?>
                                                </td>
                                                <td style="white-space:nowrap;overflow:hidden;text-overflow:ellipsis">
                                                    <?php echo $prow['Username'] ?>
                                                </td>
                                                <td style="white-space:nowrap;overflow:hidden;text-overflow:ellipsis">
                                                    <?php echo $prow['Order_ProductID'] ?>
                                                </td>
                                                <td style="white-space:nowrap;overflow:hidden;text-overflow:ellipsis">
                                                    <?php echo $prow['P_Price'] ?>
                                                </td>
                                                <td style="white-space:nowrap;overflow:hidden;text-overflow:ellipsis">
                                                    <?php echo $prow['Order_QTY'] ?>
                                                </td>
                                                <td style="white-space:nowrap;overflow:hidden;text-overflow:ellipsis">
                                                    <?php echo $prow['Order_Total'] ?>
                                                </td>
                                                <td>
                                                    <a class="btn btn-secondary btn-sm" data-target="#viewOrder"
                                                        data-toggle="modal" data-uname="<?php echo $prow['Name'] ?>"
                                                        data-usname="<?php echo $prow['Last_Name'] ?>"
                                                        data-ustreet="<?php echo $prow['Street'] ?>"
                                                        data-ubrgy="<?php echo $prow['Brgy'] ?>"
                                                        data-ucity="<?php echo $prow['City'] ?>"
                                                        data-uprovince="<?php echo $prow['Province'] ?>"
                                                        data-oid="<?php echo $prow['Order_ID'] ?>"
                                                        data-rno="<?php echo $prow['Order_Payment_ReferenceNo'] ?>"
                                                        data-opt="<?php echo $prow['Order_Payment_Type'] ?>"
                                                        data-oqty="<?php echo $prow['Order_QTY'] ?>"
                                                        data-ototal="<?php echo $prow['Order_Total'] ?>"
                                                        data-pname="<?php echo $prow['P_Name'] ?>"
                                                        data-ptype="<?php echo $prow['P_Type'] ?>"
                                                        data-pprice="<?php echo $prow['P_Price'] ?>"
                                                        data-pdes="<?php echo $prow['P_Description'] ?>"
                                                        data-pimg="<?php echo 'data:' . $prow['P_Img_Type'] . ';base64,' . base64_encode($prow['P_Img_Name']) . '' ?>"
                                                        data-whatever="<?php echo 'data:' . $prow['Order_Payment_ImgType'] . ';base64,' . base64_encode($prow['Order_Payment_Img']) . '' ?>">View</a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="updateTracking" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    UPDATE STATUS
                </div>
                <div class="modal-body">
                    <input type="text" hidden id="usOrderID">
                    <input type="text" name="example" list="exampleList" class="form-control" id="statusInfo">
                    <datalist id="exampleList">
                        <option value="Item is being delivered">
                    </datalist>
                    <br>
                    <button class="btn btn-primary" onclick="updateStatus();">UPDATE</button>
                </div>
            </div>
        </div>
    </div>

    <div id="viewOrder" class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog"
        aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ORDER DETAILS</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-4" style="text-align: center; border: 1px dashed gray">
                            <img src="#" id="sample" width="100%" style="margin:5px">
                            <p>Payment Method</p>
                            <p id="paymentMethod"></p>
                            <p>Payment Reference No</p>
                            <p id="paymentReferenceNo"></p>
                            <br>
                        </div>
                        <div class="col-lg-8" style=" border: 1px dashed gray">
                            <div class="row">
                                <div class="col-lg-4">
                                    <img src="#" id="pimg" width="100%" style="margin:5px">
                                </div>
                                <div class="col-lg-8">
                                    <input type="text" id="oid" hidden>
                                    <strong><span style="color: black">Product Name:</span></strong>
                                    <span id="pname"></span>
                                    <br>
                                    <strong><span style="color: black">Product Description:</span></strong>
                                    <span id="pdes"></span>
                                    <br>
                                    <strong><span style="color: black">Product Type:</span></strong>
                                    <span id="ptype"></span>
                                    <br>
                                    <strong><span style="color: black">Product Price:</span></strong>
                                    <span id="pprice"></span>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <h6>ORDER INFO</h6>
                                <table class="table">
                                    <tr>
                                        <td>
                                            <span>Order By</span>
                                        </td>
                                        <td>
                                            <span> : </span>
                                        </td>
                                        <td>
                                            <span id="uname"></span> <span id="usname"></span>
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
                                            <span id="ustreet"></span> <span id="ubrgy"></span> <span id="ucity"></span>
                                            <span id="uprovince"></span>
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
                                            <span id="oqty">
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
                                            P<span id="ototal"></span>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"
        integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+"
        crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#tblPending').DataTable({
                "autoWidth": true
            });
            $('#tblTracking').DataTable({
                "autoWidth": true
            });
            $('#tblCompleted').DataTable({
                "autoWidth": true
            });
            $('#tblCanceled').DataTable({
                "autoWidth": true
            });
        });
        $('#updateTracking').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var oid = button.data('oid')
            var modal = $(this)
            modal.find('#usOrderID').val(oid);

        })
        $('#viewOrder').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var pid = button.data('whatever')
            var rno = button.data('rno');
            var opt = button.data('opt');

            var oid = button.data('oid')
            var pimg = button.data('pimg')
            var pname = button.data('pname')
            var pdes = button.data('pdes')
            var ptype = button.data('ptype')
            var pprice = button.data('pprice')
            var uname = button.data('uname')
            var usname = button.data('usname')
            var ustreet = button.data('ustreet')
            var ubrgy = button.data('ubrgy')
            var ucity = button.data('ucity')
            var uprovince = button.data('uprovince')
            var oqty = button.data('oqty')
            var ototal = button.data('ototal')

            var modal = $(this)

            document.getElementById("sample").src = pid;
            document.getElementById("paymentReferenceNo").innerHTML = rno;
            document.getElementById("paymentMethod").innerHTML = opt;

            document.getElementById("pimg").src = pimg;
            document.getElementById("pname").innerHTML = pname;
            document.getElementById("pdes").innerHTML = pdes;
            document.getElementById("ptype").innerHTML = ptype;
            document.getElementById("pprice").innerHTML = pprice;
            document.getElementById("uname").innerHTML = uname;
            document.getElementById("usname").innerHTML = usname;
            document.getElementById("ustreet").innerHTML = ustreet;
            document.getElementById("ubrgy").innerHTML = ubrgy;
            document.getElementById("ucity").innerHTML = ucity;
            document.getElementById("uprovince").innerHTML = uprovince;
            document.getElementById("oqty").innerHTML = oqty;
            document.getElementById("ototal").innerHTML = ototal;
            modal.find('#oid').val(oid);

        })
        function approve($___id) {
            Swal.fire({
                title: 'CONFIRMATION',
                text: "Are you sure you want to approve this order?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'assets/php/order_approve.php?oid=' + $___id;
                }
            })
        }
        function disapprove($___id) {
            Swal.fire({
                title: 'CONFIRMATION',
                text: "Are you sure you want disapprove this order?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'assets/php/order_disapprove.php?oid=' + $___id;
                }
            })
        }
        function updateStatus() {
            $.ajax({
                type: "POST",
                url: "assets/php/order_status.php",
                data: {
                    oid: $("#usOrderID").val(),
                    sts: $("#statusInfo").val(),
                },
                success: function (dataResult) {
                    var dataResult = JSON.parse(dataResult);
                    if (dataResult.statusCode == 200) {
                        Swal.fire({
                            icon: 'success',
                            text: 'Status Updated',
                        })
                        $('#updateTracking').modal('toggle');
                    }
                    else if (dataResult.statusCode == 201) {
                        Swal.fire({
                            icon: 'error',
                            text: 'Failed',
                        })
                    }
                }
            });
        }
        function orderComplete($___id) {
            Swal.fire({
                title: 'CONFIRMATION',
                text: "Mark as Completed?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'assets/php/order_completed.php?oid=' + $___id;
                }
            })
        }
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
                    window.location.href = 'assets/php/admin_logout.php';
                }
            })
        };
    </script>
</body>

</html>