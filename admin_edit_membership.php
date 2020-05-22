<?php
include_once('header.php');
if (isset($_SESSION['role']) && $_SESSION['role'] == 1) {
    ?>
    <div class="container-fluid">
        <div class="row">
            <?php
            include_once('dashboard_sidebar.php');
            ?>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">


                <?php
                $sql = "SELECT COUNT(*) FROM membership";
                $result = mysqli_query($connection, $sql);    // object or null
                if (!is_null($result)) {
                    $row = $result->fetch_assoc();
                    $memberships_count = $row['COUNT(*)'];
                }
                ?>
                <h2>Memberships<span class="float-right"><?php echo "Count : " . $memberships_count; ?></span></h2>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>name</th>
                            <th>description</th>
                            <th>fee</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $query = "SELECT * FROM membership";
                        $result = mysqli_query($connection, $query);    // object or null

                        if (!is_null($result)) {
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $id = $row["id"];
                                    echo '<tr>
                                            <td>' . $row["id"] . '</td>
                                            <td>' . $row["name"] . '</td>
                                            <td>' . $row["summery"] . '</td>
                                            <td>' . $row["fee"] . '</td>
                                            <td><a class="btn btn-primary" href="http://localhost/hassanProject/membership_edit.php?tid=' . $id . '">Edit</a></td>

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
