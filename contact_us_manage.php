<?php
include_once('header.php');

$success_alert = '<div class="col-12">
	<div class="alert alert-success">SUCCESS</div>
</div>';

$fault_alert = '<div class="col-12">
	<div class="alert alert-danger">FAILED</div>
</div>';

if (isset($_SESSION['status']) && $_SESSION['status'] == 1
    && isset($_SESSION['role']) && $_SESSION['role'] == 1) {
    ?>
    <div class="container">
        <div class="row">

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

            <div class="col-12">
                <table class="table table-bordered">
                    <thead>
                    <th>Name</th>
                    <th>subject</th>
                    <th>phone number</th>
                    <th>message</th>
                    <th>contact</th>
                    <th>delete</th>
                    </thead>
                    <tbody>

                    <?php
                    $query = "SELECT * FROM contact_us";
                    $result = mysqli_query($connection, $query);    // object or null

                    if (!is_null($result)) {
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $id = $row["id"];
                                echo '<tr>
				<td>' . $row["name"] . '</td>
				<td>' . $row["subject"] . '</td>
				<td>' . $row["phone_number"] . '</td>
				<td>' . $row["body"] . '</td>
				<td><h6><a href="mailto:' . $row['email'] . ' ">email</a></h6</td>
				<td>
					<form action="" method="POST">
						<input type="hidden" value="' . $id . '" name="contact_id">
						<button type="submit" class="btn btn-danger">Delete</button>
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
        </div>
    </div>
    <?php
} else {
    //header('Location: http://localhost/hassanProject/login.php');
    echo '<h3 class="text-danger text-center">either you dont have a permission to view this page, OR you are not logged in</h3>';
}