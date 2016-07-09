<html>
<!-- Dharmishta Ghosh
	 COMP268-800RL class
	 November 04, 2015
	 pizzaResult.php
-->
<head>
	<title>Lab08 - Forms</title>
	<style>
body{
	background-color:#993388;
	color:white;
	font-family: Tahoma, Arial, sans-serif;
	}
#container{
	
	width: 650px;
	margin: 20px auto;
	padding: 20px;
	border:2px solid #63391D;
	background-color:#000000;
	}
</style>
</head>
<body>
<div id="container">
<pre>
	<h1 style="color:red">Your Pizza Order</h1>
<?php
	extract($_POST);
	switch ($psize) {
		case "7.99":
			$cost = 7.99;
			$pie = "A Small Pie";
			echo "<h2>".$pie."</h2>";
			break;
		case "9.99":
			$cost = 9.99;
			$pie = "A Medium Pie";
			echo "<h2>".$pie."</h2>";
			break;
		case "11.99":
			$cost = 11.99;
			$pie = "A Large Pie";
			echo "<h2>".$pie."</h2>";
			break;
	}
	echo "<br>";
	//print_r($topping);
	$i = 0;
	$j = 1;
	if (isset($topping)) {
		echo "<h3>With the following toppings</h3>";
		while($i < count($topping)) {
			echo "$j".". ".$topping[$i]."<br>";
			$cost = $cost + 0.50;
			$i++;
			$j++;
		}
	}
	else {
		echo "<h3>No Toppings selected</h3>";
	}
	echo "<br>";
	if ($beverage == "") {
		echo "<h3>No beverage</h3>";
		echo "<h3>Total Amount: $".$cost."</h3>";
	}
	elseif ($bevSize == "") 
	{
		echo "<h3>You did not select the size of the beverage</h3>";
		echo "<h3>No beverage</h3>";
		echo "<h3>Total Amount: $".$cost."</h3>";
	}
	else {
		switch ($bevSize) {
			case "3.5":
				echo "<h3>Small ".$beverage."</h3>";
				$cost = $cost + 3.50;
				echo "<h3>Total Amount: $".$cost."</h3>";
				break;
			case "4.5":
				echo "<h3>Medium ".$beverage."</h3>";
				$cost = $cost + 4.50;
				echo "<h3>Total Amount: $".$cost."</h3>";
				break;
			case "5.5":
				echo "<h3>Large ".$beverage."</h3>";
				$cost = $cost + 5.50;
				echo "<h3>Total Amount: $".$cost."</h3>";
				break;
			//default:
			//	echo "No beverage<br>";
			//	echo "<h3>Total Amount: $".$cost."</h3>";
			//	break;
		}
	}
?>
</pre>
</div>
</body>
</html>