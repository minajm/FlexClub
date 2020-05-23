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
                        <a href="tel:+353-061-4486165" class=" m-2">
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
                    <img src="./image/cathy-pham-3jAN9InapQI-unsplash.jpg" alt="2">
                    <div class="carousel-caption">
                        <h1>Flex Club</h1>
                        <a href="tel:+353-061-4486165" class=" m-2">
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
                        <a href="tel:+353-061-4486165" class=" m-2">
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
        <div class="row">

            <div class="col-md-3">
                <h5 class="text-center">Login Member</h5>
                <!-- Login Form -->
                <form method="post" action="login.php">

                    <div class="form-group">
                        <input type="email" id="user-email" class="form-control" name="user_email"
                               placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input type="password" id="user-password" class="form-control" name="user_password"
                               placeholder="Password">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </div>
                </form>

                <hr>
                <div class="card">
                    <div class="card-body">

                        <div class="btn btn-primary">
                            <i class="fab fa-facebook-f"> </i>
                            <a href="#" class="colorAHrefWhite">Connect with Facebook</a>
                        </div>
                        <hr>
                        <div class="btn btn-primary">
                            <i class="fab fa-twitter"> </i>
                            <a href="#" class="colorAHrefWhite">Connect with Twitter</a>
                        </div>
                    </div>
                </div>

                <hr>
                <div class="mt-2">
                    <a href="" class="btn btn-danger btn-block">Get Free Consultancy</a>
                </div>
                <!--                        <h5 class="card-title" style="text-align: center;">Get Free Consultancy</h5>-->
                <hr>

            </div>
        </div>
    </div>
<?php
include_once('footer.php');
?>