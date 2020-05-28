<?php
include_once('header.php');


if (isset($_SESSION['role']) && $_SESSION['role'] == 1) { // authorized
    $success_alert = '<div class="col-12">
        <div class="alert alert-success">SUCCESS</div>
        <a href="http://localhost/hassanProject/admin_edit_testimonial.php" class="float-left">Go back</a>
        </div>';

    $fault_alert = '<div class="col-12">
        <div class="alert alert-danger">FAILED</div>
        <a href="http://localhost/hassanProject/admin_edit_testimonial.php" class="float-left">Go back</a>
        </div>';


    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        if (isset($_GET['aid'])) { // approve
            $id = $_GET['aid'];


            $update_query = "UPDATE testimonial SET approved_by_admin = 1 WHERE id = $id";

            $update_result = mysqli_query($connection, $update_query);

            if ($update_result != false) {
                echo $success_alert;
            } else {
                echo $fault_alert;
            }


        } elseif (isset($_GET['did'])) { // delete
            $id = $_GET['did'];

            $delete_query = "DELETE FROM testimonial WHERE id = $id";

            $delete_result = mysqli_query($connection, $delete_query);

            if ($delete_result != false) {
                echo $success_alert;
            } else {
                echo $fault_alert;
            }

        } else {
            header('Location: http://localhost/hassanProject/index.php');

        }
    }

} else { // not authorized
    header('Location: http://localhost/HassanProject/login.php');
}


include_once('footer.php');
