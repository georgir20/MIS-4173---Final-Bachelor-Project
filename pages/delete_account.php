<?php include ('edit_account_process.php')?>
<?php
$first_name = "";
$last_name = "";
$email = "";
$street = "";
$house_number = "";
$zip_cust = "";
$phone_number = "";
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
  	<h2 style="margin-top:20px"><b>Delete Account</b></h2>
  </div>
<div class="wrapper row1">
<p></p>
  </div>
  <h2> </h2>
  <h2> Are you sure that you want to delete your entire Account?</h2>
  <h2> Please confirm with your password below.</h2>
	
  <form method="post" action="delete_account.php" style="height:1000px">
  <?php include('../registration/errors.php'); ?>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="confirm_delete">Confirm Deletion</button>
  	</div>
  	
  </form>
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