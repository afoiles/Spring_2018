<?php
session_start();
require ("../includes/dbconnect10.php");
if (!isset($_POST['uname'])){
	$_SESSION = array();
	// create form for login here
	echo <<<EOT
<html>
<body>
<form name='lab 10a.php' action='lab10a.php' method='POST'>
<h2 style='text-align:left'>
Welcome to the PHP Coder's Club<h2>
Please login
<br><br>
<table>
<tr><td>Username:</td><td><input type='text' name='uname'></td></tr>
<tr><td>Password: </td><td><input type='text' name='passw'></td></tr>
<tr><td><input type='submit' name='logbtn' value='Login'></td></tr>
</table>
<a href=lab10b.php>Click here to create an account</a>
EOT;
}
else{ //process login data to authenticate user

	// make database connection
	//query DB to retrieve encrypted password
	//use md5 function to encrypt password from form 
	// and compare to password read from database 
	$query = "select pass from members where email = '".$_POST['uname']."'";
	$result = mysqli_query($link, $query);
	$rows = mysqli_fetch_assoc($result);
	
if (md5($_POST['passw']) != $rows['pass'])  {
	
	// if passwords don't match or no rows returned from query
    // print error message and present button to return to login page
	echo "There was a problem loading your account. <a href=lab10a.php>Please login again.</a>";
	
}else{

	//LOGIN AUTHENTICATED set $_SESSION['auth']=true and redirect to lab10c.php	
	$_SESSION['auth'] = true;
	header("Location: lab10c.php");
	
}
}
?>
