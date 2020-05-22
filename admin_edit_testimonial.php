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
                $sql = "SELECT COUNT(*) FROM testimonial";
                $result = mysqli_query($connection, $sql);    // object or null
                if (!is_null($result)) {
                    $row = $result->fetch_assoc();
                    $testimonials_count = $row['COUNT(*)'];
                }
                ?>
                <h2>Testimonials<span class="float-right"><?php echo "Count : " . $testimonials_count; ?></span></h2>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>reviewer name</th>
                            <th>review body</th>
                            <th>Shown?</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $query = "SELECT * FROM testimonial";
                        $result = mysqli_query($connection, $query);    // object or null

                        if (!is_null($result)) {
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $shown="";
                                    if ($row["approved_by_admin"] ==1){
                                        $shown ="Yes";
                                    }else{
                                        $shown ="NO";
                                    }
                                    echo '<tr>
                                            <td>' . $row["id"] . '</td>
                                            <td>' . $row["reviewer_name"] .'</td>
                                            <td>' . $row["review_body"] . '</td>
                                            <td>' . $shown . '</td>
                                        </tr>';
                                }
                            }
                        }
                        ?>
                        </tbody>
                    </table>
                </div>







<hr>


                <h2 class="text-center mt-2">Customer Reviews</h2>
                <div class="Features" style="margin-top: 20px;">
                    <div class="card-deck">
                        <?php
                        $sql = "SELECT * FROM testimonial where approved_by_admin =0 order by id desc";

                        $result = mysqli_query($connection, $sql);
                        if ($result != false) {
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    ?>
                                    <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $row['reviewer_name'] ?></h5>
                                        <p class="card-text"><?php echo $row['review_body'] ?></p>
                                    </div>
                                    <div class="card-footer">
                                        <a href="http://localhost/hassanProject/testimonial_add_or_delete.php?aid=<?php echo $row['id'] ?>"
                                           class="float-left">Approve</a>
                                        <a href="http://localhost/hassanProject/testimonial_add_or_delete.php?did=<?php echo $row['id'] ?>"
                                           class="text-danger float-right">Delete</a>
                                    </div>
                                    </div><?php
                                }
                            } else {
                                // no testimonials
                                echo '<div class="container">
                            <h2>No reviews yet</h2>
                        </div>';
                            }
                        } else {
                            echo '<div class="container">
                            <h2>No reviews yet</h2>
                        </div>';

                        }
                        ?>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <?php
}

else {
    header('Location: http://localhost/HassanProject/login.php');
}
include_once('footer.php');
