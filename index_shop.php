<?php
include ("assets/php/config.php");
session_start();

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CS DESIGN STUDIO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;1,440&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;1,200&display=swap"
        rel="stylesheet">
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

    .services {
        font-family: "Playfair Display", serif;
        font-optical-sizing: auto;
        font-weight: 440;
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

    .dropdown:hover>.dropdown-menu {
        display: block;
    }

    .dropdown>.dropdown-toggle:active {
        /*Without this, clicking will make it sticky*/
        pointer-events: none;
    }
</style>

<body onload="display_shop('')">
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
    <nav class="navbar navbar-expand-lg bg-black" style="padding: 40px;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="assets/img/logo.jpg" style="width:50px;"></a>
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
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php" style="color:white;">HOME</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false" style="color:white;">
                            ABOUT US
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="index_about.php">CS DESIGN STUDIO</a></li>
                            <li><a class="dropdown-item" href="index_services.php">SERVICES</a></li>
                            <li><a class="dropdown-item" href="index_portfolio.php">PORTFOLIO</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <strong><a class="nav-link" href="index_shop.php" style="color:white;">SHOP</a></strong>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index_contact.php" style="color:white;">CONTACT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index_login.php" style="color:white;">LOGIN</a>
                    </li>
                </div>
            </div>
        </div>
    </nav>
    <br>
    <div class="container">
        <div class="row">
            SEARCH BY CATEGORY :
            <br>
            <div class="mb-4">
                <button class="btn btn-outline-dark text-white" style="border:2px solid white"
                    onclick="display_shop('')">All</button>
                <?php
                $sql = "SELECT * FROM tbl_type";
                $result = $db->query($sql);
                while ($row = $result->fetch_assoc()) { ?>
                    <button class="btn btn-outline-dark text-white" style="border:2px solid white"
                        onclick="display_shop('<?php echo $row['Type'] ?>')"><?php echo $row['Type'] ?></button>
                <?php }
                ?>
            </div>
            <br>
        </div>
        <div class="row" id="shop">

        </div>
    </div>

    <div class="modal fade" id="viewProducts" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
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
                                            <a href="index_login.php"><button class="btn btn-light form-control">YOU
                                                    NEED TO LOGIN
                                                    FIRST!
                                                </button></a>
                                        </tr>
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
    <script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.js"></script>
    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <script>
        $('#viewProducts').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var pname = button.data('pname')
            var pdes = button.data('pdes')
            var ptype = button.data('ptype')
            var pprice = button.data('pprice')
            var pimg = button.data('whatever')
            var pprice2 = parseInt(pprice).toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 })
            var modal = $(this)

            document.getElementById("pname").textContent = pname;
            document.getElementById("pprice").textContent = "P " + pprice2;
            document.getElementById("pdes").textContent = pdes;
            document.getElementById("productImage").src = pimg;

        });
        function display_shop(id) {
            $.ajax({
                url: "assets/php/display_shop.php",
                type: "POST",
                cache: false,
                data: {
                    id: id,
                },
                success: function (data) {
                    $('#shop').html(data);
                }
            });
        }
    </script>
</body>

</html>