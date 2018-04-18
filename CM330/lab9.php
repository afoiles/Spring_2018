<?php
require "dbconnect9.php";
print <<<EOT
<html>
<head>
<link rel="stylesheet" type="text/css" href="mystyle.css">
</head>
<body>
<h1>Average Annual Homicide Rate by State<br>1999-2015</h1>
<div>
<table>
<tr><th><a href=lab9.php?column=state>State&#x23f6</a></th><th><a href=lab9.php?column=AVG>AVG&#x23f6</a></th></tr>
EOT;

$field = 'state';
$order = null;

if(isset($_GET['column'])){
	//echo $_GET['column'];
	$field = $_GET['column'];
}

$query = "select state, avg(deaths) as AVG from causes where causenameshort = 'homicide' group by ".$field." ".$order.";";
$result = mysqli_query($link, $query);
while($rows = mysqli_fetch_assoc($result)){
	echo "<tr><td>";
	echo $rows['state'];
	echo "</td><td>";
	echo $rows['AVG'];
	echo "</td></tr>";
}
echo "</table></div>";
?>