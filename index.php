<!doctype html>
<html lang="en">

<!-- create a session for user -->
<?php

session_start();
require_once "Public/dbconnect.php";

if (!isset($_SESSION['username'])) {
    $_SESSION['username'] = '?';
}
if (!isset($_SESSION['is_admin'])) {
    $_SESSION['is_admin'] = 0;
}

?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- tab icon -->
    <link rel="icon" href="Assets/img/Logo.jpg">

    <title>Hellenic Bookstore</title>

    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">


    <!-- bootstrap 4.6 -->
    <link href="Assets/bootstrap/bootstrap.min.css" rel="stylesheet">

    <!-- css details -->
    <link href="Assets/css/index.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="Assets/bootstrap/dashboard.css" rel="stylesheet">

    <!-- ajax -->
    <script src="Assets/js/ajax.js"></script>

</head>

<body>

    <nav class="navbar navbar-light fixed-top bg-light">
        <div class="collapse navbar-collapse d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
            <h5 class="my-0 mr-md-auto font-weight-normal">Hellenic Bookstore</h5>
            <nav class="my-2 my-md-0 mr-md-3">
                <a class="p-2 text-dark" href="index.php?p=start">Home</a>
                <a class="p-2 text-dark" href="?p=products">Products</a>
                <a class="p-2 text-dark" href="?p=contact">About us</a>
                <a class="p-2 text-dark" href="?p=cart">Cart</a>
            </nav>
            <a class="btn btn-outline-primary" href="?p=login">Sign in</a>
        </div>
    </nav>

    <div class="row main-cont">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
            <main id='maincontent' role="main">
                <?php
                if (!isset($_REQUEST['p'])) {
                    $_REQUEST['p'] = 'start';
                }
                $p = $_REQUEST['p'];
                // list of the permited pages
                $pages = array('blog', 'start', 'shopinfo', 'login', 'do_login', 'after_login', 'logout', 'myinfo', 'contact', 'products', 'cart', 'catinfo', 'productinfo', 'add_cart', 'empty_cart', 'buy_cart');

                $ok = false;
                foreach ($pages as $pp) {
                    if ($pp == $p) {
                        require "Public/$p.php";
                        $ok = true;
                    }
                }
                if (!$ok) {
                    print "Page does not exists";
                }

                ?>
            </main>
        </div>
        <div class="col-sm-1"></div>
    </div>


    <div class="footer">
        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-2 footer-margin">
                <h3>Our Social Media</h3>
            </div>
            <div class="col-md-1 footer-margin">
                <div class="row">
                    <div class="col-md">
                        <a href="#">
                            <img src="Assets/img/facebook.png" class="icon-sosmed" alt="Logo">
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md">
                        <a href="#">
                            <img src="Assets/img/instagram.png" class="icon-sosmed" alt="Logo">
                        </a>
                    </div>
                </div>

            </div>
            <div class="col-md-1 footer-margin">
                <div class="row">
                    <div class="col-md">
                        <a href="#"><img src="Assets/img/twitter.png" class="icon-sosmed" alt="Logo"></a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md">
                        <a href="#">
                            <img src="Assets/img/youtube.png" class="icon-sosmed" alt="Logo">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 footer-margin">
                <div class="row">
                    <div class="col-md">
                        <h5>Contact us</h5>
                        <p>info@hellenicBstore.com</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md">
                        <h5>Address</h5>
                        <p>Platia Ipporodomiou 100, Thessaloniki, Greece</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md footer-bmargin">
                <hr>
                <p class="footer-copyright">
                    &copy; Hellenic Bookstore 2022
                </p>
            </div>
        </div>
    </div>



    <!-- bootstrap 4.6 javascript  -->
    <script src="Assets/bootstrap/bootstrap.min.js"></script>

    <!-- popper 1.16.1 for interactive  -->
    <script src="Assets/bootstrap/popper-1.16.1.min.js"></script>

    <!-- Jquery 3.5.1  -->
    <script src="Assets/bootstrap/jquery-3.5.1.min.js"></script>


</body>

</html>