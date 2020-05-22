<?php
include_once('header.php');
if (isset($_SESSION['role']) && $_SESSION['role'] == 1) {
    ?>
    <div class="container-fluid">
        <div class="row">
            <?php
            include_once ('dashboard_sidebar.php');
            ?>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">


                <?php
                $sql = "SELECT COUNT(*) FROM contact_us";
                $result = mysqli_query($connection, $sql);    // object or null
                if (!is_null($result)) {
                    $row = $result->fetch_assoc();
                    $contact_us_count = $row['COUNT(*)'];
                }
                ?>
                <h2>Contacts<span class="float-right"><?php echo "Count : " . $contact_us_count; ?></span></h2>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>name</th>
                            <th>subject</th>
                            <th>email</th>
                            <th>phone #</th>
                            <th></th>
                        </tr>
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
                                            <td>' . $row["id"] . '</td>
                                            <td>' . $row["name"] . '</td>
                                            <td>' . $row["subject"] . '</td>
                                            <td>' . $row["email"] . '</td>
                                            <td>' . $row["phone_number"] . '</td>
                                            <td><a class="btn btn-info" href="http://localhost/hassanProject/contact_view.php?cid=' . $id . '">View</a></td>
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
    header('Location: http://localhost/HassanProject/login.php');
}
include_once('footer.php');
