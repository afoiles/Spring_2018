<?php
session_start();
require ("dbconnectCM336.php");
if (!isset($_SESSION['auth']) || $_SESSION['auth']==false || isset($_POST['logout'])){
	$_SESSION['auth']=false;
	header("Location: FinalSQLlogin.php");	
}
if(!isset($_POST['inspector']))
{
    echo <<<HTML
    <html>
    <body>
<link rel="stylesheet" type="text/css" href="CM336style.css">
    <form name='FinalSQLCreateINS.php' action='FinalSQLCreateINS.php' method='POST'>
    <h2>Create New Inspection</h2>
HTML;
    echo "Inspector: <select name='inspector'>";
    $query = "select VMOID, fname, lname from vmo;";
    $result = mysqli_query($link, $query);
    while($rows = mysqli_fetch_assoc($result)){
        echo "<option value='".$rows['VMOID']."'>".$rows['fname']." ".$rows['lname']."</option>";
    }
    echo "</select> Facility: <select name='facility'>";
    $query = "select facilityID, facilityName from facility;";
    $result = mysqli_query($link, $query);
    while($rows = mysqli_fetch_assoc($result)){
        echo "<option value='".$rows['facilityID']."'>".$rows['facilityName']."</option>";
    }
    echo "</select><br><br>";
    echo <<<HTML
    Date Inspected: <input type='date' name='dateINS'>
    Date Submitted: <input type='date' name='dateSUB'> (Optional)<br><br>
    Comments: <br>
    <textarea rows='3' cols='60' name='comment'></textarea><br><br>
    <input type='submit' name='submit' value='Submit'>
HTML;
}
else{
    $query = "INSERT into inspection values ('', '".$_POST['inspector']."', '".$_POST['facility']."', '".$_POST['dateINS']."', '".$_POST['dateSUB']."', '".$_POST['comment']."');";
    if(mysqli_query($link, $query)){
        header("Location: FinalSQLCreateINS.php");
    }
    else{
        header("Location: FinalSQLCreateINS.php");
    }
}
?>