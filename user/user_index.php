<?php
include("assets/php/config.php");
session_start();

if (!isset($_SESSION['User'])) {
    header("Location: " . $folder . "login_user.php");
    exit();
} else {
    $user = $_SESSION['User'];
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

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.all.min.js"></script>
</head>
<style>
    .menu-img {
        width: 100%;
        height: 100%;
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
    <header id="header" class="header fixed-top d-flex align-items-center fixed-top">
        <div class="container d-flex align-items-center justify-content-between">
            <a href="index.php" class="logo d-flex align-items-center me-auto me-lg-0">
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
                            <a class="dropdown-item" href="assets/php/logout.php"
                                onclick="return confirm('Are you sure you want to Log Out?')">
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
                    <?php
                    $sql = "SELECT * FROM `tbl_products`";
                    $result = $db->query($sql);
                    while ($prow = mysqli_fetch_array($result)) {
                        ?>
                        <div class="col-lg-3 col-3 mb-5">
                            <div class="card h-100">
                                <img class="card-img-top"
                                    src="<?php echo 'data:' . $prow['P_Img_Type'] . ';base64,' . base64_encode($prow['P_Img_Name']) ?>">
                                <div class="card-body p-4">
                                    <div class="text-center">
                                        <h5 class="fw-bolder">
                                            <?php echo $prow['P_Name'] ?>
                                        </h5>
                                        P
                                        <?php echo doubleval($prow['P_Price']) ?>
                                    </div>
                                </div>
                                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                    <div class="text-center">
                                        <a class="btn btn-outline-dark mt-auto" data-toggle="modal"
                                            data-target="#viewProducts" data-pid="<?php echo $prow['ID'] ?>"
                                            data-pname="<?php echo $prow['P_Name'] ?>"
                                            data-pdes="<?php echo $prow['P_Description'] ?>"
                                            data-ptype="<?php echo $prow['P_Type'] ?>"
                                            data-pprice="<?php echo $prow['P_Price'] ?>"
                                            data-whatever="<?php echo 'data:' . $prow['P_Img_Type'] . ';base64,' . base64_encode($prow['P_Img_Name']) . '' ?>"
                                            href="#">View Product</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>
    </main>

    <div class="modal fade" id="viewProducts" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <section class="py-5">
                        <div class="container px-4 px-lg-4 my-5">
                            <div class="row gx-4 gx-lg-5 align-items-center">
                                <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" id="productImage" src="">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="pid" id="pid" hidden>
                                    <h2 class="display-5 fw-bolder" id="pname">Shop item template</h2>
                                    <div class="fs-5 mb-5">
                                        <h6 id="pprice">P</h6>
                                    </div>
                                    <p class="lead" id="pdes"></p>
                                    <table class="table table-">
                                        <tr>
                                            <td><input class="form-control" id="qty" type="num" name="qty" value="1">
                                            </td>
                                            <td>
                                                <button class="btn btn-outline-dark" type="button"
                                                    onclick="addToCart();" value="" id="patc">
                                                    <i class="bi-cart-fill me-1"></i>
                                                    Add to cart
                                                </button>
                                            </td>
                                            <td>
                                                <button class="btn btn-outline-success" type="button">
                                                    <i class="bi-cart-fill me-1"></i>
                                                    Buy Now
                                                </button>
                                            </td>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>


    <footer id="footer" class="footer fixed-bottom">
        <div class="container">
            <div class="row gy-3">
                <div class="col-lg-3 col-md-6 d-flex">
                    <i class="bi bi-geo-alt icon"></i>
                    <div>
                        <h4>Address</h4>
                        <p>
                            Brgy. Pagsawitan <br>
                            Santa Cruz Laguna<br>
                        </p>
                    </div>

                </div>

                <div class="col-lg-3 col-md-6 footer-links d-flex">
                    <i class="bi bi-telephone icon"></i>
                    <div>
                        <h4>For Estimate/Canvas</h4>
                        <p>
                            <strong>Phone:</strong> (+63) 956 068 8086 <br>
                            <strong>Email:</strong> tjrc_11@yahoo.com<br>
                        </p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 footer-links d-flex">
                    <i class="bi bi-clock icon"></i>
                    <div>
                        <h4>Opening Hours</h4>
                        <p>
                            <span style="color:green">Always Open</span>
                        </p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Follow Us</h4>
                    <div class="social-links d-flex">
                        <a href="https://www.facebook.com/CALLADOSUNGA.DESIGNSTUDIO" target="_blank" class="facebook"><i
                                class="bi bi-facebook"></i></a>
                    </div>
                </div>

            </div>
        </div>
    </footer>
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
            })
        });
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