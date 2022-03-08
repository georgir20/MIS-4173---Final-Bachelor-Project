<?php
session_start();

// initializing variables
$date_entry = date ('Y-m-d');
$email    = "";
$emaillog = "";
$password = "";
$errors = array();
$email_owner ="ownerjrr@gmail.com";

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'river_runners_1');

// REGISTER USER
if (isset($_POST['reg_user'])) {
    // receive all input values from the form
    $first_name = mysqli_real_escape_string($db, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($db, $_POST['last_name']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
    $street = mysqli_real_escape_string($db, $_POST['street']);
    $house_number = mysqli_real_escape_string($db, $_POST['house_number']);
    $zip_cust = mysqli_real_escape_string($db, $_POST['zip_cust']);
    $phone_number = mysqli_real_escape_string($db, $_POST['phone_number']);
    $_SESSION["email"]=$email;
    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($first_name)) { array_push($errors, "First name is required"); }
    if (empty($last_name)) { array_push($errors, "Last name is required");}
    if (empty($email)) { array_push($errors, "Email is required"); }
    if (empty($password_1)) { array_push($errors, "Password is required"); }
    if (empty($street)) { array_push($errors, "Street is required"); }
    if (empty($house_number)) { array_push($errors, "House number is required"); }
    if (empty($zip_cust)) { array_push($errors, "Zip is required"); }
    if (empty($phone_number)) { array_push($errors, "Phone number is required"); }
    if ($password_1 != $password_2) {array_push($errors, "The two passwords do not match");}
    
    // first check the database to make sure
    // a user does not already exist with the same username and/or email
    $user_check_query = "SELECT * FROM cust_data WHERE email='$email' OR first_name='$first_name' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);
    
    if ($user['email'] === $email) {array_push($errors, "email already exists");}
    
    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {
        $password = md5($password_1);//encrypt the password before saving in the database
        
        $query = "INSERT INTO cust_data (first_name, last_name, email, password, street, house_number, zip_cust, phone_number, date_entry)
  			  VALUES('$first_name', '$last_name', '$email', '$password', '$street', '$house_number', '$zip_cust', '$phone_number', '$date_entry')";
        mysqli_query($db, $query);
        header('location: ../pages/hp_logged_in.php');
    }
}



// LOGIN USER
if (isset($_POST['login_user'])) {
    $emaillog = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $_SESSION["email"]=$emaillog;
    if (empty($emaillog)) {
        array_push($errors, "E-mail is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
    
    $password = md5($password);
    
    if (count($errors) == 0 && $emaillog == $email_owner)
    {
        $query = "SELECT * FROM cust_data WHERE email='$emaillog' AND password='$password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1)
        {
        header('location: ../pages/hp_own_logged_in.php');
        }
        else
        {
            array_push($errors, "Wrong email/password combination");
        }
    }
    else
    {
        if (count($errors) == 0)
        {
            
            $query = "SELECT * FROM cust_data WHERE email='$emaillog' AND password='$password'";
            $results = mysqli_query($db, $query);
            if (mysqli_num_rows($results) == 1)
            {
                header('location: ../pages/hp_logged_in.php');
            }
            else
            {
                array_push($errors, "Wrong email/password combination");
            }
        }
    }
}


?>
    
