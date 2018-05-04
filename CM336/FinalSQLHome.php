<?php
session_start();
require ("dbconnectCM336.php");
if (!isset($_SESSION['auth']) || $_SESSION['auth']==false || isset($_POST['logout'])){
	$_SESSION['auth']=false;
	header("Location: FinalSQLlogin.php");	
}
else
{
	if($_SESSION['admin'] == 0){
echo <<<HTML
<html>
<body>
<link rel="stylesheet" type="text/css" href="CM336style.css">
<form name='FinalSQLHome.php' action='FinalSQLHome.php' method='POST'>
<h2 style='text-align:left'>
HTML;
	echo "Welcome ".$_SESSION['user']."<h2>";
	echo "<table border='1'>";
echo <<<HTML
<tr>
<th>Inspection ID</th>
<th>Facility ID</th>
<th>Date Inspected</th>
<th>Date Submitted</th>
<th>Comments</th>
</tr>
HTML;
	$query = "select * from inspection where inspector_vmoid = '".$_SESSION['vmoID']."';";
	$result = mysqli_query($link, $query);
	while($rows = mysqli_fetch_assoc($result)){
		echo "<tr>";
		echo "<td>".$rows['inspectionID']."</td>";
		echo "<td>".$rows['Facility_facilityID']."</td>";
		echo "<td>".$rows['dateInspected']."</td>";
		echo "<td>".$rows['dateSubmitted']."</td>";
		echo "<td>".$rows['inspectionComments']."</td>";
		echo "</tr>";
	}	
	
	echo "</table><br><input type='submit' name='logout' value='Log out'>";
}
else{
	echo <<<HTML
	<html>
	<body>
<link rel="stylesheet" type="text/css" href="CM336style.css">
	<form name='FinalSQLHome.php' action='FinalSQLHome.php' method='POST'>
	<h2 style='text-align:left'>
HTML;
	echo "Welcome Admin ".$_SESSION['user']."</h2>";
	echo "Choose a function: <br>";
	echo "<a href=FinalSQLCreateINS.php>Create new Inspection</a><br>";
	echo "<a href=FinalSQLView.php?view=approval>View Approvals</a><br>";
	echo "<a href=FinalSQLView.php?view=inspection>View Inspections</a><br>";
	echo "<a href=FinalSQLView.php?view=user>View Users</a><br>";
	echo "</table><br><input type='submit' name='logout' value='Log out'>";
}
}
?>