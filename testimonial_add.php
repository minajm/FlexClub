
<?php

if (!isset($_SESSION['id'])) {
    die('please login first');
}

$result = mysqli_query($connection, 'select * from user where id="' . $_SESSION['id'] . '"');
$user = $result->fetch_assoc();
$first_name = $user['first_name'];

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (!empty($_POST['comment'])) {
        $comment = htmlspecialchars($_POST['comment']);
        $class_name = $_POST['user_class_name'];

        $query = "INSERT INTO testimonial(comment, first_name, `date`, class_name) values 
                ('". $comment ."', '". $first_name . "', CURDATE(),'".$class_name."')";

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

function get_classes()
{
    global $connection;

    $classOptions = mysqli_fetch_all($connection->query("select * from class;"), MYSQLI_ASSOC);
    $options = '';
    foreach ($classOptions as $classOption) {
        $options .= '<option value="' . $classOption['title'] . '">' . $classOption['title'] . '</option>';
    }

    return '<select class="form-control" id="user_class_name" name="user_class_name">' . $options . '</select>';
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
                                <?= $first_name ?>
                            </label>
                        </div>

                        <div class="md-form mt-3">
                            <label  name="name"  class="form-control" >
                                <?= date('m/d/Y') ?>
                            </label>
                        </div>
                        <!-- Class Name -->
                        <div class="md-form mt-3">
                            <?= get_classes() ?>
                        </div>

                        <!--Comment-->
                        <div class="md-form mt-3">
                            <textarea name="comment" placeholder="Comment"  class="form-control md-textarea" rows="3"></textarea>
                        </div>

                        <!-- Send button -->
                        <button class="btn btn-dark btn-rounded btn-block z-depth-0 my-4 waves-effect" type="submit">Submit</button>

                    </form>
                    <!-- Form -->

                </div>
            </div>
        </div>



    </div>


