<?php
include_once('header.php');
?>

    <div class="container">
        <!-- The Carousel is a slideshow for cycling through elements. -->
        <!-- .carousel	Creates a carousel and .slide Adds a CSS transition and animation effect when sliding from one item to the next. -->
        <!-- Center an element with the .mx-auto class (adds margin-left and margin-right: auto) -->
        <div id="fitness" class="carousel slide mx-auto" data-ride="carousel">
            <!-- .carousel-indicators	Adds indicators for the carousel.
            These are the little dots at the bottom of each slide
            (which indicates how many slides there are in the carousel, and which slide the user are currently viewing) -->
            <ul class="carousel-indicators">
                <li data-target="#fitness" data-slide-to="0" class="active"></li>
                <li data-target="#fitness" data-slide-to="1"></li>
                <li data-target="#fitness" data-slide-to="2"></li>
            </ul>
            <!-- .carousel-inner Adds slides to the carousel -->
            <div class="carousel-inner">
                <!-- .carousel-item	Specifies the content of each slide -->
                <div class="carousel-item active">
                    <img src="./image/anastase-maragos-FP7cfYPPUKM-unsplash.jpg" alt="1">
                    <!-- Add elements inside <div class="carousel-caption"> within each <div class="carousel-item"> to create a caption for each slide -->
                    <div class="carousel-caption">
                        <h1>Flex Club</h1>
                        <a href="tel:+353-061-4486165" class=" m-2 text-decoration-none text-light">
                            <h3 >
                                Tel:0614486165
                            </h3>
                        </a>
                        <h2>Dublin city center</h2>
                        <a class="btn btn-dark btn-lg m-4 h3" href="./registration.php" role="button">Join Now</a>
                    </div>
                </div>
                <!-- the same as above -->
                <div class="carousel-item">
                    <img src="./image/photo-1556817411-31ae72fa3ea0.jpeg" alt="2">
                    <div class="carousel-caption">
                        <h1>Flex Club</h1>
                        <a href="tel:+353-061-4486165" class=" m-2 text-decoration-none text-light">
                            <h3>
                                Tel:0614486165
                            </h3>
                        </a>
                        <h2>Dublin city center</h2>
                        <a class="btn btn-dark btn-lg m-4 h3" href="./registration.php" role="button">Join Know</a>
                    </div>
                </div>
                <!-- the same as above -->
                <div class="carousel-item">
                    <img src="./image/scott-webb-5IsdIqwwNP4-unsplash.jpg" alt="3">
                    <div class="carousel-caption">
                        <h1>Flex Club</h1>
                        <a href="tel:+353-061-4486165" class=" m-2 text-decoration-none text-light">
                            <h3>
                                Tel:0614486165
                            </h3>
                        </a>
                        <h2>Dublin city center</h2>
                        <a class="btn btn-dark btn-lg m-4 h3" href="./registration.php" role="button">Join Know</a>
                    </div>
                </div>
            </div>
            <!-- .carousel-control-prev	Adds a left (previous) button to the carousel, which allows the user to go back between the slides -->
            <a class="carousel-control-prev" href="#fitness" data-slide="prev">
                <!-- .carousel-control-prev-icon	Used together with .carousel-control-prev to create a "previous" button -->
                <span class="carousel-control-prev-icon"></span>
            </a>
            <!-- .carousel-control-next	Adds a right (next) button to the carousel, which allows the user to go forward between the slides -->
            <a class="carousel-control-next" href="#fitness" data-slide="next">
                <!-- .carousel-control-next-icon	Used together with .carousel-control-next to create a "next" button -->
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>

        <p class="h4 mt-4 mb-4 mt-4 text-secondary">
            New Classes
        </p>


        <?php
          $features = mysqli_fetch_all($connection->query("select * from home;"), MYSQLI_ASSOC);

          foreach ($features as $feature) {
        ?>

        <div class="card mb-3" style="max-width: 100%;">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src=" <?= $feature['image']; ?>" class="card-img mh-50 " alt="Student Offer">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title text-secondary"">
                            <?= $feature['title']; ?>
                        </h5>
                        <p class="card-text text-dark">
                            <?= $feature['description']; ?>
                        </p>

                    </div>
                </div>
            </div>
            <div class="card-footer text-center">
                <a class="btn btn-dark " href="./registration.php" role="button">Join Know</a>
            </div>
        </div>

          <?php } ?>

    </div>
<?php
include_once('footer.php');
?>