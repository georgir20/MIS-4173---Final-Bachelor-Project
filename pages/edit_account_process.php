<?php
session_start();
$emaillog = "";
$errors = array();


// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'river_runners_1');

// EDIT ACCOUNT
if (isset($_POST['edit_user'])) {
    // receive all input values from the form
    $first_name = mysqli_real_escape_string($db, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($db, $_POST['last_name']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $street = mysqli_real_escape_string($db, $_POST['street']);
    $house_number = mysqli_real_escape_string($db, $_POST['house_number']);
    $zip_cust = mysqli_real_escape_string($db, $_POST['zip_cust']);
    $phone_number = mysqli_real_escape_string($db, $_POST['phone_number']);
    $emaillog = $_SESSION["email"];
    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($first_name)) { array_push($errors, "First name is required"); }
    if (empty($last_name)) { array_push($errors, "Last name is required");}
    if (empty($email)) { array_push($errors, "Email is required"); }
    if (empty($street)) { array_push($errors, "Street is required"); }
    if (empty($house_number)) { array_push($errors, "House number is required"); }
    if (empty($zip_cust)) { array_push($errors, "Zip is required"); }
    if (empty($phone_number)) { array_push($errors, "Phone number is required"); }
    
   
    
    //Update Contact Information
    if (count($errors) == 0) {
                
        $query = "UPDATE cust_data 
                  SET first_name = '$first_name', last_name = '$last_name', email = '$email', street = '$street', house_number = '$house_number', zip_cust = '$zip_cust', phone_number = '$phone_number'
                  WHERE email = '$emaillog'";
        
        if ($db->query($query) === TRUE) {
            header('location: ../pages/update_confirmation.php');
        } else {
            echo "Error: " . $query . "<br>" . $db->error;
            print_r($emaillog);
        }   
    }
}

 // DELETE ACCOUNT    
if (isset($_POST['confirm_delete'])) {
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $emaillog = $_SESSION["email"];
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
    
    $password = md5($password);
    
    if (count($errors) == 0)
    {
        $query = "SELECT * FROM cust_data WHERE email='$emaillog' AND password='$password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1)
        {
            $query_delete = "DELETE FROM cust_data WHERE email='$emaillog' AND password='$password'";
            mysqli_query($db, $query_delete);
            header('location: delete_confirmation.php');
        }
        else
        {
            array_push($errors, "Wrong password");
        }
    }
    }
