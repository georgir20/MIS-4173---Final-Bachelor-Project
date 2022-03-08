<?php include("fusioncharts.php")?>
<?php 
$db = mysqli_connect('localhost', 'root', '', 'river_runners_1');

$year=date("Y");
//TOTAL CUSTOMERS
 if ($resulttotal = $db->query("SELECT * FROM cust_data ")) {
     
     /* determine number of rows result set */
     $cust_amount = $resulttotal->num_rows;
     
     /* close result set */
     $resulttotal->close();
 }

 //CUSTOMER MONTHLY DEVELOPMENT
 $monthly_query = "SELECT MONTHNAME(date_entry) AS Month, COUNT(cust_id) AS NewCustomerAmount
                   FROM cust_data
                   WHERE YEAR(date_entry)='$year'
                   GROUP BY Month
                   ORDER BY date_entry";
 
 //TOP 5 CUSTOMERS
 $topcust_query = "SELECT first_name, last_name , COUNT(order_data.cust_id) AS OrderAmount
                   FROM cust_data, order_data
                   WHERE cust_data.cust_id = order_data.cust_id
                   GROUP BY first_name
                   ORDER BY order_data.cust_id";

 //CUSTOMER LOCATION
 $location_query1 = "SELECT county, COUNT(cust_id) AS CustomerAmount
                   FROM zip_virginia, cust_data
                   WHERE zipv = zip_cust
                   GROUP BY county
                   ORDER BY cust_id";
 
 $location_query2 = "SELECT county, COUNT(cust_id) AS CustomerAmount
                   FROM zip_virginia, cust_data
                   WHERE zipv = zip_cust
                   GROUP BY county
                   ORDER BY cust_id";

 //CUSTOMER MONTHLY DEVELOPMENT
$monthly_query = "SELECT MONTHNAME(date_entry) AS Month, COUNT(cust_id) AS NewCustomerAmount
                   FROM cust_data
                   WHERE YEAR(date_entry)='$year'
                   GROUP BY Month
                   ORDER BY date_entry";

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
  	<h2 style="margin-top:20px"><b>Customer Analytics</b></h2>
</div>

<div class="wrapper row1">
<div style="height:3000px">
<p></p>

<h1 align=center><b>Total Customers: <?php echo $cust_amount?></b></h1>
<h1 align=center style="margin-top:80px">Top 5 Customers </h1>
 <table style= "width:400px; text-align:center; margin-left:auto; margin-right:auto" >
	<tr>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Order Amount</th>
	</tr>
	<?php 
	if ($resulttop = $db->query($topcust_query)) {
	while ($row = $resulttop->fetch_assoc()) {
	{

	    echo "<tr>";
	    echo"<td>". $row['first_name'] . "</td>";
	    echo "<td>". $row['last_name'] . "</td>";
	    echo "<td>". $row['OrderAmount'] . "</td>";
	    echo "</tr>";
	}
	}
	}
	$resulttop->close();
	?>
</table>
<!--  
<h1 align=center style="margin-top:80px">Location of Customers in Virginia</h1>
<table style= "width:400px; text-align:center; margin-left:auto; margin-right:auto" >
	<tr>
		<th>County</th>
		<th>Customer Amount</th>
	</tr>
	<?php 

	/* if ($resultlocation = $db->query($location_query1)) {
	while ($rowloc = $resultlocation->fetch_assoc()) 
	{

	    echo "<tr>";
	    echo"<td>". $rowloc['county'] . "</td>";
	    echo "<td>". $rowloc['CustomerAmount'] . "</td>";
	    echo "</tr>";
	        
	}
	
	}  */
  
	?>
