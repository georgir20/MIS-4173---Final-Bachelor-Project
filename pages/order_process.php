<?php include("../email/class.phpmailer.php");?>
<?php
session_start();

$emaillog = "";
$errors = array();
$date_order = date ('Y-m-d');
$cust_id = "";
$cust_id_key = "";
$first_name = "";
$first_name_key = "";
$last_name = "";
$last_name_key = "";
// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'river_runners_1');



// REQUEST ORDER
if (isset($_POST['order'])) {
    // receive all input values from the form
    $street_pickup = mysqli_real_escape_string($db, $_POST['street_pickup']);
    $hnr_pickup = mysqli_real_escape_string($db, $_POST['hnr_pickup']);
    $zip_pickup = mysqli_real_escape_string($db, $_POST['zip_pickup']);
    $date_pickup = mysqli_real_escape_string($db, $_POST['date_pickup']);
    $time_pickup = mysqli_real_escape_string($db, $_POST['time_pickup']);
    $street_delivery = mysqli_real_escape_string($db, $_POST['street_delivery']);
    $hnr_delivery = mysqli_real_escape_string($db, $_POST['hnr_delivery']);
    $zip_delivery = mysqli_real_escape_string($db, $_POST['zip_delivery']);
    $date_delivery = mysqli_real_escape_string($db, $_POST['date_delivery']);
    $time_delivery = mysqli_real_escape_string($db, $_POST['time_delivery']);
    $emaillog = $_SESSION ["email"];
    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($street_pickup)) { array_push($errors, "Street for pickup is required"); }
    if (empty($hnr_pickup)) { array_push($errors, "House number for pickup is required");}
    if (empty($zip_pickup)) { array_push($errors, "ZIP for pickup is required"); }
    if (empty($date_pickup)) { array_push($errors, "Date for pickup is required"); }
    if (empty($time_pickup)) { array_push($errors, "Time for pickup is required"); }
    if (empty($street_delivery)) { array_push($errors, "Street for delivery is required"); }
    if (empty($hnr_delivery)) { array_push($errors, "House number for delivery is required");}
    if (empty($zip_delivery)) { array_push($errors, "ZIP for delivery is required"); }
    if (empty($date_delivery)) { array_push($errors, "Date for delivery is required"); }
    if (empty($time_delivery)) { array_push($errors, "Time for delivery is required"); }
    
    $user_query = "SELECT cust_id FROM cust_data WHERE email='$emaillog'";
    $result = mysqli_query($db, $user_query);
    $cust_id = mysqli_fetch_assoc($result);
    // Finally, process order request if there are no errors in the form
   $cust_id_key = $cust_id ['cust_id'];
   $_SESSION["cust"]=$cust_id_key;
   $_SESSION["date"]=$date_order;
  
   $user_query2 = "SELECT first_name FROM cust_data WHERE email='$emaillog'";
   $resultuser2 = mysqli_query($db, $user_query2);
   $first_name = mysqli_fetch_assoc($resultuser2);
   $first_name_key = $first_name ['first_name'];
   
   $user_query3 = "SELECT last_name FROM cust_data WHERE email='$emaillog'";
   $resultuser3 = mysqli_query($db, $user_query3);
   $last_name = mysqli_fetch_assoc($resultuser3);
   $last_name_key = $last_name ['last_name'];
   
   
   
   /*Predefine Email*/
   $account="ownerjrr@gmail.com";
   $password="jrr@richmond1";
   $to="ownerjrr@gmail.com";
   $from_name="$first_name_key $last_name_key ";
   $subject="Order Request from $first_name_key $last_name_key ";
   $msg=
   "<strong>You got an order request from: $first_name_key $last_name_key.</strong><br>
     <strong>E-mail: $emaillog</strong><br><br>
     <strong><u>Pick Up</u></strong><br>
     <p>Date: $date_pickup</p>
     <p>Time: $time_pickup</p>
     <p>Street: $hnr_pickup $street_pickup</p>
     <p>ZIP: $zip_pickup</p><br><br>
     <strong><u>Delivery</u></strong><br>
     <p>Date: $date_delivery</p>
     <p>Time: $time_delivery</p>
     <p>Street: $street_delivery</p>
     <p>ZIP: $zip_delivery</p><br>
    "; // HTML message
   
   
  if (count($errors) == 0) 
        
      {
      $zippickup_query = "SELECT zipr FROM ziprange_data WHERE '$zip_pickup' = zipr"; 
      $zipdelivery_query = "SELECT zipr FROM ziprange_data WHERE '$zip_delivery' = zipr"; 
      $resultpick = mysqli_query($db, $zippickup_query);
      $resultdeliv = mysqli_query($db, $zipdelivery_query);
      if ((mysqli_num_rows($resultpick)==0) || (mysqli_num_rows($resultdeliv)==0)) 
      {
          array_push($errors, "Operating range problem: Sorry your pickup or delivery location is outside of our operating range.");
      }
      else 
          {
          $insert_query = "INSERT INTO order_data (cust_id, date_order, street_pickup, hnr_pickup, zip_pickup, date_pickup, time_pickup, street_delivery, hnr_delivery, zip_delivery, date_delivery, time_delivery)

  	      VALUES('$cust_id_key', '$date_order', '$street_pickup', '$hnr_pickup', '$zip_pickup', '$date_pickup', '$time_pickup', '$street_delivery', '$hnr_delivery', '$zip_delivery', '$date_delivery', '$time_delivery')";
          if ($db->query($insert_query) === TRUE) 
          {
              
              /*End Config Email*/
              
              $mail = new PHPMailer();
              $mail->IsSMTP();
              $mail->CharSet = 'UTF-8';
              $mail->Host = "smtp.gmail.com";
              $mail->SMTPAuth= true;
              $mail->Port = 465; // Or 587
              $mail->Username= $account;
              $mail->Password= $password;
              $mail->SMTPSecure = 'ssl';
              $mail->FromName= $from_name;
              $mail->isHTML(true);
              $mail->Subject = $subject;
              $mail->Body = $msg;
              $mail->addAddress($to);
              
              if(!$mail->send()){
                  echo "Mailer Error: " . $mail->ErrorInfo;
              }else{
                  echo "E-Mail has been sent";
              }
              
          header('location: ../pages/order_confirmation.php');
          } 
          else 
                {
                echo "Error: " . $insert_query . "<br>" . $db->error;
                }  

          }
    

    
    
      }
}
      
    


?>