<?php
include_once('header.php');
?>


    <div class="container-fluid">
        <div class="row">
            <?php
            include_once ('dashboard_sidebar.php');
            ?>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
                <?php
                $sql = "SELECT COUNT(*) FROM user";
                $result = mysqli_query($connection, $sql);    // object or null
                if (!is_null($result)) {
                    $row = $result->fetch_assoc();
                    $users_count = $row['COUNT(*)'];
                }
                ?>
                <h2>Users<span class="float-right"><?php echo "Count : " . $users_count; ?></span></h2>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Email</th>
                            <th>membership</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $query = "SELECT * FROM user";
                        $result = mysqli_query($connection, $query);    // object or null

                        if (!is_null($result)) {
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $membership = "";
                                    switch ($row['membership_id']) {
                                        case 1:
                                            $membership = "Golden";
                                            break;
                                        case 2:
                                            $membership = "Silver";
                                            break;
                                        case 3:
                                            $membership = "Bronze";
                                            break;
                                    }
                                    echo '<tr>
                                            <td>' . $row["id"] . '</td>
                                            <td>' . $row["first_name"] . ' ' . $row["last_name"] . '</td>
                                            <td>' . $row["gender"] . '</td>
                                            <td>' . $row["email"] . '</td>
                                            <td>' . $membership . '</td>
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
include_once('footer.php');
