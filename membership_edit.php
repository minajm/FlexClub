<?php
include_once('header.php');


$success_alert = '<div class="col-12">
	<div class="alert alert-success">SUCCESS</div>
	<a href="admin_edit_membership.php" class="btn btn-primary">Go Back</a>
</div>';

$fault_alert = '<div class="col-12">
	<div class="alert alert-danger">FAILED</div>
	<a href="admin_edit_membership.php" class="btn btn-primary">Go Back</a>
</div>';


if (isset($_SESSION['status']) && $_SESSION['status'] == 1) { // logged IN
    if (isset($_SESSION['role']) && $_SESSION['role'] == 1) { // admin

        if ($_SERVER['REQUEST_METHOD'] == "GET") {  // GET request
            if (isset($_GET['tid'])) {
                $tId = $_GET['tid'];

                ?>
                <div class="container-fluid">
                    <div class="row">
                        <?php
                        include_once('dashboard_sidebar.php');
                        ?>

                        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
                            <h3 class="text-center">Edit membership</h3>
                            <br>
                            <?php
                            $query = "SELECT * FROM membership where id =$tId";
                            $result = mysqli_query($connection, $query);    // object or null

                            if (!is_null($result)) {
                                if ($result->num_rows > 0) {
                                    $row = $result->fetch_assoc();
                                    ?>
                                    <form action="" method="post">
                                        <input type="hidden" name="t_id" value="<?php echo $row["id"]; ?> ">
                                        <input class="form-control" name="t_name" value="<?php echo $row["name"]; ?>"
                                               required/>
                                        <br/>
                                        <input class="form-control" name="t_summery"
                                               value="<?php echo $row["summery"]; ?>" required/>
                                        <br/>
                                        <input class="form-control" name="t_fee" value="<?php echo $row["fee"]; ?> "
                                               required/>
                                        <br/>
                                        <input class="btn btn-info btn-block" type="submit" value="Update"/>
                                    </form>
                                    <?php
                                }
                            }
                            ?>
                    </div>
                </div>

                <?php
            }
        } elseif ($_SERVER['REQUEST_METHOD'] == "POST") {  // POST request
            if (isset($_POST['t_name']) && isset($_POST['t_summery']) && isset($_POST['t_fee']) && isset($_POST['t_id'])) {
                $t_id = $_POST['t_id'];
                $t_name = $_POST['t_name'];
                $t_summery = $_POST['t_summery'];
                $t_fee = $_POST['t_fee'];

                $update_query = "UPDATE membership SET name = '$t_name', summery = '$t_summery', fee = $t_fee WHERE id = $t_id";
                $update_result = mysqli_query($connection, $update_query);

                if ($update_result != false) {
                    echo $success_alert;
                } else {
                    trigger_error('Invalid query: ' . $connection->error);
                    //echo $fault_alert;
                }

            } else {
                echo 'not set';
            }
        }
    } else {
        echo '
      <div class="container">
        <div class="row">
            <div class="text-danger text-center">You are not authorized to see this page<a href="index2.php"><b>HOME</b></a></div>
        </div>
    </div>
    ';
    }
} else {
    echo '
      <div class="container">
        <div class="row">
            <div class="text-danger text-center">You are not logged in, Please go <a href="index2.php"><b>HOME</b></a></div>
        </div>
    </div>
    ';
}
include_once('footer.php');