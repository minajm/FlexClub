<!--student 1: Mina Jamshidian / Student Number: 3013827-->
<!--student 2: Saad Bin Farhat  / Student Number:3013824 -->
<?php
session_start();

if (!isset($_SESSION['status']) || $_SESSION['status'] != 1) {
    die('You are not a user');
}

if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] != 1) {
    die('You are not admin');
}
?>