<!--student 1: Mina Jamshidian / Student Number: 3013827-->
<!--student 2: Saad Bin Farhat  / Student Number:3013824 -->

<?php
include_once('header.php');

session_start();

$success_alert = '<div class="col-12">
	<div class="alert alert-success">SUCCESS</div>
</div>';

$fault_alert = '<div class="col-12">
	<div class="alert alert-danger">FAILED</div>
</div>';

if (isset($_SESSION['status']) && $_SESSION['status'] == 1) {
    ?>
    <div class="container-fluid mb-5 pb-5">
        <div class="row">
            <?php
            if (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1) {
                include_once('admin_panel_sidebar.php');
                echo '<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">';

            } else {
                echo '<main class="container w-100 mt-3" >';
            }
            ?>
            <?php
            $sql = "SELECT COUNT(*) FROM contact_us";
            $result = mysqli_query($connection, $sql);    // object or null
            if (!is_null($result)) {
                $row = $result->fetch_assoc();
                $comment_count = $row['COUNT(*)'];
            }
            ?>
            <?php
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                if (isset($_POST['contact_id'])) {
                    $delete_query = "DELETE FROM contact_us WHERE id = " . $_POST['contact_id'];
                    $delete_result = mysqli_query($connection, $delete_query);

                    if ($delete_result != false) {
                        echo $success_alert;
                    } else {
                        echo $fault_alert;
                    }
                }
            }
            ?>
            <?php
            if (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1) {
                echo '
                    <h2 class="mt-3 mb-3 text-dark">Users<span class="float-right">Count :  ' . $comment_count . '</span></h2>
                    ';
            }
            ?>

            <div class="table-responsive">
                <table class="table ">
                    <thead class="thead-dark">
                    <th>Name</th>
                    <th>Phone Number</th>
                    <th>message</th>
                    <th>contact</th>
                    <th>delete</th>
                    </thead>
                    <tbody>
                    <?php
                    $query = "SELECT * FROM contact_us";

                    if (!$_SESSION['is_admin']) {
                        $query .= " where user_id='" . $_SESSION['id'] . "'";
                    }

                    $result = mysqli_query($connection, $query);    // object or null

                    if (!is_null($result)) {
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $id = $row["id"];
                                echo '
                                        <tr>
                                            <td>' . $row["name"] . '</td>
                                            <td>' . $row["phone_number"] . '</td>
                                            <td>' . $row["message"] . '</td>
                                            <td><h6><a href="mailto:' . $row['email'] . ' ">' . $row['email'] . '</a></h6</td>
                                            <td>
					                            <form action="" method="POST">
                                                    <input type="hidden" value="' . $id . '" name="contact_id">
                                                    <button type="submit" class="btn btn-link text-info">Delete</button>
                                                </form>
                                            </td>
                                        </tr>';
                            }
                        }
                    }
                    ?>
                    </tbody>
                </table>
            </div>
            </main>
        </div>
    </div>
    <?php
} else {
    echo '<h3 class="text-danger text-center">You do not Login yet</h3>';
}


include_once('footer.php');
