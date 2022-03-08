<?php include ('edit_account_process.php')?>
<?php
$first_name = "";
$last_name = "";
$email = "";
$street = "";
$house_number = "";
$zip_cust = "";
$phone_number = "";
$emaillog = $_SESSION ["email"];
// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'river_runners_1');

$cust_query = "SELECT * FROM cust_data WHERE email='$emaillog'";
$result = mysqli_query($db, $cust_query);
$cust_row = mysqli_fetch_assoc($result);

$first_name= $cust_row ['first_name'];
$last_name= $cust_row ['last_name'];
$email= $cust_row ['email'];
$street= $cust_row ['street'];
$house_number= $cust_row ['house_number'];
$zip_cust= $cust_row ['zip_cust'];
$phone_number= $cust_row ['phone_number'];

$first_name= $cust_row ['first_name'];
$first_name= $cust_row ['first_name'];
?>
<!DOCTYPE html>
<html lang="">
<head>
<title>James River Runners My Account</title>
<link rel="stylesheet" type="text/css" href="../registration/style.css">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="../layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
</head>
<body id="top">
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row1">
  <header id="header" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <div id="logo" class="fl_left">
      <h1><a href="../index.php">James River Runners</a></h1>
    </div>
    <nav id="mainav" class="fl_right">
      <ul class="clear">
        <li class="active"><a href="../index.php">Home</a></li>
        <li><a class="drop" href="#">About Us</a>
          <ul>
            <li><a href="overview.php">Overview</a></li>
            <li><a href="#">Operation Range</a></li>
            <li><a href="#">Employment</a></li>
            <li><a href="#">FAQ</a></li>
          </ul>
          <li><a href="request_order.php">Request Order</a></li>
        <li><a class="drop" href="#">
        	Hello 
        	 <?php 
        	$cust_first = $_SESSION['cust_first'];
        	echo $cust_first;
        	?>
        	</a>
          <ul>
            <li><a href="edit_account.php">My Account</a></li>
            <li><a href="my_orders.php">My Orders</a></li>
            <li><a href="../index.php">Log Out</a></li>
       	  </ul>
  
        <li><a href="#">Contact Us</a></li>
      </ul>
    </nav>
    <!-- ################################################################################################ -->
  </header>
</div>
<div class="wrapper row1">
<div>
  	<h2 style="margin-top:20px"><b>Edit Account</b></h2>
  </div>
<div class="wrapper row1" >
<p></p>
  	<a href="delete_account.php">
  	<img style="height:60px; width:160px;  display: block; margin-left: auto;margin-right: auto" src="../images/demo/delete.jpg"   ></img></a> 
  </div>
  <div  align="center">
  <form method="post" action="edit_account.php" style="height:800px ">
   	<?php include('../registration/errors.php'); ?>
  	<div class="input-group">
  	  <label>First Name:
  	  <input type="text" name="first_name" value="<?php echo $first_name ?> ">
  	  </label>
  	</div>
  	<div class="input-group">
  	  <label>Last Name
  	  <input type="text" name="last_name" value="<?php echo $last_name ?>">
  	  </label>
  	</div>
  	<div class="input-group">
  	  <label>Email
  	  <input type="email" name="email" value="<?php echo $email ?>">
  	  </label>
  	</div>
  	<div class="input-group">
  	  <label>Street
  	  <input type="text" name="street" value="<?php echo $street ?>">
  	  </label>
  	</div>
  	<div class="input-group">
  	  <label>House Number
  	  <input type="number" name="house_number" value="<?php echo $house_number ?>">
  	  </label>
  	</div>
  	<div class="input-group">
  	  <label>ZIP
  	  <input type="number" name="zip_cust" value="<?php echo $zip_cust ?>">
  	  </label>
  	</div>
  	<div class="input-group">
  	  <label>Phone Number
  	  <input type="text" name="phone_number" value="<?php echo $phone_number ?>">
  	  </label>
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="edit_user">Submit New Information</button>
  	</div>
  	</form>
  	</div>
  
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->

<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->


<!-- JAVASCRIPTS -->
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>
<script src="layout/scripts/jquery.flexslider-min.js"></script>
</body>
</html>
