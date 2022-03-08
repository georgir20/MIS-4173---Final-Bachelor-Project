<?php include("fusioncharts.php")?>
<?php 
$db = mysqli_connect('localhost', 'root', '', 'river_runners_1');

$year=date("Y");
//TOTAL ORDERS
 
 if ($resulttotal = $db->query("SELECT * FROM order_data ")) {
     
     /* determine number of rows result set */
     $order_amount = $resulttotal->num_rows;
     
     /* close result set */
     $resulttotal->close();
 }
 
 //ORDER MONTHLY DEVELOPMENT
 $monthly_query = "SELECT MONTHNAME(date_order) AS Month, COUNT(order_id) AS OrderAmount
                   FROM order_data
                   WHERE YEAR(date_order)='$year'
                   GROUP BY Month
                   ORDER BY date_order";
 
 //ORDER WEEKLY DEVELOPMENT
 $weekly_query = "SELECT WEEK (date_order ) AS WeekNumber, COUNT(order_id) AS OrderAmount
                   FROM order_data
                   WHERE YEAR(date_order)='$year'
                   GROUP BY Weeknumber
                   ORDER BY Weeknumber";


// Syntax for the chart instance -
$var = new FusionCharts(
"type of chart",
"unique chart id",
"width of chart",
"height of chart",
"div id to render the chart",
"type of data",
"actual data");


?>
<!DOCTYPE html>
<html lang="">
<head>
<title>James River Runners Homepage</title>
<script type="text/javascript" src="../java/fusioncharts.js"></script>
<script type="text/javascript" src="../java/fusioncharts.charts.js"></script>
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
      <h1><a href="hp_own_logged_in.php">James River Runners</a></h1>
    </div>
    <nav id="mainav" class="fl_right">
      <ul class="clear">
        <li class="active"><a href="../index.php">Home</a></li>
        <li><a href="#">Hello James</a>
        <ul>
            <li><a href="order_analytics.php">Order Analytics</a></li>
            <li><a href="customer_analytics.php">Customer Analytics</a></li>
            <li><a href="../index.php">Log Out</a></li>
        </ul>
        <li><a href="#">Contact Us</a></li>
      </ul>
    </nav>
    <!-- ################################################################################################ -->
  </header>
    <div class="wrapper row1">
<div>
  	<h2 style="margin-top:20px"><b>Order Analytics</b></h2>
</div>

<div class="wrapper row1">
<div style="height:3000px">
<p></p>
<h1 align=center><b>Total Orders: <?php echo $order_amount?></b></h1>
<!-- 
<h1 align=center style="margin-top:80px">Monthly Development of Orders in <?php echo $year?></h1>
<table style= "width:400px; text-align:center; margin-left:auto; margin-right:auto" >
	<tr>
		<th>Month</th>
		<th>Order Amount</th>
	</tr>
	<?php 
	/* if ($resultmonthly = $db->query($monthly_query)) {
	while ($row = $resultmonthly->fetch_assoc()) {
	{

	    echo "<tr>";
	    echo"<td>". $row['Month'] . "</td>";
	    echo "<td>". $row['OrderAmount'] . "</td>";
	    echo "</tr>";
	}
	}
	}
	$resultmonthly->close(); */
	?>
</table>
 -->
<br>

<p></p>

