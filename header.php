<?php
include_once('config.php');
include_once('connect.php');
include_once('connect.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- meta head will define from below-->
    <meta charset="utf-8">
    <meta name="description" content=" write the description ">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Set the title as Flex club -->
    <title>Flex Club</title>

    <!--it is linked with the CSS file type -->
    <link rel="stylesheet" href="./css/style.css" type="text/css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
            crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>


<!-- Start Header -->
<div class="container">
    <div class="navb">
        <nav class="navbar navbar-expand-lg navbar-light bg-transparent static-top">
            <!-- Brand/logo -->
            <a class="navbar-brand text-secondary h1 font-weight-bold mt-1" href="index.php">
                FLEX CLUB
            </a>


            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                    aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./class.php">Classes</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="./registration.php">Registration</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            About
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="./testimonial.php">Testimonial</a>
                            <a class="dropdown-item" href="./trainers.php">Trainers</a>
                            <a class="dropdown-item" href="./gallery.php">Gallery</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./contact_us.php">Contact us</a>
                    </li>

                    <?php
                    session_start();

                    if (isset($_SESSION['status']) && $_SESSION['status'] == 1 && isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 0) {
                        echo '
                            <li class="nav-item">
                                <a class="nav-link text-warning" href="./contact_us_manage.php" >My Comments</a>
                            </li>
                            
                        ';
                    }
                    if (isset($_SESSION['status']) && $_SESSION['status'] == 1) {
                        echo '
   
                            <li class="nav-item">
                                <a class="nav-link text-info" href="./logout.php">Logout</a>
                            </li>
                            
                        ';
                    } else {
                        echo '
                            
                            <li class="nav-item">
                                <a class="nav-link" href="./login.php" >Login</a>
                            </li>
                        ';
                    }

                    if (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1) { // admin

                        echo '
                        <li class="nav-item ml-3 bg-dark">
                                <a class="nav-link text-light "  href="index_edit.php">ADMIN PANEL</a>
                        </li>
                    ';
                    }

                    ?>
                </ul>
            </div>

        </nav>
    </div>
</div>
<!-- End Header -->
