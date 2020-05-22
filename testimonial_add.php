<?php
include_once ('header.php');
//session_start();
//
//if (isset($_SESSION['status']) && $_SESSION['status'] == 1) {
//
//} else {
//    header('Location: http://localhost/php_course/session/login.php');
//}


if ($_SERVER['REQUEST_METHOD'] == "GET") {
    if (!empty($_GET['rev_name']) && !empty($_GET['rev_body'])) {
        $rev_name = htmlspecialchars($_GET['rev_name']);
        $rev_body = htmlspecialchars($_GET['rev_body']);

        $query = "INSERT INTO testimonial (reviewer_name,review_body) VALUES('$rev_name','$rev_body')";

        $result = mysqli_query($connection, $query);

        if ($result != false) {
            header('Location: http://localhost/hassanProject/testimonial.php');
        } else {
            echo mysqli_error($connection);
        }
    }
}