<?php
include "assets/php/config.php";
session_start();

if (!isset($_SESSION['Admin'])) {
    header("Location: " . $folder . "login_admin.php");
    exit();
} else {
    if($_GET['id']=="" || $_GET['id']== null){
    header("Location: admin_settings.php");
    exit();
    }
    else{
        $id = $_GET['id'];
        $admin = $_SESSION['Admin'];
        $sql = "SELECT * FROM `tbl_porfolio` WHERE P_ID='$id'";
        $result =$db->query($sql);
        $row=$result->fetch_assoc();
        $pid = $row['P_ID'];
        $pname = $row['P_Name'];
    } 
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CSDS - ADMIN</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
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
            <li class="nav-item">
                <a class="nav-link" href="admin_orders.php">
                    <i class="fas fa-cart-arrow-down"></i>
                    <span>Orders</span></a>
            </li>
            <li class="nav-item active">
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
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                    <?php echo $admin ?>
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" onclick="logout();">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card-header">
                                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#addType">
                                    Add Images
                                </button>
                                <h4>PROJECT NAME : <?php echo $pname ?></h4>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered" id="productType" style="table-layout: fixed; width: 100%">
                                    <thead>
                                        <tr>
                                            <th hidden>ID</th>
                                            <th>Product Type</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql = "SELECT * FROM `tbl_portfolio_images` WHERE PI_Project='$id'";
                                        $result = $db->query($sql);
                                        while ($prow = mysqli_fetch_array($result)) {
                                            ?>
                                        <tr>
                                            <td hidden>
                                                <?php echo $prow['PI_ID'] ?>
                                            </td>
                                            <td style="">
                                                <?php echo '<img height="150" width="150" style="border:1px black solid; alt="" loading="lazy" src="data:' . $prow['PI_Image_Type'] . ';base64,' . base64_encode($prow['PI_Images']) . '"/>'; ?>
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-danger" onclick="delete_image(<?php echo $id ?>,<?php echo $prow['PI_ID'] ?>);">Delete</button>
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
    <div class="modal fade" id="addType" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Image</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="assets/php/admin_add_project_images.php" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="col-lg-12 files">
                            <input type="hidden" name="pid" required value="<?php echo $id ?>">
                            <input type="file" name="file" id="up" accept="image/jpeg, image/png" required>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" style="float:right;">ADD</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#productType').DataTable({
                "autoWidth": true
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
                    window.location.href = 'assets/php/admin_logout.php';
                }
            })
        }

        function delete_image($___id, $___pid) {
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
                    window.location.href = 'assets/php/delete_image.php?id=' + $___id + '&pid=' + $___pid;
                }
            })
        }

    </script>
</body>

</html>
