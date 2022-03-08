<?php include ('server.php')?>
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
<title>James River Runners Registration</title>
<link rel="stylesheet" type="text/css" href="style.css">
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
            <li><a href="../pages/overview.php">Overview</a></li>
            <li><a href="#">Operation Range</a></li>
            <li><a href="#">Employment</a></li>
            <li><a href="#">FAQ</a></li>
          </ul>
          <li><a href="#">Request Order</a></li>
        <li><a class="drop" href="#">Customer</a>
          <ul>
            <li><a href="login.php">Log In</a></li>
           </ul>
        <li><a href="#">Contact Us</a></li>
      </ul>
    </nav>
    <!-- ################################################################################################ -->
  </header>
</div>
<div class="wrapper row1">
<div>
  	<h2><b>Register</b></h2>
  </div>
	
  <form method="post" action="register.php">
   	<?php include('errors.php'); ?>
  	<div class="input-group">
  	  <label style= padding-left:"150px" >First Name</label>
  	  <input type="text" name="first_name" value="<?php echo $first_name; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Last Name</label>
  	  <input type="text" name="last_name" value="<?php echo $last_name; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" value="<?php echo $email; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Street</label>
  	  <input type="text" name="street" value="<?php echo $street; ?>">
  	</div>
  	<div class="input-group">
  	  <label>House Number</label>
  	  <input type="number" name="house_number" value="<?php echo $house_number; ?>">
  	</div>
  	<div class="input-group">
  	  <label>ZIP</label>
  	  <input type="number" name="zip_cust" value="<?php echo $zip_cust; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Phone Number</label>
  	  <input type="text" name="phone_number" value="<?php echo $phone_number; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="password_2">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>
  	<p>
  		Already a member? <a href="login.php">Sign in</a>
  	</p>
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