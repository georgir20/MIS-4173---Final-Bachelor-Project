<?php 
session_start();
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
            <li><a href="#">Overview</a></li>
            <li><a href="#">Operation Range</a></li>
            <li><a href="#">Employment</a></li>
            <li><a href="#">FAQ</a></li>
          </ul>
           <?php 
           if (isset($_SESSION['cust_first']))
           {
           echo '<li><a href="request_order.php">Request Order</a></li>';
           }
           else echo '<li><a href="../registration/login.php">Request Order</a></li>'
           ?>
          <li><a class="drop" href="#">
            <?php 
            if (isset($_SESSION['cust_first']))
            { 
        	$cust_first = $_SESSION['cust_first'];
        	echo "Hello " . $cust_first;
            }
            else echo "Customer"
        	?>
        	</a>
          <ul>
             <?php 
            if (isset($_SESSION['cust_first'])){
            echo
           '<li><a href="edit_account.php">My Account</a></li>
            <li><a href="my_orders.php">My Orders</a></li>
            <li><a href="../index.php">Log Out</a></li>';
            }
            else echo '<li><a href="../registration/login.php">Log In</a></li>';
            ?>    
       	  </ul>
        <li><a href="#">Contact Us</a></li>
      </ul>
    </nav>
    <!-- ################################################################################################ -->
  </header>
</div>
<div class="wrapper row1">
<div>
  	<h2 style="margin-top:20px"><b>Overview</b></h2>
  </div>
<div class="wrapper row1">
<div style="height:600px; font-size: 16px">
<br><br>
<p align=center>James River Runners is a legal document carrier company located in Richmond, Virginia.</p>
<p align=center>The company was founded in the winter of 1999, by owner Dave Mccallum.</p>
<p align=center>We are currently working in the areas of central and eastern Virginia, with most of our customers coming from the Richmond-Metro area.</p>
<p align=center>We currently provide various carrier options and services that can help you with your business needs fast and efficient.</p>
<p align=center>We look forward to doing business with you in the future.</p>

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
