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
                        <a href="tel:+353-061-4486165" class="carousel-tel m-2">
                            <h3>
                                Tel:0614486165
                            </h3>
                        </a>
                        <h2>Dublin city center</h2>
                        <a class="btn btn-dark m-4 h3" href="./registration.php" role="button">Join Know</a>
                    </div>
                </div>
                <!-- the same as above -->
                <div class="carousel-item">
                    <img src="./image/cathy-pham-3jAN9InapQI-unsplash.jpg" alt="2">
                    <div class="carousel-caption">
                        <h1>Flex Club</h1>
                        <a href="tel:+353-061-4486165" class="carousel-tel m-2">
                            <h3>
                                Tel:0614486165
                            </h3>
                        </a>
                        <h2>Dublin city center</h2>
                        <a class="btn btn-light m-4 h3" href="./registration.php" role="button">Join Know</a>
                    </div>
                </div>
                <!-- the same as above -->
                <div class="carousel-item">
                    <img src="./image/geert-pieters-0Z-r591z3DI-unsplash.jpg" alt="3">
                    <div class="carousel-caption">
                        <h1>Flex Club</h1>
                        <a href="tel:+353-061-4486165" class="carousel-tel m-2">
                            <h3>
                                Tel:0614486165
                            </h3>
                        </a>
                        <h2>Dublin city center</h2>
                        <a class="btn btn-light m-4 h3" href="./registration.php" role="button">Join Know</a>
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
        <p class="h3 mt-4 mb-4">
            New Classes
        </p>
        <div class="card-deck">
            <div class="card">
                <img class="card-img-top" src="..." alt="Card image cap">
                <div class="card-footer">
                    <h5 class="card-title">Card title</h5>
                </div>

            </div>
            <div class="card">
                <img class="card-img-top" src="..." alt="Card image cap">
                <div class="card-footer">
                    <h5 class="card-title">Card title</h5>
                </div>

            </div>
            <div class="card">
                <img class="card-img-top" src="..." alt="Card image cap">
                <div class="card-footer">
                    <h5 class="card-title">Card title</h5>
                </div>
            </div>
        </div>
        <a class="btn btn-dark m-5 h3 d-flex justify-content-center" href="./class.php" role="button">More Classes</a>

        <p class="h3 mt-4 mb-4">
            Offers
        </p>
        <div class="card mb-3" style="max-width: 1000px;">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="..." class="card-img" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-3" style="max-width: 1000px;">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="..." class="card-img" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
            </div>
        </div>

        <p class="h3 mt-4 mb-4">
            Events
        </p>
        <div class="card mb-3" style="max-width: 1000px;">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="..." class="card-img" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-3" style="max-width: 1000px;">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="..." class="card-img" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
            </div>
        </div>
        <a class="btn btn-dark m-5 h3 d-flex justify-content-center " href="./class.php" role="button">Join Now</a>



    </div>
<?php
include_once('footer.php');
?>