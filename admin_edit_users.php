<!--student 1: Mina Jamshidian / Student Number: 3013827-->
<!--student 2: Saad Bin Farhat  / Student Number:3013824 -->
<?php
include_once('header.php');
include "admin_panel_check.php";
?>


<div class="container-fluid">
    <div class="row">
        <?php
        include_once('admin_panel_sidebar.php');
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
            <h2 class="mt-3 mb-3 text-dark">Users<span
                        class="float-right"><?php echo "Count : " . $users_count; ?></span></h2>
            <div class="table-responsive">
                <table class="table table-sm mt-5">
                    <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Email</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $query = "SELECT * FROM user";
                    $result = mysqli_query($connection, $query);    // object or null

                    if (!is_null($result)) {
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {

                                echo '<tr>
                                            <td>' . $row["id"] . '</td>
                                            <td>' . $row["first_name"] . ' ' . $row["last_name"] . '</td>
                                            <td>' . $row["gender"] . '</td>
                                            <td>' . $row["email"] . '</td>
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



