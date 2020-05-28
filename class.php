<!--student 1: Mina Jamshidian / Student Number: 3013827-->
<!--student 2: Saad  / Student Number: -->

<?php

<!-- this is the head -->
include_once('header.php');
?>
<!-- Below div class will define the conatiner -->
    <div class="container">
        <!-- this class will define the parameters of tehe row -->
        <div class="row bg-light pb-5 pt-5 mb-3">
            <!-- below class will define teh column and text should be in center so we wrote text-center -->
            <div class="col text-center">
                <!-- this heading will define the class which represent teh Classes and the text should be in dark  -->
                <h2 class="text-dark">Classes</h2>
                <!-- In this belwo class it  is defined as the secondary text which would show information for the classes which offered in Flex club -->
                <p class="text-secondary">You can find FLEX CLUB classes here.</p>
            </div>
        </div>
        <!-- Now from here we come to teh class which explains teh card deck -->
        <div class="card-deck">

            <?php
            <!-- below its a command or quercy which will request the information from class for select -->
            $features = mysqli_fetch_all($connection->query("select * from class;"), MYSQLI_ASSOC);

            foreach ($features as $feature) {
                ?>
                <!-- This class will define the coloumn and its location -->
                <div class="col-md-4">
                   <!-- The card is defned under this class  -->
                    <div class="card  mb-3">
                        <!-- Below it will define the image which would y -->
                        <img src=" <?= $feature['image']; ?>" class="card-img-top mh-50 " alt="Flex club Class Photo">
                        <div class="card-body">
                            <h5 class="card-title">
                                <?= $feature['title']; ?>
                            </h5>
                        </div>
                        <div class="card-footer bg-white">
                            <a class="btn btn-link text-dark  mt-1 h3 d-flex justify-content-center "
                               href="class_details.php?id=<?= $feature['id']; ?>" role="button">More Detail</a>
                        </div>
                    </div>
                </div>

            <?php } ?>

        </div>
    </div>


<?php
include_once('footer.php');
