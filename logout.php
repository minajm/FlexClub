<?php
include_once("config.php");

session_start();
session_unset();
session_destroy();

setcookie("user_email", "", time() - 3600);

header('Location: ' . BASE_URL);

