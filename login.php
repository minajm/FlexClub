<?php
include_once('header.php');
function printForm()
{
    echo '
        <div class="container mt-4" >
        <div class="col-md-6 offset-md-3" style="border: #3b424d solid 1px">
            <h1 class="text-center" style="color: chocolate;">Member Login</h1>
            <form method="POST" action="">
                <div class="form-group">
                    <label for="user-email">Email</label>
                    <input type="text" name="user_email" class="form-control" id="user-email" placeholder="Email">
                </div>

                <div class="form-group">
                    <label for="user-password">Password</label>
                    <input type="password" name="user_password" class="form-control" id="user-password"
                           placeholder="User password">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Login</button>
            </form>
            <br>
            <h4 class="text-center">Not a member? <a href="http://localhost/hassanProject/registration.php">Register here</a></h4>
        </div>
    </div>
    ';
}

$fault_alert = '<div class="col-12"><div class="alert alert-danger">Login Failed: UNKNOWN</div></div>';
$empty_alert = '<div class="col-12"><div class="alert alert-danger">Login Failed: Enter email and password</div></div>';
$noMatch_alert = '<div class="col-12"><div class="alert alert-danger">Login Failed: No credentials found!</div></div>';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (!empty($_POST['user_email']) && !empty($_POST['user_password'])) {
        $user_email = htmlspecialchars($_POST['user_email']);
        $password = htmlspecialchars($_POST['user_password']);


        $sql = "SELECT * FROM user WHERE email = '" . $user_email . "' AND password = '" . md5($password) . "'";

        $result = mysqli_query($connection, $sql);
        if ($result != false) {
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();

                session_start();
                $_SESSION["id"] = $row["id"];
                $_SESSION["user_email"] = $user_email;
                $_SESSION["role"] = $row["role"]; // 1 for Admin, 2 for user(member)
                $_SESSION["status"] = 1;

                // set  a cookie for a month
                setcookie("user_email", $_POST['user_email'], time() + (86400 * 30), '/');
                header('Location: http://localhost/hassanProject/index2.php');

            } else {
                echo $noMatch_alert;
                printForm();
            }
        } else {
            echo $noMatch_alert;
            printForm();
        }
    } else {
        echo $empty_alert;
        printForm();
    }
} else {
    printForm();
}
//else if ($_SERVER['REQUEST_METHOD'] == "GET") {
//    if (isset($_SESSION['status']) && $_SESSION['status'] != 1) {
//        printForm();
//    } else { // already logged in
//        header('Location: http://localhost/hassanProject/index.php');
//    }
//}
include_once('footer.php');
