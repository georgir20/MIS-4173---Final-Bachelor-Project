<?php include ('order_process.php')?>
<?php
$first_name = "";
$last_name = "";
$email = "";
$street = "";
$house_number = "";
$zip_cust = "";
$phone_number = "";
$customer_id;
$emailtest = array ();
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
  	<h2 style="margin-top:20px"><b>Order Confirmation</b></h2>
  </div>
<div class="wrapper row1">
<div style="height:600px">
<p></p>
<h1 align=center style= "margin-top:20px"  ><b>Thank you for your order request!</b> </h1>
<p></p>
<p align=center><b>Your order will now be processed by our team.</b></p>
<p align=center>You will get a confirmation e-mail with the name of the runner who will pick up your order.</p>
<a href="hp_logged_in.php"><img src="../images/demo/red_hb.jpg" style="height:100px; width:100px; margin-left: 45%; margin-top: 50px" ></a>
</div>	
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
