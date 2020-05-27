<?php
include_once('header.php');

function phone_validation($phone){
    if (ctype_digit($phone)) {
        return true;
    } else {
        return false;
    }
}

function email_validation($email){
    $regex = '/[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})/';
    if (preg_match($regex, $email, $match)) {
        return true;
    } else {
        return false;
    }
}

function get_classes() {
    global $connection;

    $classOptions= mysqli_fetch_all($connection->query("select * from class;"), MYSQLI_ASSOC);
    $options = '';
    foreach ($classOptions as $classOption) {
       $options .= '<option id="'. $classOption['id'] .'">'. $classOption['title'] .'</option>';
    }

    return '<select class="form-control" id="user_class">' . $options .'</select>';
}

function printForm()
{
    echo '
          <div class="container mt-4">
                <div class="row bg-light pb-5 pt-5 mb-5">
                     <div class="col text-center">
                          <h2 class="text-dark">Registration</h2>
                          <p class="text-secondary">In this page you can find customer review <br>
                                This is our pleasure to here your review about our classes, our trainers and this club
                                <br>If you are a member of this club you can add your opinion.
                          </p>
                     </div>
                </div>
                <form method="POST" action="">
                <div class="form-group">
                <div class="row bg-light p-3 mb-3">
                     <div class="col text-left">
                            <h4 class="text-dark">Choose Fee</h4>
                     </div>
                </div>
                <div class="card-deck">
                    <div class="card">
                    <div class="card-header">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                            <label class="form-check-label" for="exampleRadios1">
                             Professional
                            </label>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                            <label class="form-check-label" for="exampleRadios2">
                                Enterprise
                            </label>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="option3" >
                            <label class="form-check-label" for="exampleRadios3">
                                    Premium
                            </label>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                </div>
            </div>
            <div class="row bg-light p-3 mb-3 mt-4">
                 <div class="col text-left">
                      <h4 class="text-dark">Choose Classes</h4>
                 </div>
            </div>  
            '. get_classes() . '            
            </div>
            <div class="row bg-light p-3 mb-3 mt-4">
                 <div class="col text-left">
                      <h4 class="text-dark">Enter your details information</h4>
                 </div>
            </div> 
            <div class="form-row mb-4">
                <div class="col">
                    <!-- First name -->
                    <input type="text" id="user-first-name" name="user_first_name" class="form-control" placeholder="First name">
                </div>
                <div class="col">
                    <!-- Last name -->
                        <input type="text" id="user-last-name" name="user_last_name" class="form-control" placeholder="Last name">
                </div>
            </div>
            <div class="form-row ">
                <div class="col">
                    <!-- E-mail -->
                    <input type="email" name="user_email" id="user-email" class="form-control mb-4" placeholder="E-mail">
                </div>
                <div class="col">
                    <input type="password" name="user_password" id="user-password"s class="form-control mb-4" placeholder="Password" aria-describedby="defaultRegisterFormPasswordHelpBlock">
                </div>
            </div>
            <div class="form-row ">
                <div class="col">
                    <!-- Phone number -->
                    <input type="text" id="user-mobile" name="user_mobile" class="form-control mb-4" placeholder="Phone number" aria-describedby="defaultRegisterFormPhoneHelpBlock">
                </div>
                <div class="col">
                    <div class="custom-control custom-control-inline">
                            <label class=" text-Dark" >Gender: </label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio"  class="custom-control-input"  id="inlineRadio1" name="user_gender" >
                            <label class="custom-control-label" for="inlineRadio1">Male</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio"  class="custom-control-input" id="inlineRadio2" name="user_gender">
                            <label class="custom-control-label" for="inlineRadio2">Female</label>
                    </div>
                </div>
            </div>
            <input type="text" class="form-control mb-4" name="user_address" id="user-address" placeholder="Address">

            <button class="btn btn-dark my-4 btn-block" type="submit">Register</button>
    
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

        if (phone_validation($_POST['user_mobile'])) {
            $user_mobile = $_POST['user_mobile'];
        } else {
            echo $mobile_alert;
            die();
        }

        if (email_validation($_POST['user_email'])) {
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


        $query = "INSERT INTO user (first_name, last_name, gender,mobile_number,address,email,password,membership_id,class_id) VALUES
                    ('$user_firstName', '$user_lastName', '$user_gender', $user_mobile,'$user_address','$user_email','$user_password',2,3,NULL)";

        $result = mysqli_query($connection, $query);

        if ($result != false) {
            header('Location: /FlexClub');
            echo "<script>window.location.replace(\"/FlexClub\");</script>";

            die();
        }

    } else {
        echo $empty_alert;
        printForm();
    }

} else if ($_SERVER['REQUEST_METHOD'] == "GET") {
    printForm();
}


include_once('footer.php');

