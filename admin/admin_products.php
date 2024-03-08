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
                                <table class="table table-bordered" id="productTable"
                                    style="table-layout: fixed; width: 100%">
                                    <thead>
                                        <tr>
                                            <th hidden>ID</th>
                                            <th>Product Name</th>
                                            <th>Description</th>
                                            <th>Type</th>
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
                                                <td hidden>
                                                    <?php echo $prow['ID'] ?>
                                                </td>
                                                <td style="white-space:nowrap;overflow:hidden;text-overflow:ellipsis">
                                                    <?php echo $prow['P_Name'] ?>
                                                </td>
                                                <td style="white-space:nowrap;overflow:hidden;text-overflow:ellipsis">
                                                    <?php echo $prow['P_Description'] ?>
                                                </td>
                                                <td style="white-space:nowrap;overflow:hidden;text-overflow:ellipsis">
                                                    <?php echo $prow['P_Type'] ?>
                                                </td>
                                                <td style="white-space:nowrap;overflow:hidden;text-overflow:ellipsis">
                                                    <?php echo $prow['P_Price'] ?>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-sm btn-warning editProducts"
                                                        data-toggle="modal" data-target="#updateProducts"
                                                        data-pid="<?php echo $prow['ID'] ?>"
                                                        data-pname="<?php echo $prow['P_Name'] ?>"
                                                        data-pdes="<?php echo $prow['P_Description'] ?>"
                                                        data-ptype="<?php echo $prow['P_Type'] ?>"
                                                        data-pprice="<?php echo $prow['P_Price'] ?>">Update</button>

                                                    <button class="btn btn-primary btn-sm viewProduct" data-toggle="modal"
                                                        data-target="#view"
                                                        data-whatever="<?php echo 'data:' . $prow['P_Img_Type'] . ';base64,' . base64_encode($prow['P_Img_Name']) . '' ?>">View</button>

                                                    <a class="btn btn-secondary btn-sm reuploadCert">Reupload</a>

                                                    <button class="btn btn-sm btn-danger" id='idtoedit'
                                                        value="<?php echo $prow['ID'] ?>"
                                                        onclick="delete_product(<?php echo $prow['ID'] ?>)">Delete</button>
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

    <!--==================================MODAL FOR ADDING PRODUCTS====================================-->
    <div class="modal fade" id="addProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                </div>
                <form action="assets/php/admin_add_products.php" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="container">
                            <div class="form-group">
                                Product Name
                                <input type="text" name="pname" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <h6>Product Description</h6>
                                <input type="text" name="pdes" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <h6>Product Type</h6>
                                <select name="ptype" required id="ptype" class="form-control">
                                    <option value="" hidden>Select Type</option>
                                    <option value="Sofa">Sofa</option>
                                    <option value="Chair">Chair</option>
                                    <option value="Tables">Tables</option>
                                </select>
                            </div>
                            <div class="form-group">
                                Product Price
                                <input type="text" name="pprice" class="form-control" required>
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

    <!--==================================MODAL FOR UPDATING PRODUCTS====================================-->
    <div class="modal fade" id="updateProducts" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="assets/php/admin_update_product.php">
                        <table class="nowrap table">
                            <input type="hidden" id="idno" value="" name="idno">
                            <tr>
                                <td>Product Name</td>
                                <td>
                                    <input type="text" name="pid" class="form-control" id="pid" required hidden>
                                    <input type="text" name="pname" class="form-control" id="pname" required>
                                </td>
                            </tr>
                            <tr>
                                <td>Description</td>
                                <td><input type="text" name="pdes" class="form-control" id="pdes" required></td>
                            </tr>
                            <tr>
                                <td>Type</td>
                                <td>
                                    <select name="ptype" required id="ptype" class="form-control">
                                        <option value="" hidden>Select Type</option>
                                        <option value="Sofa">Sofa</option>
                                        <option value="Chair">Chair</option>
                                        <option value="Tables">Tables</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Price</td>
                                <td><input type="text" name="pprice" class="form-control" id="pprice" required
                                        onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))">
                                </td>
                            </tr>
                        </table>
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" name="upload" type="submit" style="float: right">Update</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="view" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">

                    <img src="#" id="sample" width="100%">

                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"
        integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+"
        crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

    <script>
        function delete_product($___id) {
            var pid = $___id;
            Swal.fire({
                title: 'CONFIRMATION',
                text: "Are you sure you want to delete this product?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'assets/php/admin_delete_products.php?id=' + pid;
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
        }
        function addToCart($___user, $___order, $___quantity) {
            $.ajax({
                url: 'user_addToCart.php?user=' + $___user + 'order=' + $___order + 'qty=' + $___quantity,
                type: 'POST',
                async: true,
                cache: false,
                contentType: false,
                processData: false,
            }
            );
        }
        $(document).ready(function () {
            $('#productTable').DataTable({
                "autoWidth": true
            });
        });

        $('#updateProducts').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var pid = button.data('pid')
            var pname = button.data('pname')
            var pdes = button.data('pdes')
            var ptype = button.data('ptype')
            var pprice = button.data('pprice')
            var modal = $(this)
            modal.find('#pid').val(pid)
            modal.find('#pname').val(pname)
            modal.find('#pdes').val(pdes)
            modal.find('#ptype').val(ptype)
            modal.find('#pprice').val(pprice)
        });

        $('#view').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var pid = button.data('whatever')
            var modal = $(this)
            document.getElementById("sample").src = pid;
        })

    </script>
</body>

</html>