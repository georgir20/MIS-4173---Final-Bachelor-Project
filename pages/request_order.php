<?php include ('order_process.php')?>
<?php
$date_pickup = "";
$time_pickup = "";
$street_pickup = "";
$hnr_pickup = "";
$zip_pickup = "";
$date_delivery = "";
$time_delivery = "";
$street_delivery = "";
$hnr_delivery = "";
$zip_delivery = "";
?>

<!DOCTYPE html>
<html lang="">
<head>
<title>James River Runners Request Order</title>
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
        	$cust_first=$_SESSION['cust_first'];
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
  	<h2 style="margin-top:20px"><b>Request Order</b></h2>
  	</div>
	</div>
  <form class="wrapper row1" style="height:1000px" method="post" action="request_order.php">
   	<?php include('../registration/errors.php'); ?>
  	<h1 style="margin-top:40px; margin-left:390px;">Pick Up</h1>
  	<div class="pickup-input-group">
  	  <label>Date</label>
  	  <input type="date" name="date_pickup" value="<?php echo $date_pickup; ?>">
  	</div>
  	<div class="pickup-input-group">
  	  <label>Time</label>
  	  <input type="time" name="time_pickup" value="<?php echo $time_pickup; ?>">
  	</div>
  	<div class="pickup-input-group">
  	  <label>Street</label>
  	  <input type="text" name="street_pickup" value="<?php echo $street_pickup; ?>">
  	</div>
  	<div class="pickup-input-group">
  	  <label>House Number</label>
  	  <input type="number" name="hnr_pickup" value="<?php echo $hnr_pickup; ?>">
  	</div>
  	<div class="pickup-input-group">
  	  <label>ZIP Code</label>
  	  <input type="number" name="zip_pickup" value="<?php echo $zip_pickup; ?>">
  	</div>
  	<label></label>
  	<hr style="size:50px">
  	<h1 style="margin-top:40px; margin-left:390px;">Delivery</h1>
  	<div class="delivery-input-group">
  	  <label>Date</label>
  	  <input type="date" name="date_delivery" value="<?php echo $date_delivery; ?>">
  	</div>
  	<div class="delivery-input-group">
  	  <label>Time</label>
  	  <input type="time" name="time_delivery" value="<?php echo $time_delivery; ?>">
  	</div>
  	<div class="delivery-input-group">
  	  <label>Street</label>
  	  <input type="text" name="street_delivery" value="<?php echo $street_delivery; ?>">
  	</div>
  	<div class="delivery-input-group">
  	  <label>House Number</label>
  	  <input type="number" name="hnr_delivery" value="<?php echo $hnr_delivery; ?>">
  	</div>
  	<div class="delivery-input-group">
  	  <label>ZIP Code</label>
  	  <input type="number" name="zip_delivery" value="<?php echo $zip_delivery; ?>">
  	</div>
  	<br>
  	  <button style="margin-left:390px; margin-top:50px" type="submit" class="btn"  name="order">Request Order</button>
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