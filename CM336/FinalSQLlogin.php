<?php
session_start();
require ("dbconnectCM336.php");
if (!isset($_POST['uname'])){
	$_SESSION = array();
echo <<<HTML
<html>
<body>
<link rel="stylesheet" type="text/css" href="CM336style.css">
<form name='FinalSQLlogin.php' action='FinalSQLlogin.php' method='POST'>
<h2>USDA Live Animal and Animal Product Facility Approval System</h2>
<h3>User Forms</h3>
<br>
<table>
<tr><td>Username: </td><td><input type='text' name='uname'></td></tr>
<tr><td>Password: </td><td><input type='text' name='passw'></td></tr>
<tr><td><input type='submit' name='logbtn' value='Login'></td></tr>
</table>
HTML;
}
else{
	$query = "select password, VMO_VMOID, adminRights from user where userName = '".$_POST['uname']."'";
	$result = mysqli_query($link, $query);
	$rows = mysqli_fetch_assoc($result);
	
if ($_POST['passw'] != $rows['password'])  {
	echo "There was a problem loading your account. <a href=FinalSQLlogin.php>Please login again.</a>";
}else{
	$_SESSION['auth'] = true;
	$_SESSION['vmoID'] = $rows['VMO_VMOID'];
	$_SESSION['user'] = $_POST['uname'];
	$_SESSION['admin'] = $rows['adminRights'];
	header("Location: FinalSQLHome.php");
}
}
?>
