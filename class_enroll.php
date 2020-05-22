<?php
include_once('header.php');

// authorization template............


//if (isset($_SESSION['status']) && $_SESSION['status'] == 1) { // logged IN
//
//}else{
//    echo '
//      <div class="container">
//        <div class="row">
//            <div class="text-danger text-center">You are not logged in, Please <a href="login.php"><b>login</b></a></div>
//        </div>
//    </div>
//    ';
//}


$success_alert = '<div class="container">
    <div class="col-md-12">
        <div class="alert alert-success">SUCCESS</div>
    </div>
</div>';

$fault_alert = '<div class="container">
    <div class="col-md-12">
        <div class="alert alert-success">Failed</div>
    </div>
</div>';

if (isset($_SESSION['status']) && $_SESSION['status'] == 1) { // logged IN
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        if (isset($_GET['id'])) {

            $user_id = $_SESSION['id'];

            $id = $_GET['id'];
            $sql = "UPDATE user SET class_id = $id where id = $user_id ";

            $update_result = mysqli_query($connection, $sql);

            if ($update_result != false) {
                echo $success_alert;
            } else {
                echo $fault_alert;
            }
        }
    }
} else {
    echo '
      <div class="container">
        <div class="row">
            <div class="text-danger text-center">You are not logged in, Please <a href="login.php"><b>login</b></a></div>
        </div>
    </div>  
    ';
}
include_once('footer.php');