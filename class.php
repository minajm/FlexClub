<?php

include_once('header.php');
?>
<!-- Below div class will define the conatiner -->
<div class="container mt-4">
    <!-- this class will define the parameters of tehe row -->
    <div class="row bg-dark pb-5 pt-5 mb-5">
        <!-- below class will define teh column and text should be in center so we wrote text-center -->
        <div class="col text-center">
            <!-- this heading will define the class which represent teh Classes and the text should be in dark  -->
            <h2 class="text-light">Classes</h2>
            <!-- In this belwo class it  is defined as the secondary text which would show information for the classes which offered in Flex club -->
            <p class="text-white-50">You can find FLEX CLUB classes here.</p>
        </div>
    </div>
    <!-- Now from here we come to teh class which explains the card deck -->
    <div class="card-deck">

        <?php

        $features = mysqli_fetch_all($connection->query("select * from class;"), MYSQLI_ASSOC);

        foreach ($features as $feature) {
            ?>

            <!-- This class will define the coloumn and its location -->
            <div class="col-md-4">
                <!-- The card is defned under this class  -->
                <div class="card border-4 mb-3">
                    <!-- Below it will define the image which would explain the class placed the image which represent the flex club class foto -->
                    <img src=" <?= $feature['image']; ?>" class="card-img-top mh-50 " alt="Flex club Class Photo">
                    <!-- Below the class defines the class body-->
                    <div class="card-body text-center ">
                        <!-- Below this class will define the card title  -->
                        <h5 class="card-title">
                            <?= $feature['title']; ?>
                        </h5>
                    </div>
                    <!--  Class footer which appear in white is defined in this class-->
                    <div class="card-footer bg-dark">
                        <!--this part check if it is user so it can go to class detail but other wise it brought to log in page-->
                        <?php
                        if (isset($_SESSION['status']) && $_SESSION['status'] == 1) {
                            echo '

                            <li class="btn btn-link text-light  mt-1 h3 d-flex justify-content-center">
                                <a class="nav-link text-light" href="class_details.php?id=' . $feature['id'] . '" >More Detail</a>
                            </li>
                            ';

                        } else {
                            echo '
                            <li class="btn btn-link text-light  mt-1 h3 d-flex justify-content-center">

                            <a class="btn btn-link text-light  mt-1 h3 d-flex justify-content-center "

                               href="./login.php" role="button">More Detail</a>
                               </li>
                            ';
                        }
                        ?>


                    </div>
                </div>
            </div>

        <?php } ?>

    </div>
</div>


<?php
include_once('footer.php');
?>
