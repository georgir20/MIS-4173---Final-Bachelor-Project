<?php
session_start();
if (isset($_SESSION['cust_first'])){ unset($_SESSION['cust_first']);}
?>
<!DOCTYPE html>
<html lang="">
<head>
<title>James River Runners Homepage</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
</head>
<body id="top">
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row1">
  <header id="header" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <div id="logo" class="fl_left">
      <h1><a href="index.php">James River Runners</a></h1>
    </div>
    <nav id="mainav" class="fl_right">
      <ul class="clear">
        <li class="active"><a href="index.php">Home</a></li>
        <li><a class="drop" href="#">About Us</a>
          <ul>
            <li><a href="pages/overview.php">Overview</a></li>
            <li><a href="#">Operation Range</a></li>
            <li><a href="#">Employment</a></li>
            <li><a href="#">FAQ</a></li>
          </ul>
          <li><a href="registration/login.php">Request Order</a></li>
        <li><a class="drop" href="#">Customer</a>
          <ul>
            <li><a href="registration/login.php">Log In</a></li>
          </ul>
        </li>
        <li><a href="#">Contact Us</a></li>
      </ul>
    </nav>
    <!-- ################################################################################################ -->
  </header>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper bgded overlay" style="background-image:url('images/demo/backgrounds/courier5.png'); background-position:center;">
  <div id="pageintro" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <article>
      <p>Welcome to James River Runners!</p>
      <h2 class="heading">Your fastest document deliverer in Central Virginia</h2>
      <p>We pick up your important documents and deliver them most efficiently with complete security.</p>
      <footer><a class="btn" href="registration/login.php">Request Your Document Delivery</a></footer>
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
<div class="wrapper bgded overlay" style="background-image:url('images/demo/backgrounds/river1.jpg'); background-position:center;">
  <div class="hoc container clear"> 
    <!-- ################################################################################################ -->
    <div class="flexslider testimonials">
      <ul class="slides">
        <li>
          <article><img class="circle" src="images/demo/jane2.jpg" alt="Photo of a Woman">
            <blockquote>James River Runners is the most reliable document deliverer in Virginia.</blockquote>
            <h6 class="heading">Jane Doe</h6>
          </article>
        </li>
        <li>
          <article><img class="circle" src="images/demo/john.jpg" alt="">
            <blockquote>The runners of JRR deliver your document so fast that you would think you just send it per e-mail. </blockquote>
            <h6 class="heading">John Doe</h6>
          </article>
        </li>
        <li>
          <article><img class="circle" src="images/demo/jen.jpg" alt="">
            <blockquote>If you want to execute your divorce as fast as possible go to JRR!</blockquote>
            <h6 class="heading">Jen Doe</h6>
          </article>
        </li>
      </ul>
    </div>
    <!-- ################################################################################################ -->
  </div>
</div>

<!-- JAVASCRIPTS -->
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>
<script src="layout/scripts/jquery.flexslider-min.js"></script>
</body>
</html>