<?php 
// Column Chart for Monthly Orders
if ($resultmonthlychart = $db->query($monthly_query)) {
	while ($rowchart = $resultmonthlychart->fetch_assoc())
	   {
	    // creating an associative array to store the chart attributes
	    $arrMonthlyData = array(
	    "chart" => array(
	    "theme" => "fint",
	    "caption" => "Monthly Orders",
	    "captionFontSize" => "20",
	    "paletteColors" => "#A2A5FC, #41CBE3, #EEDA54, #BB423F #,F35685",
	    "baseFont" => "Quicksand, sans-serif",
	    "xAxisName"=> "Month",
	    "yAxisName"=> "Order Amount",
	    "xAxisNameFontSize"=> "14",
	    "yAxisNameFontSize"=> "14"
	    //more chart configuration options
	    )
	    );
	    
	    $arrMonthlyData["data"] = array();
	    array_push($arrMonthlyData["data"], array(
	        "label" => $rowchart["Month"],
	        "value" =>$rowchart["OrderAmount"]));
	    
	    // iterating over each data and pushing it into $arrMonthlyData array
	    while ($rowchart = mysqli_fetch_array($resultmonthlychart)) {
	        array_push($arrMonthlyData["data"], array(
	            "label" => $rowchart["Month"],
	            "value" =>$rowchart["OrderAmount"]
	        ));
	    }
	    $jsonEncodedData = json_encode($arrMonthlyData);
	    
	    // creating FusionCharts instance
	    $MonthlyChart = new FusionCharts("column2d", "ordermonthly", "45%", "450", "ordermonthly-chart", "json", $jsonEncodedData);
	    
	    // FusionCharts render method
	    $MonthlyChart -> render();
	   }
	 }
	 /* $resultlocation->close(); */
	 $resultmonthlychart->close();
?>
	    
<br>
<br>
<div id="ordermonthly-chart"; align=center>A beautiful column chart is on its way!</div> 
<!--  
<h1 align=center style="margin-top:80px">Weekly Development of Orders in <?php echo $year?></h1>
<table style= "width:400px; text-align:center; margin-left:auto; margin-right:auto" >
	<tr>
		<th>Week Number</th>
		<th>Order Amount</th>
	</tr>
	<?php 
/* 	if ($resultweekly = $db->query($weekly_query)) {
	    while ($row = $resultweekly->fetch_assoc()) {
	{

	    echo "<tr>";
	    echo"<td>". $row['WeekNumber'] . "</td>";
	    echo "<td>". $row['OrderAmount'] . "</td>";
	    echo "</tr>";
	}
	}
	}
	$resultweekly->close(); */
	?>
</table>
-->
<br>

<?php 
// Column Chart for Weekly Orders
if ($resultweeklychart = $db->query($weekly_query)) {
	while ($rowchart = $resultweeklychart->fetch_assoc())
	   {
	    // creating an associative array to store the chart attributes
	    $arrWeeklyData = array(
	    "chart" => array(
	    "theme" => "fint",
	    "caption" => "Weekly Orders",
	    "captionFontSize" => "20",
	    "paletteColors" => "#A2A5FC, #41CBE3, #EEDA54, #BB423F #,F35685",
	    "baseFont" => "Quicksand, sans-serif",
	    "xAxisName"=> "Week Number",
	    "yAxisName"=> "Order Amount",
	    "xAxisNameFontSize"=> "14",
	    "yAxisNameFontSize"=> "14",
	    //more chart configuration options
	    )
	    );
	    
	    $arrWeeklyData["data"] = array();
	    array_push($arrWeeklyData["data"], array(
	        "label" => $rowchart["WeekNumber"],
	        "value" =>$rowchart["OrderAmount"]));
	    
	    // iterating over each data and pushing it into $arrData array
	    while ($rowchart = mysqli_fetch_array($resultweeklychart)) {
	        array_push($arrWeeklyData["data"], array(
	            "label" => $rowchart["WeekNumber"],
	            "value" =>$rowchart["OrderAmount"]
	        ));
	    }
	    $jsonEncodedData = json_encode($arrWeeklyData);
	    
	    // creating FusionCharts instance
	    $WeeklyChart = new FusionCharts("line", "orderweekly", "45%", "450", "orderweekly-chart", "json", $jsonEncodedData);
	    
	    // FusionCharts render method
	    $WeeklyChart -> render();
	   }
	 }
	 /* $resultlocation->close(); */
	 $resultweeklychart->close();
?>
	    
<br>
<br>
<div id="orderweekly-chart"; align=center>A beautiful column chart is on its way!</div> 
<div></div>
<div></div>
<div></div>


</div>	
</div>
</div>
</div>
    

<!-- JAVASCRIPTS -->
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>
<script src="layout/scripts/jquery.flexslider-min.js"></script>

<script type="text/javascript" src="../java/fusioncharts.js"></script>
<script type="text/javascript" src="../java/fusioncharts.charts.js"></script>
</body>
</html>
