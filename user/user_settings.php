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
                        <a href="user_orders.php"><button class="btn form-control"><i class="bi-box"
                                    style="font-size:20px;">
                                </i> Orders</button></button></a>
                        <a href="user_profile.php"><button class="btn form-control"><i class="bi-person"
                                    style="font-size:20px;">
                                </i> Profile</button></a>
                        <a href="user_settings.php"><button class="btn btn-primary form-control"><i class="bi-gear"
                                    style="font-size:20px;">
                                </i> Settings</button></a>
                    </div>
                    <div class="col-lg-10">
                        <div class="container">
                            <div class="row">
                                <div class="col-6">
                                    <h6>PASSWORD MANAGER</h6>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="bi-lock"></i></div>
                                        </div>
                                        <input id="opword" type="password" class="form-control" required name="opword"
                                            placeholder="Enter Old Password">
                                    </div>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="bi-lock"></i></div>
                                        </div>
                                        <input id="npword" type="password" class="form-control" required name="npword"
                                            placeholder="Enter New Password">
                                    </div>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="bi-lock"></i></div>
                                        </div>
                                        <input id="cnpword" type="password" class="form-control" required name="cnpword"
                                            placeholder="Re-Enter New Password" onkeyup='passConfirm();'>
                                    </div>
                                    <div class="input-group mb-2">
                                        <input id="show" type="checkbox" onclick="showPass()">&nbsp;Show Password
                                    </div>
                                </div>
                            </div>
                            <button style="float:left;" class="btn btn-outline-dark" id="updatePassword">UPDATE
                                PASSWORD</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
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
            $('#updatePassword').on('click', function () {
                var opword = $('#opword').val();
                var npword = $('#npword').val();
                var cnpword = $('#cnpword').val();
                $.ajax({
                    url: "assets/ajax/user_updatePassword.php",
                    type: "POST",
                    data: {
                        opword: opword,
                        npword: npword,
                        cnpword: cnpword,
                    },
                    cache: false,
                    success: function (dataResult) {
                        var dataResult = JSON.parse(dataResult);
                        if (dataResult.statusCode == 200) {
                            Swal.fire({
                                icon: 'success',
                                text: 'Password Updated Successfully',
                            })
                        }
                        else if (dataResult.statusCode == 201) {
                            Swal.fire({
                                icon: 'error',
                                text: 'Invalid Password',
                            })
                        }
                        else if (dataResult.statusCode == 203) {
                            Swal.fire({
                                icon: 'error',
                                text: 'Cant Use Old Password',
                            })
                        }
                        else {
                            Swal.fire({
                                icon: 'error',
                                text: 'Operation Failed',
                            })
                        }
                    }
                });
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
        function showPass() {
            var x = document.getElementById("opword");
            var y = document.getElementById("npword");
            var z = document.getElementById("cnpword");
            if (x.type === "password") {
                x.type = "text";
                y.type = "text";
                z.type = "text";
            } else {
                x.type = "password";
                y.type = "password";
                z.type = "password";
            }
        }
        var passConfirm = function () {
            if (document.getElementById("npword").value == document.getElementById("cnpword").value) {
                document.getElementById("npword").style.border = "1px solid rgb(209, 211, 226)";
                document.getElementById("cnpword").style.border = "1px solid rgb(209, 211, 226)";
                document.getElementById('updatePassword').disabled = false;
            } else {
                document.getElementById("npword").style.border = "2px solid red";
                document.getElementById("cnpword").style.border = "2px solid red";
                document.getElementById('updatePassword').disabled = true;
            }
        }
    </script>
</body>

</html>