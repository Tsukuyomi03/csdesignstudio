<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="https://vineethtr.000webhostapp.com/wp-content/uploads/2018/01/logo.png" sizes="192x192" />
    <link rel="apple-touch-icon-precomposed"
        href="https://vineethtr.000webhostapp.com/wp-content/uploads/2018/01/logo.png" />
    <meta name="msapplication-TileImage"
        content="https://vineethtr.000webhostapp.com/wp-content/uploads/2018/01/logo.png" />
    <title>CS DESGIN STUDIO</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="assets/css/main.css" rel="stylesheet">
    <style media="screen">
        .vertical.carousel .carousel-control {
            bottom: auto;
            width: 100%;
            height: 15%;
            background: -webkit-gradient(linear, left top, left bottom, color-stop(0, rgba(0, 0, 0, 0.5)), to(rgba(0, 0, 0, 0)));
            background: -moz-linear-gradient(top, rgba(0, 0, 0, 0.5) 0, rgba(0, 0, 0, 0) 100%);
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0.5) 0, rgba(0, 0, 0, 0) 100%);
        }

        .vertical.carousel .carousel-control.right {
            top: auto;
            bottom: 0;
            background: -webkit-gradient(linear, left top, left bottom, from(rgba(0, 0, 0, 0)), to(rgba(0, 0, 0, 0.5)));
            background: -moz-linear-gradient(top, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.5) 100%);
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.5) 100%);
        }

        .vertical.carousel .carousel-control .glyphicon {
            -webkit-transform: rotate(90deg);
            transform: rotate(90deg);
        }

        .vertical.carousel .carousel-indicators {
            bottom: auto;
            top: 50%;
            left: auto;
            right: 10px;
            width: 14px;
            margin: 0;
            -webkit-transform: translateY(-50%);
            transform: translateY(-50%);
        }

        .vertical.carousel .carousel-inner>.item {
            left: 0;
            top: 0;
        }

        .vertical.carousel .carousel-inner>.item>img {
            width: 100%;
        }

        .vertical.carousel .carousel-inner>.item.next,
        .vertical.carousel .carousel-inner>.item.active.right {
            -webkit-transform: translate3d(0, 100%, 0);
            transform: translate3d(0, 100%, 0);
            top: 0;
        }

        .vertical.carousel .carousel-inner>.item.prev,
        .vertical.carousel .carousel-inner>.item.active.left {
            -webkit-transform: translate3d(0, -100%, 0);
            transform: translate3d(0, -100%, 0);
            top: 0;
        }

        .vertical.carousel .carousel-inner>.item.next.left,
        .vertical.carousel .carousel-inner>.item.prev.right,
        .vertical.carousel .carousel-inner>.item.active {
            -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
            top: 0;
        }

        .vertical.carousel .carousel-inner>.active,
        .vertical.carousel .carousel-inner>.next.left,
        .vertical.carousel .carousel-inner .prev.right {
            top: 0;
        }

        .vertical.carousel .carousel-inner>.next,
        .vertical.carousel .carousel-inner>.active.right {
            top: 100%;
            left: 0;
        }

        .vertical.carousel .carousel-inner>.prev,
        .vertical.carousel .carousel-inner>.active.left {
            top: -100%;
            left: 0;
        }

        // * Not required only for infobox *//
        .s {
            color: #d44950
        }

        /* Literal.String */
        .na {
            color: #4f9fcf
        }

        /* Name.Attribute */
        .nt {
            color: #2f6f9f;
        }

        /* Name.Tag */
    </style>
</head>
</style>

<body style="overflow-y:hidden;">
    <header id="header" class="header fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">
            <a href="index_about.php" class="logo d-flex align-items-center me-auto me-lg-0">
                <h1>CS <span style="color:gray">Design Studio</span></h1>
            </a>
        </div>
    </header>
    <main id="main">
        <div class="vertical carousel slide" id="carousel-example-generic" data-ride="carousel" style="width:100%">
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img alt="First slide [900x500]" src="assets/img/modular_kitchen.jpg" data-holder-rendered="true"
                        class="carousel-images" style="width:100%; height: 1000px;">
                    <div class="carousel-caption d-none d-md-block">
                        <h1>INTERIOR DESIGNS</h1>
                        <br>
                        <br>
                        <p>...</p>
                    </div>
                </div>
                <div class="item">
                    <img alt="Second slide [900x500]" src="assets/img/carousel1.jpg" data-holder-rendered="true"
                        style="width:100%; height: 1000px;">
                    <div class="carousel-caption d-none d-md-block">
                        <h1>EXTERIOR DESIGNS</h1>
                        <br>
                        <br>
                        <p>...</p>
                    </div>
                </div>
                <div class="item">
                    <img alt="Third slide [900x500]" src="assets/img/carousel2.jpg" data-holder-rendered="true"
                        style="width:100%; height: 1000px;">
                    <div class="carousel-caption d-none d-md-block">
                        <h1>WE OFFER FREE ESTIMATE</h1>
                        <br>
                        <br>
                        <p>...</p>
                    </div>
                </div>
            </div>
            <a href="#carousel-example-generic" class="left carousel-control" role="button" data-slide="prev"> <span
                    class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> <span
                    class="sr-only">Previous</span>
            </a>
            <a href="#carousel-example-generic" class="right carousel-control" role="button" data-slide="next"> <span
                    class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> <span
                    class="sr-only">Next</span> </a>
        </div>
    </main>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
</body>

</html>