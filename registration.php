<?php
include_once('header.php');


function phone_validation($phone)
{
    // Allow +, - and . in phone number
    $filtered_phone_number = filter_var($phone, FILTER_SANITIZE_NUMBER_INT);
    // Remove "-" from number
    $phone_to_check = str_replace("-", "", $filtered_phone_number);
    // Check the lenght of number
    // This can be customized if you want phone number from a specific country
    if (strlen($phone_to_check) < 10 || strlen($phone_to_check) > 14) {
        return false;
    } else {
        return true;
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
       $options .= '<option value="'. $classOption['id'] .'">'. $classOption['title'] .'</option>';
    }

    return '<select class="form-control" id="user_class_id" name="user_class_id">' . $options .'</select>';
}

function get_Fees() {
    global $connection;

    $feeOptions= mysqli_fetch_all($connection->query("select * from fee;"), MYSQLI_ASSOC);
    $options = '';
    foreach ($feeOptions as $feeOption) {
        $options .= '
<div class="card m-2">
<div class="card-header">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="user_fee_id" value="'. $feeOption['id'] .'"  checked>
                            <label class="form-check-label" for="user_fee_id">
                                 '. $feeOption['name'] .'
                            </label>
                        </div>
                     </div>
                     <div class="card-body">
                         <h5 class="card-title">'. $feeOption['amount'] .'</h5>
                         <p class="card-text">'. $feeOption['benefits'] .'</p>
                     </div>
                     </div>
                     ';

    }

    return '
            <div class="card-groups">
                         ' . $options .'  
             </div>';
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
                    '. get_fees() .'
                
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
                            <input type="radio"  class="custom-control-input"  id="inlineRadio1" name="user_gender" value="male">

                            <label class="custom-control-label" for="inlineRadio1">Male</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio"  class="custom-control-input" id="inlineRadio2" name="user_gender" value="female">
                            <label class="custom-control-label" for="inlineRadio2">Female</label>
                    </div>
                </div>
            </div>
            <input type="text" class="form-control mb-4" name="user_address" id="user-address" placeholder="Address">

            <button class="btn btn-dark my-4 btn-block" type="submit">Register</button>
    
    ';
}


$fault_alert = '<div class="col-12"><div class="alert alert-danger">Login Failed: UNKNOWN</div></div>';
$empty_alert = '<div class="col-12"><div class="alert alert-danger">Registration Failed: There is an empty field</div></div>';
$mobile_alert = '<div class="col-12"><div class="alert alert-danger">Registration Failed: mobile number is Invalid</div></div>';
$email_alert = '<div class="col-12"><div class="alert alert-danger">Registration Failed: Email is invalid</div></div>';
$general_alert = '<div class="col-12"><div class="alert alert-danger">An unexpected error happened, please try again.</div></div>';


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (!empty($_POST['user_first_name']) && !empty($_POST['user_last_name']) &&
        !empty($_POST['user_email']) && !empty($_POST['user_mobile']) &&
        !empty($_POST['user_address']) && !empty($_POST['user_gender']) &&
        !empty($_POST['user_class_id']) && !empty($_POST['user_password'])
    ) {

        $user_firstName = $_POST['user_first_name'];
        $user_lastName = $_POST['user_last_name'];
        $user_age = $_POST['user_age'];
        $class_id = $_POST['user_class_id'];
        $fee_id = $_POST['user_fee_id'];
        $user_mobile = $_POST['user_mobile'];
        $user_email = $_POST['user_email'];
        $user_address = $_POST['user_address'];

        if (!phone_validation($user_mobile)) {
            echo $mobile_alert;
            printForm();
            exit;
        }

        if (!email_validation($_POST['user_email'])) {
            echo $email_alert;
            printForm();
            exit;
        }

        $user_gender = "";
        if ($_POST['user_gender'] == "male") {
            $user_gender = 'm';
        } elseif ($_POST['user_gender'] == "female") {
            $user_gender = 'f';
        } else {
            echo $empty_alert;
            printForm();
        }

        $user_password = md5($_POST['user_password']);

        $query = "INSERT INTO user (first_name, last_name, gender,mobile_number,address,email,password) VALUES
                    ('". $user_firstName. "', '". $user_lastName ."', '" .$user_gender ."','". $user_mobile. "' ,'". $user_address ."','". $user_email ."','". $user_password ."')";

        $result = mysqli_query($connection, $query);

        if ($result != false) {
            $user_id = mysqli_insert_id($connection);

            $query = "INSERT INTO membership (user_id, class_id, fee_id) VALUES
                    ('". $user_id. "', '". $class_id ."', '" .$fee_id ."')";

            if (mysqli_query($connection, $query)) {
                header('Location: /FlexClub');
                echo "<script>window.location.replace(\"/FlexClub\");</script>";

                die();
            } else {
                echo mysqli_error($connection);
                echo $general_alert;
                printForm();
                exit;
            }

        } else {
            echo mysqli_error($connection);
            echo $general_alert;
            printForm();
            exit;
        }

    } else {
        echo $empty_alert;
        printForm();
    }

} else if ($_SERVER['REQUEST_METHOD'] == "GET") {
    printForm();
}


include_once('footer.php');