</table>
-->
<?php 
// Pie Chart for Location Distribution
if ($resultlocationchart = $db->query($location_query2)) {
	while ($rowchart = $resultlocationchart->fetch_assoc())
	   {
	    // creating an associative array to store the chart attributes
	    $arrData = array(
	    "chart" => array(
	    "theme" => "fint",
	    "caption" => "Location Distribution of Customers in Virginia",
	    "captionFontSize" => "20",
	    "paletteColors" => "#A2A5FC, #41CBE3, #EEDA54, #BB423F #,F35685",
	    "baseFont" => "Quicksand, sans-serif",
	    //more chart configuration options
	    )
	    );
	    
	    $arrData["data"] = array();
	    array_push($arrData["data"], array(
	        "label" => $rowchart["county"],
	        "value" =>$rowchart["CustomerAmount"]));
	    
	    // iterating over each data and pushing it into $arrData array
	    while ($rowchart = mysqli_fetch_array($resultlocationchart)) {
	        array_push($arrData["data"], array(
	            "label" => $rowchart["county"],
	            "value" =>$rowchart["CustomerAmount"]
	        ));
	    }
	    $jsonEncodedData = json_encode($arrData);
	    
	    // creating FusionCharts instance
	    $doughnutChart = new FusionCharts("doughnut2d", "locdistchart", "45%", "450", "doughnut-chart", "json", $jsonEncodedData);
	    
	    // FusionCharts render method
	    $doughnutChart -> render();
	   }
	 }
	 /* $resultlocation->close(); */
	 $resultlocationchart->close();
?>
	    
<br>
<br>
<div id="doughnut-chart"; align=center>A beautiful donut chart is on its way!</div> 
<br>
<br>
<!-- 
<h1 align=center style="margin-top:80px">Monthly Development of  New Customers in <?php echo $year?></h1>
<table style= "width:400px; text-align:center; margin-left:auto; margin-right:auto" >
	<tr>
		<th>Month</th>
		<th>Customer Amount</th>
	</tr>
	<?php 
	/* if ($resultmonthly = $db->query($monthly_query)) {
	while ($row = $resultmonthly->fetch_assoc()) 
	{

	    echo "<tr>";
	    echo"<td>". $row['Month'] . "</td>";
	    echo "<td>". $row['NewCustomerAmount'] . "</td>";
	    echo "</tr>";
	}
	}
	
	$resultmonthly->close(); */

	?>
</table>
-->
<?php 
// Column Chart for New Customer Development Monthly
if ($resultmonthlychart = $db->query($monthly_query)) {
	while ($rowcustchart = $resultmonthlychart->fetch_assoc())
	   {
	    // creating an associative array to store the chart attributes
	    $arrcustData = array(
	    "chart" => array(
	    "theme" => "fint",
	    "caption" => "Monthly Development of New Customers",
	    "captionFontSize" => "20",
	    "paletteColors" => "#A2A5FC, #41CBE3, #EEDA54, #BB423F #,F35685",
	    "baseFont" => "Quicksand, sans-serif",
	    "xAxisName"=> "Month",
	    "yAxisName"=> "New Customers",
	    "xAxisNameFontSize"=> "14",
	    "yAxisNameFontSize"=> "14",
	    //more chart configuration options
	    )
	    );
	    
	    $arrcustData["data"] = array();
	    array_push($arrcustData["data"], array(
	        "label" => $rowcustchart["Month"],
	        "value" =>$rowcustchart["NewCustomerAmount"]));
	    
	    // iterating over each data and pushing it into $arrData array
	    while ($rowcustchart = mysqli_fetch_array($resultmonthlychart)) {
	        array_push($arrcustData["data"], array(
	            "label" => $rowcustchart["Month"],
	            "value" =>$rowcustchart["NewCustomerAmount"]
	        ));
	    }
	    $jsonEncodedData = json_encode($arrcustData);
	    
	    // creating FusionCharts instance
	    $barChart = new FusionCharts("column2d", "newcustchart", "45%", "450", "barcust-chart", "json", $jsonEncodedData);
	    
	    // FusionCharts render method
	    $barChart -> render();
	   }
	 }
	 /* $resultlocation->close(); */
	 $resultmonthlychart->close();
?>
<div id="barcust-chart"; align=center>A beautiful bar chart is on its way!</div>
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