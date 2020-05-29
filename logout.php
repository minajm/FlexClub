<!--student 1: Mina Jamshidian / Student Number: 3013827-->
<!--student 2: Saad Bin Farhat  / Student Number:3013824 -->

<?php

session_start();
session_unset();
session_destroy();

setcookie("user_email", "", time() - 3600);

header('Location: http://localhost:8888/FlexClub');

