<?php
include_once('header.php');
?>
    <div class="container">
        <h2 class="text-center mt-2">Customer Reviews</h2>
        <div class="Features" style="margin-top: 20px;">
            <div class="card-deck">
                <?php
                $sql = "SELECT * FROM testimonial where approved_by_admin =1 order by id desc limit 2 ";

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
    </div>
<?php
include_once('footer.php');
