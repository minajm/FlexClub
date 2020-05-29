<?php
include_once('header.php');
?>
    <div class="container">
        <div class="row bg-dark pb-5 pt-5 mb-5">
                <div class="col text-center">
                    <h2 class="text-light">Testimonial</h2>
                    <p class="text-white-50">In this page you can find the Members review <br>
                        This is our pleasure to here your review about our classes, our trainers and this club
                    <br>If you are a member of this club you can add your opinion.</p>
                </div>
            </div>
            <?php
                $sql = "SELECT * FROM testimonial where is_approved=1 order by id desc limit 6 ";

                $result = mysqli_query($connection, $sql);
                if ($result != false) {
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            ?>
                            <div class="Testimonial bg-light">
                                <p class="card-text h5 text-dark">First Name: <?= $row['first_name'] ?></p>
                                <p class="card-text  text-dark">Date:  <?= date("Y/m/d", strtotime($row['date'])) ?></p>
                                <p class="card-text  text-dark">Class name: <?= $row['class_name'] ?></p>
                                <p class="card-text">
                                    <b class="text-muted">Comment:</b><br>
                                    <?= htmlspecialchars($row['comment']) ?>
                                </p>
                            </div>
                            <?php
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
<?php

//if (isset($_SESSION['status']) && $_SESSION['status'] == 1 ) {

    include_once('testimonial_add.php');

//}

?>
    </div>


<?php
include_once('footer.php');
