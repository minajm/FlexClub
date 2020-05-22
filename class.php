<?php
include_once('header.php');
?>


    <div class="container">
        <h2 class="text-center mt-2">Available classes</h2>
        <div class="Features" style="margin-top: 20px;">
            <div class="card-deck">
                <?php
                $sql = "SELECT * FROM class order by id asc ";

                $result = mysqli_query($connection, $sql);
                if ($result != false) {
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            ?>
                            <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row['name'] ?></h5>
                            </div>
                            <div class="card-footer">
                                <a href="class_details.php?id=<?php echo $row['id'] ?>" class="float-left">More details</a>
                            </div>
                            </div><?php
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
