<?php
session_start();
require ("../includes/dbconnect10.php");
//test if authorization has happened
//if not redirect back to login page
if (!isset($_SESSION['auth']) || $_SESSION['auth']==false || isset($_POST['logout'])){
	$_SESSION['auth']=false;
	header("Location: lab10a.php");	
}
else
{
	echo <<<EOT
<html>
<body>
<form name='lab 10c.php' action='lab10a.php' method='POST'>
<h2 style='text-align:left'>
PHP Coder's Club Membership Roster<h2>
<table border='1'>
<tr>
<th>First Name</th>
<th>Last Name</th>
<th>Address</th>
<th>City</th>
<th>State</th>
<th>Zip Code</th>
<th>Phone</th>
<th>Email</th>
</tr>
EOT;
	//Display membership page
	//connect to database
	//query DB and print results in table
	//provide logout button
	$query = "select fname, lname, addr, city, st, zip, ph, email from members;";
	$result = mysqli_query($link, $query);
	while($rows = mysqli_fetch_assoc($result)){
		echo "<tr>";
		echo "<td>".$rows['fname']."</td>";
		echo "<td>".$rows['lname']."</td>";
		echo "<td>".$rows['addr']."</td>";
		echo "<td>".$rows['city']."</td>";
		echo "<td>".$rows['st']."</td>";
		echo "<td>".$rows['zip']."</td>";
		echo "<td>".$rows['ph']."</td>";
		echo "<td>".$rows['email']."</td>";
		echo "</tr>";
	}	
	
	echo "</table><br><input type='submit' name='logoutbtn' value='Log out'>";
}
?>