<?php
include_once('header.php');
function printForm()
{
    echo '
<!-- Default form login -->
<div class="container  d-flex justify-content-center">
<!-- Material form login -->
<div class="card w-50 m-5">

  <h5 class="card-header text-secondary  bg-light info-color white-text text-center py-4">
    <strong>Sign in</strong>
  </h5>

  <!--Card content-->
  <div class="card-body px-lg-5 pt-0">

    <!-- Form -->
    <form class="text-center mt-4" method="POST">

      <!-- Email -->
      <div class="md-form">
        <input type="email" id="user_email" name="user_email" class="form-control" placeholder="Email">
      </div>

      <!-- Password -->
      <div class="md-form">
        <input type="password" id="user_password" name="user_password" class="form-control mt-4" placeholder="Password">
      </div>


      <!-- Sign in button -->
      <button class="btn btn-dark btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit">Sign in</button>

      <!-- Register -->
      <p>Not a member?
        <a href="./registration.php">Register</a>
      </p>

    </form>
    <!-- Form -->

  </div>

</div>
<!-- Material form login -->


</div>

<!-- Default form login -->        
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
                $_SESSION["is_admin"] = $row["is_admin"];
                $_SESSION["status"] = 1;

                // set  a cookie for a month
                setcookie("user_email", $_POST['user_email'], time() + (86400 * 30), '/');
                header('Location: ' . BASE_URL);
                echo "<script>window.location.replace(\"" . BASE_URL ."\");</script>";

                die();
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

include_once('footer.php');
