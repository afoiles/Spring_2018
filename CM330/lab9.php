<?php
require "dbconnect9.php";
print <<<HTML
<html>
<head>
<link rel="stylesheet" type="text/css" href="mystyle.css">
</head>
<body>
<h1>Average Annual Homicide Rate by State<br>1999-2015</h1>
<div>
<table>
HTML;
if(!isset($_GET['column'])){
	$field = 'state';
	$order = 'asc';
	$stag = "&#x23f6";
	$atag = null;
}
if(isset($_GET['column'])){
	$field = $_GET['column'];
	if($_GET['column'] == $_GET['prevcol']){
		if($_GET['order'] == 'asc'){
			$order = 'desc';
		}
		else{
			$order = 'asc';
		}
	}
	else{
		$order = 'asc';
	}	
}

if($field == 'state'){
	$atag = null;
	if($order == 'desc'){
		$stag = '&#x23f7';
	}
	else{
		$stag = '&#x23f6';
	}
}
else{
	$stag = null;
	if($order == 'desc'){
		$atag = '&#x23f7';
	}
	else{
		$atag = '&#x23f6';
	}
}

echo "<tr><th>";
echo "<a href=lab9.php?column=state&order=".$order."&prevord=".$order."&prevcol=".$field.">State".$stag."</a>";
echo "</th><th>";
echo "<a href=lab9.php?column=Average&order=".$order."&prevord=".$order."&prevcol=".$field.">AVG".$atag."</a>";
echo "</th></tr>";

$query = "select state, avg(deaths) as Average from causes where causenameshort = 'homicide' group by state order by ".$field." ".$order.";";
$result = mysqli_query($link, $query);
while($rows = mysqli_fetch_assoc($result)){
	echo "<tr><td style='text-align:left'>";
	echo $rows['state'];
	echo "</td><td style='text-align:right'>";
	echo number_format($rows['Average'], 2);
	echo "</td></tr>";
}
echo "</table></div>";
?>