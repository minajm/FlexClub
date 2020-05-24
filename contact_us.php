<?php
include_once('header.php');

function validate_phone($phone)
{
    if (ctype_digit($phone)) {
        return true;
    } else {
        return false;
    }
}

function validate_email($email)
{
    $regex = '/[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})/';
    if (preg_match($regex, $email, $match)) {
        return true;
    } else {
        return false;
    }
}


$mobile_alert = '<div class="col-12"><div class="alert alert-danger">Registration Failed: mobile number is Invalid</div></div>';
$email_alert = '<div class="col-12"><div class="alert alert-danger">Registration Failed: Email is invalid</div></div>';


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (!empty($_POST['name']) && !empty($_POST['subject'])
        && !empty($_POST['email']) && !empty($_POST['phone'])
        && !empty($_POST['text'])) {
        $name = htmlspecialchars($_POST['name']);
        $subject = htmlspecialchars($_POST['subject']);

        if (validate_phone($_POST['phone'])) {
            $mobile = htmlspecialchars($_POST['phone']);
        } else {
            echo $mobile_alert;
            die();
        }

        if (validate_email($_POST['email'])) {
            $email = htmlspecialchars($_POST['email']);
        } else {
            echo $email_alert;
            die();
        }

        $text = htmlspecialchars($_POST['text']);

        $query = "INSERT INTO contact_us(name ,subject,email,phone_number,body) values 
            ('$name','$subject','$email',$mobile,'$text')";

        $result = mysqli_query($connection, $query);

        if ($result != false) {
            header('Location: http://localhost/hassanProject/index2.php');
        } else {
            echo mysqli_error($connection);
        }
    }

}
?>

    <div class="container ">
        <div class="row bg-light pb-5 pt-5 mb-3">
            <div class="col text-center">
                <h2 class="text-dark">Contact Us</h2>
                <p class="text-secondary">In this page you can find customer review <br>
                    This is our pleasure to here your review about our classes, our trainers and this club
                    <br>If you are a member of this club you can add your opinion.</p>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <div class="card w-50 m-5">
                <h5 class="card-header info-color text-secondary text-center py-4">
                    <strong>Contact us</strong>
                </h5>

                <!--Card content-->
                <div class="card-body px-lg-5 pt-0">

                    <!-- Form -->
                    <form class="text-center" method="post"  action="#!">

                        <!-- Name -->
                        <div class="md-form mt-3">
                            <input type="text" id="materialContactFormName" placeholder="Name" class="form-control" required>
                        </div>

                        <!-- E-mail -->
                        <div class="md-form mt-3">
                            <input type="email" id="materialContactFormEmail" placeholder="Email" class="form-control" required>
                        </div>

                        <!-- Phone -->
                        <div class="md-form mt-3">
                            <input type="phone" id="materialContactFormPhone" placeholder="Phone" class="form-control" required>
                        </div>


                        <!--Message-->
                        <div class="md-form mt-3">
                            <textarea id="materialContactFormMessage" placeholder="Message"  class="form-control md-textarea" rows="3"></textarea>
                        </div>


                        <!-- Send button -->
                        <button class="btn btn-dark btn-rounded btn-block z-depth-0 my-4 waves-effect" type="submit">Submit</button>

                    </form>
                    <!-- Form -->

                </div>
            </div>
        </div>

<!--        <div class="Features">-->
<!--            <h3 class="text-center" style="margin-top: 20px;">Contact us</h3><br>-->
<!--            <div class="row">-->
<!--                <div class="col-md-8">-->
<!--                    <form action="" method="post">-->
<!--                        <input class="form-control" name="name" placeholder="Name..." required/>-->
<!--                        <br/>-->
<!--                        <input class="form-control" name="subject" placeholder="Subject..." required/>-->
<!--                        <br/>-->
<!--                        <input class="form-control" name="email" placeholder="E-mail..." required/>-->
<!--                        <br/>-->
<!--                        <input class="form-control" name="phone" placeholder="Phone..." required/>-->
<!--                        <br/>-->
<!--                        <input class="form-control" name="text" placeholder="How can we help you?" required>-->
<!--                        <br>-->
<!--                        <input class="btn btn-primary btn-block" type="submit" value="Send"/>-->
<!--                    </form>-->
<!--                </div>-->
<!---->

    </div>


<?php
include_once('footer.php');