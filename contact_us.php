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

    <div class="container">
        <div class="Features">
            <h3 class="text-center" style="margin-top: 20px;">Contact us</h3><br>
            <div class="row">
                <div class="col-md-8">
                    <form action="" method="post">
                        <input class="form-control" name="name" placeholder="Name..." required/>
                        <br/>
                        <input class="form-control" name="subject" placeholder="Subject..." required/>
                        <br/>
                        <input class="form-control" name="email" placeholder="E-mail..." required/>
                        <br/>
                        <input class="form-control" name="phone" placeholder="Phone..." required/>
                        <br/>
                        <input class="form-control" name="text" placeholder="How can we help you?" required>
                        <br>
                        <input class="btn btn-primary btn-block" type="submit" value="Send"/>
                    </form>
                </div>

                <div class="col-md-4">
                    <b>Customer service:</b> <br/>
                    Phone: +1 129 209 291<br/>
                    E-mail: <a href="mailto:support@mysite.com">support@mysite.com</a><br/>
                    <br/><br/>
                    <b>Headquarter:</b><br/>
                    Company Inc, <br/>
                    Las vegas street 201<br/>
                    55001 Nevada, USA<br/>
                    Phone: +1 145 000 101<br/>
                    <a href="mailto:usa@mysite.com">usa@mysite.com</a><br/>


                    <br/><br/>
                    <b>Hong kong:</b><br/>
                    Company HK Litd, <br/>
                    25/F.168 Queen<br/>
                    Wan Chai District, Hong Kong<br/>
                    Phone: +852 129 209 291<br/>
                    <a href="mailto:hk@mysite.com">hk@mysite.com</a><br/>
                </div>
            </div>
        </div>
    </div>


<?php
include_once('footer.php');