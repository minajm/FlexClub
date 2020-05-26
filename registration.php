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

function printForm()
{
    echo '

          <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Member Registration</h1>
            </div>
        </div>
        <form method="POST" action="">

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="user-first-name">First Name</label>
                        <input type="text" class="form-control" id="user-first-name" name="user_first_name">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="user-last-name">Last Name</label>
                        <input type="text" class="form-control" id="user-last-name" name="user_last_name">
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="genderGroup">Gender</label>
                    <div id="genderGroup">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="user_gender" id="inlineRadio1"
                                   value="male">
                            <label class="form-check-label" for="inlineRadio1">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" id="inlineRadio2" name="user_gender" type="radio"
                                   value="female">
                            <label class="form-check-label" for="inlineRadio2">Female</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="user-age">Age</label>
                        <input type="number" class="form-control" id="user-age" name="user_age">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="user-height">Height</label>
                        <input type="number" class="form-control" id="user-height" name="user_height">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="user-weight">Weight</label>
                        <input type="number" class="form-control" id="user-weight" name="user_weight">
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="user-email">Email</label>
                        <input type="text" name="user_email" class="form-control" id="user-email" placeholder="Email">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="user-mobile">mobile</label>
                        <input type="number" class="form-control" id="user-mobile" name="user_mobile">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="user-address">address</label>
                        <input type="text" name="user_address" class="form-control" id="user-address"
                               placeholder="Email">
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-12">
                <div class="form-group">
                    <label for="user-password">Password</label>
                    <input type="password" name="user_password" class="form-control" id="user-password"
                           placeholder="password">
                </div>
            </div>
            </div>

            <button type="submit" class="btn btn-primary btn-block">Register</button>
        </form>
    </div>
    </div>

    
    ';
}

$fault_alert = '<div class="col-12"><div class="alert alert-danger">Login Failed: UNKNOWN</div></div>';
$empty_alert = '<div class="col-12"><div class="alert alert-danger">Registration Failed: There is an empty field(\'s)</div></div>';
$mobile_alert = '<div class="col-12"><div class="alert alert-danger">Registration Failed: mobile number is Invalid</div></div>';
$email_alert = '<div class="col-12"><div class="alert alert-danger">Registration Failed: Email is invalid</div></div>';


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (!empty($_POST['user_first_name']) && !empty($_POST['user_last_name']) &&
        !empty($_POST['user_age']) && !empty($_POST['user_height']) &&
        !empty($_POST['user_weight']) && !empty($_POST['user_weight']) &&
        !empty($_POST['user_email']) && !empty($_POST['user_mobile']) &&
        !empty($_POST['user_address']) && !empty($_POST['user_gender']) &&
        !empty($_POST['user_password'])
    ) {
        $user_firstName = $_POST['user_first_name'];
        $user_lastName = $_POST['user_last_name'];
        $user_age = $_POST['user_age'];

        if (validate_phone($_POST['user_mobile'])) {
            $user_mobile = $_POST['user_mobile'];
        } else {
            echo $mobile_alert;
            die();
        }

        if (validate_email($_POST['user_email'])) {
            $user_email = $_POST['user_email'];
        } else {
            echo $email_alert;
            die();
        }

        $user_height = $_POST['user_height'];
        $user_weight = $_POST['user_weight'];
        $user_address = $_POST['user_address'];
        $user_gender = "N/A";
        if ($_POST['user_gender'] == "male") {
            $user_gender = 'm';
        } elseif ($_POST['user_gender'] == "female") {
            $user_gender = 'f';
        }
        $user_password = md5($_POST['user_password']);


        $query = "INSERT INTO user (first_name, last_name, gender,age,height,weight,mobile_number,address,email,password,role,membership_id,class_id) VALUES
                    ('$user_firstName', '$user_lastName', '$user_gender',$user_age,$user_height,
                    $user_weight,$user_mobile,'$user_address','$user_email','$user_password',2,3,NULL)";

        $result = mysqli_query($connection, $query);

        if ($result != false) {
            header('Location: http://localhost/hassanProject/index2.php');
        } else {
            echo mysqli_error($connection);
        }

    } else {
        echo $empty_alert;
        printForm();
    }

} else if ($_SERVER['REQUEST_METHOD'] == "GET") {
    printForm();
}


include_once('footer.php');
