<!--student 1: Mina Jamshidian / Student Number: 3013827-->
<!--student 2: Saad Bin Farhat  / Student Number:3013824 -->

<?php
include_once('header.php');
include "admin_panel_check.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $state = $_POST['state'];
    $testimonial_id = $_POST['id'];

    $sql = "update testimonial set is_approved=" . $state . " where id='" . $testimonial_id . "'";
    $result = mysqli_query($connection, $sql);    // object or null

    if ($result != false) {
        echo "<script>window.location.replace(window.location);</script>";
        die();
    }
}
?>

<div class="container-fluid">
    <div class="row">
        <?php
        include_once('admin_panel_sidebar.php');
        ?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">

            <?php
            $sql = "SELECT COUNT(*) FROM testimonial";
            $result = mysqli_query($connection, $sql);    // object or null
            if (!is_null($result)) {
                $row = $result->fetch_assoc();
                $testimonials_count = $row['COUNT(*)'];
            }
            ?>
            <h2>Testimonials<span class="float-right"><?php echo "Count : " . $testimonials_count; ?></span></h2>
            <div class="table-responsive">
                <table class="table table-sm">
                    <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Member name</th>
                        <th>Text review</th>
                        <th>Approved</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $query = "SELECT * FROM testimonial";
                    $result = mysqli_query($connection, $query);    // object or null

                    if (!is_null($result)) {
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $approved = "";
                                if ($row["is_approved"] == 1) {
                                    $approved = "Yes";
                                } else {
                                    $approved = "NO";
                                }

                                $txt = '<tr>
                                            <td>' . $row["id"] . '</td>
                                            <td>' . $row["first_name"] . '</td>
                                            <td>' . $row["comment"] . '</td>
                                            <td>' . $approved . '</td>';

                                $txt .= '<td><form method="post">';
                                $txt .= '<input type="hidden" name="id" value="' . $row["id"] . '" />';

                                if ($row['is_approved'] == 1) {
                                    $txt .= '<input type="hidden" name="state" value="0" />';
                                    $txt .= '<button type="submit">Disapprove</button></td>';
                                } else if ($row['is_approved'] == 0) {
                                    $txt .= '<input type="hidden" name="state" value="1" />';
                                    $txt .= '<button type="submit">Approve</button></td>';
                                }

                                $txt .= '</form></td>';

                                echo $txt;
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
