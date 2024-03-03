<?php
include("assets/php/config.php");
session_start();
if (!isset($_SESSION['Admin'])) {
    header('Location: index.php');
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
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link href="assets/css/admin.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="//cdn.datatables.net/2.0.1/css/dataTables.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/files.css">
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
            <li class="nav-item active">
                <a class="nav-link" href="admin_products.php">
                    <i class="fas fa-fw fa-boxes"></i>
                    <span>Products</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="admin_orders.php">
                    <i class="fas fa-cart-arrow-down"></i>
                    <span>Orders</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="admin_settings.php">
                    <i class="fas fa-fw fa-cog"></i>
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
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card-header">
                                <h4>
                                    LIST OF PRODUCTS
                                    <button type="button" class="btn btn-primary float-right" data-toggle="modal"
                                        data-target="#addProduct">
                                        Add Products
                                    </button>
                                </h4>
                            </div>
                            <div class="card-body">
                                <div class="message-show">

                                </div>
                                <table class="table table-bordered" id="productTable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Product Name</th>
                                            <th>Description</th>
                                            <th>Price</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT * FROM `tbl_products`";
                                        $result = $db->query($sql);
                                        while ($prow = mysqli_fetch_array($result)) {
                                            ?>
                                            <tr>
                                                <td hidden="">
                                                    <?php echo $prow['ID'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $prow['P_Name'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $prow['P_Description'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $prow['P_Price'] ?>
                                                </td>
                                                <td hidden="">
                                                    <?php echo $prow['P_Image'] ?>
                                                </td>
                                                <td hidden="">
                                                    <?php echo $prow['P_Image_Type'] ?>
                                                </td>
                                                <td>
                                                    <button class="btn btn-warning btn-sm editCivil">Edit</button>

                                                    <a class="btn btn-primary btn-sm" data-toggle="modal"
                                                        data-target="#ViewCert"
                                                        data-whatever="<?php echo 'data:' . $prow['P_Image_Type'] . ';base64,' . base64_encode($prow['P_Image']) ?>">View</a>

                                                    <a class="btn btn-secondary btn-sm reuploadCert">Reupload</a>

                                                    <a href="assets/php/download_cert.php?id=<?php echo $cse_row['ID'] ?>"
                                                        class="btn btn-sm btn-success">Download</a>

                                                    <a href="assets/php/delete_eligibility.php?id=<?php echo $cse_row['ID'] ?>"
                                                        onclick="return confirm('Are you sure you want to delete this data?')"
                                                        class="btn btn-sm btn-danger">Delete</a>
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




    <!--==================================MODAL FOR LOGUT====================================-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="assets/php/admin_logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!--==================================MODAL FOR ADDING PRODUCTS====================================-->
    <div class="modal fade" id="addProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                </div>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group">
                                Product Name
                                <input type="text" name="cse" class="form-control" required>
                            </div>
                            <div class="form-group">
                                Product Description
                                <input type="text" name="cse" class="form-control" required>
                            </div>
                            <div class="form-group">
                                Product Price
                                <input type="text" name="cse" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 files">
                                <input type="file" name="file" id="up" accept="image/jpeg, image/png" required>
                            </div>
                        </div>
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" name="upload" type="submit" style="float: right">Add</button>
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
    <script src="//cdn.datatables.net/2.0.1/js/dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script>
        let table = new DataTable('#productTable');
    </script>
</body>

</html>