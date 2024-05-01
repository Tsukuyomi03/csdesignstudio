<?php
include ("assets/php/config.php");
session_start();

if (!isset($_SESSION['User'])) {
    header("Location: " . $folder . "index_login.php");
    exit();
} else {
    $user = $_SESSION['User'];
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
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
    <div class="container">
        <div class="row">
            <?php
            $sql = "SELECT * FROM `tbl_products`";
            $result = $db->query($sql);
            if ($result->num_rows > 0) {
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
                                    P <?php echo number_format($prow['P_Price'], 2); ?>
                                </div>
                            </div>
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center">
                                    <a class="btn btn-outline-dark mt-auto" data-bs-toggle="modal"
                                        data-bs-target="#viewProducts" data-pid="<?php echo $prow['ID'] ?>"
                                        data-pname="<?php echo $prow['P_Name'] ?>"
                                        data-pdes="<?php echo $prow['P_Description'] ?>"
                                        data-ptype="<?php echo $prow['P_Type'] ?>" data-pprice="<?php echo $prow['P_Price'] ?>"
                                        data-whatever="<?php echo 'data:' . $prow['P_Img_Type'] . ';base64,' . base64_encode($prow['P_Img_Name']) . '' ?>"
                                        href="#">View Product</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            <?php } else { ?>
                <div class="col-lg-12">
                    <div class="d-flex justify-content-center">
                        <h2 style="color;white;">THERE ARE CURRENTLY NO PRODUCTS</h2>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <div class="modal fade" id="viewProducts" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content bg-black" style="border: 2px solid white">
                <div class="modal-body">
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
                                            <td style="background-color:black;"><input class="form-control" id="qty"
                                                    type="num" name="qty" value="1">
                                            </td>
                                            <td style="background-color:black;">
                                                <button class="btn btn-dark" type="button" onclick="addToCart();"
                                                    value="" id="patc">
                                                    <i class="bi-cart-fill me-1"></i>
                                                    Add to cart
                                                </button>
                                            </td>
                                            <td style="background-color:black;">
                                                <button class="btn btn-success" type="button" onclick="buyNow();">
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
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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