<?php
include_once('header.php');
?>

    <div class="container">
        <div class="row bg-light pb-5 pt-5 mb-3">
            <div class="col text-center">
                <h2 class="text-dark">Classes</h2>
                <p class="text-secondary">In this page you can find customer review <br>
                    This is our pleasure to here your review about our classes, our trainers and this club
                    <br>If you are a member of this club you can add your opinion.</p>
            </div>
        </div>
        <div class="card-deck">
                <?php
                $sql = "SELECT * FROM class order by id asc ";

                $result = mysqli_query($connection, $sql);
                if ($result != false) {
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            ?>
<!--                            <div class="card">-->
<!--                            <div class="card-body">-->
<!--                                <h5 class="card-title">--><?php //echo $row['name'] ?><!--</h5>-->
<!--                            </div>-->
<!--                            <div class="card-footer">-->
<!--                                <a href="class_details.php?id=--><?php //echo $row['id'] ?><!--" class="float-left">More details</a>-->
<!--                            </div>-->
<!--                            </div>-->
                            <div class="card mb-3" >
                                <div class="row no-gutters">
                                    <div class="col-md-4">
                                        <img src="./image/event1.jpg" class="card-img" alt="Street dance event">
                                        <a class="btn btn-dark mt-1 h3 d-flex justify-content-center " href="class_details.php?id=<?php echo $row['id'] ?>" role="button">More Detail</a>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title text-secondary""><?php //echo $row['name'] ?></h5>
                                            <p class="card-text text-dark"></p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <?php
                        }
                    } else {
                        // no testimonials
                        echo '<div class="container">
                            <h2>No classes yet</h2>
                        </div>';
                    }
                } else {
                    echo '<div class="container">
                            <h2>No classes yet</h2>
                        </div>';

                }
                ?>
            </div>
        </div>
    </div>


<?php
include_once('footer.php');
