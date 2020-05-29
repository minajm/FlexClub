
<?php


$Date = date('m/d/Y');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
if (!empty($_POST['comment'])) {

    $comment = htmlspecialchars($_POST['comment']);
    $user_id = null;
    $date = "";
    $class_name="";

    if (isset($_SESSION['id'])) {
        $user_id = $_SESSION['id'];
    }

    $query = "INSERT INTO testimonial(comment, user_id,date, class_name) values 
            ('". $comment ."', '". $user_id . "','".$date."','".$class_name."')";

    $result = mysqli_query($connection, $query);

    if ($result != false) {
        header('Location: /FlexClub');
        echo "<script>window.location.replace(\"/FlexClub\");</script>";

        die();
    } else {
        echo mysqli_error($connection);
    }
}
}

?>

    <div class="container ">
        <div class="d-flex justify-content-center">
            <div class="card w-50 m-5">
                <h5 class="card-header info-color text-secondary text-center py-4">
                    <strong>Add Testimonial</strong>
                </h5>

                <!--Card content-->
                <div class="card-body px-lg-5 pt-0">

                    <!-- Form -->
                    <form class="text-center" method="post"  action="#!">

                        <!-- Name -->
                        <div class="md-form mt-3">
                            <label  name="name"  class="form-control" >
                                '. first_name .'
                            </label>
                        </div>
                        $date=.date()
                        <div class="md-form mt-3">
                            <label  name="name"  class="form-control" >
                                '. $date .'
                            </label>
                        </div>
                        <!-- Class Name -->
                        <div class="md-form mt-3">
                            <input type="text" name="class_name" placeholder="Class Name" class="form-control" required>
                        </div>


                        <!--Comment-->
                        <div class="md-form mt-3">
                            <textarea name="comment"" placeholder="Comment"  class="form-control md-textarea" rows="3"></textarea>
                        </div>


                        <!-- Send button -->
                        <button class="btn btn-dark btn-rounded btn-block z-depth-0 my-4 waves-effect" type="submit">Submit</button>

                    </form>
                    <!-- Form -->

                </div>
            </div>
        </div>



    </div>


