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
    <title>Bootstrap demo</title>
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
            <div class="row">
                <br>
            </div>
            <section id="projects" class="menu">
                <div class="container">
                    <div class="row" overflow-y:scroll>
                        <?php
                        $sql = "SELECT * FROM tbl_products LEFT JOIN tbl_addtocart ON tbl_products.ID=tbl_addtocart.O_ID WHERE User='$user'";
                        $result = $db->query($sql);
                        if ($result->num_rows > 0) {
                            while ($prow = mysqli_fetch_array($result)) {
                                ?>
                                <div class="card" style="width:100%;margin-bottom:1%;">
                                    <div class="card-body">
                                        <table class="table table-borderless">
                                            <tr>
                                                <td rowspan="4" style="width: 200px;backgroud-image:url('')"> <img
                                                        class="card-img-top"
                                                        src="<?php echo 'data:' . $prow['P_Img_Type'] . ';base64,' . base64_encode($prow['P_Img_Name']) ?>">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <?php echo $prow['P_Name'] ?>
                                                </td>
                                                <td>Price</td>
                                                <td style="word-wrap: break-word;width: 150px;text-align:right;"> P
                                                    <?php echo $prow['P_Price'] ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <?php echo $prow['P_Description'] ?>
                                                </td>
                                                <td style="word-wrap: break-word;width: 100px;">Qantity</td>
                                                <td>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <button class="btn btn-outline-secondary minus" type="button"
                                                                onclick="minusQTY(<?php echo $prow['Cart_ID'] ?>);">-</button>
                                                        </div>
                                                        <input type="text" class="form-control quantity"
                                                            style="text-align:center;" value="<?php echo $prow['O_QTY'] ?>">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-outline-secondary add" type="button"
                                                                id="AddCart"
                                                                onclick="addQTY(<?php echo $prow['Cart_ID'] ?>);">+</button>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Product Type:
                                                    <?php echo $prow['P_Type'] ?>
                                                </td>
                                                <td><button class="btn btn-danger form-control"
                                                        onclick="delete_cart(<?php echo $prow['Cart_ID'] ?>)">Remove</button></button>
                                                </td>
                                                <td><button class="btn btn-primary form-control"
                                                        onclick="buyNow(<?php echo $prow['ID'] ?>,<?php echo $prow['O_QTY'] ?>,<?php echo $prow['Cart_ID'] ?>);">Checkout</button></button>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            <?php }
                        } else {
                            echo '<h1 style="color:white;text-align:center;"> No item/s on your cart, go to shop and order some.</h1>';
                        } ?>
                    </div>
                </div>
            </section>
        </main>
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
            })
        });
        $(document).ready(function () {
            $('.add, .minus').on("click", function () {
                let inputElem = $(this).parents('td').find('.quantity');
                let currentQty = inputElem.val();

                if ($(this).hasClass('add')) {
                    inputElem.val(parseInt(currentQty) + parseInt(1));
                } else {
                    if (currentQty > 1) {
                        inputElem.val(parseInt(currentQty) - parseInt(1));
                    }
                }

            });
        });

        function addQTY($___id) {
            var pid = $___id;
            $.ajax({
                type: "POST",
                url: "assets/ajax/user_addQTY.php?user=<?php echo $user ?>&pid=" + pid,
            });
        }

        function minusQTY($___id) {
            var pid = $___id;
            $.ajax({
                type: "POST",
                url: "assets/ajax/user_minusQTY.php?user=<?php echo $user ?>&pid=" + pid,
            });
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
                    window.location.href = 'assets/php/user_logout.php';
                }
            })
        }

        function delete_cart($___id) {
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
                    window.location.href = 'assets/php/user_deleteCart.php?id=' + pid;
                }
            })
        }

        function buyNow($___id, $___qty, $___cartID) {
            $.ajax({
                type: "POST",
                url: "assets/php/user_buyNow_Cart.php",
                data: {
                    id: $___id,
                    qty: $___qty,
                    cartid: $___cartID,
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

    </script>
</body>

</html>