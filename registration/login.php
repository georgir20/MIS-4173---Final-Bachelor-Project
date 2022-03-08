<?php include('server.php')
?>
<!DOCTYPE html>
<html lang="">
<head>
<title>James River Runners Log In</title>
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
          <li><a href="login.php">Request Order</a></li>
        <li><a class="drop" href="#">Customer</a>
          <ul>
            <li><a href="login.php">Log In</a></li>
          </ul>
        </li>
        <li><a href="#">Contact Us</a></li>
      </ul>
    </nav>
  </header>
</div>

<!-- Log In Form -->
<div class="wrapper row1">

  	<h2>Login</h2>
 
	 
  <form method="post" action="login.php" style="height:1000px">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  		<label>E-mail</label>
  		<input type="text" name="email" >
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="password">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Login</button>
  	</div>
  	<p>
  		Not yet a member? <a href="register.php">Sign up</a>
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