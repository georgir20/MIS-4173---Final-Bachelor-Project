<?php

session_start();
// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'river_runners_1');
$emaillog = $_SESSION['email'];
$order_number = 0;

$name_query = "SELECT first_name, last_name FROM cust_data WHERE email='$emaillog'";
$resultname = mysqli_query($db, $name_query);
$name = mysqli_fetch_assoc($resultname);
$first_name = $name['first_name'];
$last_name = $name['last_name'];

$id_query = "SELECT cust_id FROM cust_data WHERE email='$emaillog'";
$resultid = mysqli_query($db, $id_query);
$id= mysqli_fetch_assoc($resultid);
$id_key = $id['cust_id'];

$date_query = "SELECT date_order, date_delivery FROM order_data WHERE cust_id='$id_key'";
$resultdate = mysqli_query($db, $date_query);
?>


	
<!DOCTYPE html>
<html lang="">
<head>
<title>James River Runners My Order</title>
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
      <h1><a href="../hp_logged_in.php">James River Runners</a></h1>
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
  	<h2 style="margin-top:20px"><b>My Orders</b></h2>
  </div>
<div class="wrapper row1">
<div style="height:1400px">
<p></p>
<h1 align=center style= "margin-top:20px"  ><b>Orders for: <?php echo $first_name ." " . $last_name?></b> </h1>
<table style= "width:400px; margin-left:auto; margin-right:auto" >
	<tr>
		<th>Order Number</th>
		<th>Order Date</th>
		<th>Delivery Date</th>
	</tr>
	<?php 
	while ($row = mysqli_fetch_assoc($resultdate))
	{
	    $order_number = $order_number + 1;
	    echo "<tr>";
	    echo"<td>". $order_number. "</td>";
	    echo "<td>". $row['date_order'] . "</td>";
	    echo "<td>". $row['date_delivery'] . "</td>";
	    echo "</tr>";
	}
	?>
</table>
<a href="hp_logged_in.php"><img src="../images/demo/red_hb.jpg" style="height:100px; width:100px; margin-left: 45%; margin-top: 50px" ></a>
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
