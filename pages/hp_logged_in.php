<?php

session_start();
$first_name=array();
$customer="";
 if (!isset($_SESSION['email'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: ../registration/login.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['email']);
    header("location: ../index.php");
} 
$db = mysqli_connect('localhost', 'root', '', 'river_runners_1');

        $email_log = $_SESSION['email'];
        $cust_first_query = "SELECT first_name FROM cust_data WHERE email='$email_log'";
        $result = mysqli_query($db,  $cust_first_query);
        $first_name = mysqli_fetch_assoc($result);
        $first_name_key = $first_name ['first_name'];
        $_SESSION['cust_first'] = $first_name_key;
        
        $cust_last_query = "SELECT last_name FROM cust_data WHERE email='$email_log'";
        $result = mysqli_query($db,  $cust_last_query);
        $last_name = mysqli_fetch_assoc($result);
        $last_name_key = $last_name ['last_name'];
        $_SESSION['cust_last'] = $last_name_key;

?>
<!DOCTYPE html>
<html lang="">
<head>
<title>James River Runners Homepage</title>
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
      <h1><a href="hp_logged_in.php">James River Runners</a></h1>
    </div>
    <nav id="mainav" class="fl_right">
      <ul class="clear">
        <li class="active"><a href="hp_logged_in.php">Home</a></li>
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
        	echo $first_name_key
        	?>
        	</a>
          <ul>
          	<li><a href="edit_account.php">My Account</a></li>
            <li><a href="my_orders.php">My Orders</a></li>
            <li><a href="../index.php">Log Out</a></li>
          </ul>
        </li>
        <li><a href="#">Contact Us</a></li>
      </ul>
    </nav>
    <!-- ################################################################################################ -->
  </header>
</div>
<div class="wrapper bgded overlay" style="background-image:url('../images/demo/backgrounds/courier5.png'); background-position:center;">
  <div id="pageintro" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <article>
      <p>Welcome
      <?php 
      echo $first_name_key . " " .$last_name_key;
       ?>
      !</p>
      <h2 class="heading">Request your next document delivery by today.</h2>
      <p>We pick up your important documents and deliver them most efficiently with complete security.</p>
      <footer><a class="btn" href="request_order.php">Request Your Document Delivery</a></footer>
    </article>
    <!-- ################################################################################################ -->
  </div>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row3">
  <main class="hoc container clear"> 
    <!-- main body -->
    <!-- ################################################################################################ -->
    <div class="sectiontitle">
      <h6 class="heading">Our Core Competencies</h6>
    </div>
    <ul class="nospace group services">
      <li class="one_third first">
        <article class="infobox">
          <h6 class="heading"><a href="#">Trust</a></h6>
        </article>
      </li>
      <li class="one_third">
        <article class="infobox">
          <h6 class="heading"> <a href="#">Speed</a></h6>
        </article>
      </li>
      <li class="one_third">
        <article class="infobox">
          <h6 class="heading"><a href="#">Reliability</a></h6>
          </article>
      </li>
     </ul>
    <!-- / main body -->
  </main>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->

<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->

  <footer id="footer" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <nav>
      <ul class="nospace">
        <li><a href="#">About</a></li>
        <li><a href="#">Contact</a></li>
        <li><a href="#">Privacy</a></li>
        <li><a href="#">Disclaimer</a></li>
        <li><a href="#">Cookies</a></li>
      </ul>
    </nav>
    <!-- ################################################################################################ -->
  </footer>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row5">

</div>
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
