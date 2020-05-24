<?php
include_once('header.php');
?>
    <div class="container">
            <div class="row bg-light pb-5 pt-5 mb-5">
                <div class="col text-center">
                    <h2 class="text-dark">Testimonial</h2>
                    <p class="text-secondary">In this page you can find customer review <br>
                        This is our pleasure to here your review about our classes, our trainers and this club
                    <br>If you are a member of this club you can add your opinion.</p>
                </div>
            </div>
            <?php
                $sql = "SELECT * FROM testimonial where approved_by_admin =1 order by id desc limit 2 ";

                $result = mysqli_query($connection, $sql);
                if ($result != false) {
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            ?>
                            <div class="Testimonial bg-light">
                                <img src="./image/user.png" alt="Avatar" style="width:90px">
                                <p class="card-text text-dark"><?php echo $row['reviewer_name'] ?></p>
                                <p class="card-text"><small class="text-muted"><?php echo $row['review_body'] ?></small></p>
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
        <div class="card">
            <div class="card-body">
                <form method="get" action="testimonial_add.php">
                    <div class="form-group">
                        <label>
                            <input type="text" name="rev_name" class="form-control" placeholder="Name">
                        </label>
                    </div>
                    <div class="form-group">
                        <label>
                                    <textarea name="rev_body" class="form-control"
                                              placeholder="write a review here:"></textarea>
                        </label>
                    </div>
                    <button type="submit" class="btn btn-dark btn-block">submit</button>
                </form>
            </div>
        </div>
        </div>
    </div>
<?php
include_once('footer.php');
