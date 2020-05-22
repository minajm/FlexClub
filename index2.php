<?php
include_once('header.php');
?>

    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    <div class="image">
                        <img src="image/image1.jpg" class="img-fluid" alt="Responsive image">
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="jumbotron jumbotron-fluid">
                            <div class="container">
                                <h1 class="display-4">Feature 1</h1>
                                <p class="lead">This is a modified jumbotron that occupies the entire horizontal space
                                    of
                                    its parent.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="jumbotron jumbotron-fluid">
                            <div class="container">
                                <h1 class="display-4">Feature 2</h1>
                                <p class="lead">This is a modified jumbotron that occupies the entire horizontal space
                                    of
                                    its parent.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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