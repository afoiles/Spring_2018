<?php
session_start();
require ("dbconnectCM336.php");
if (!isset($_SESSION['auth']) || $_SESSION['auth']==false || isset($_POST['logout'])){
	$_SESSION['auth']=false;
	header("Location: FinalSQLlogin.php");	
}
else
{
    echo <<<HTML
    <html>
    <body>
<link rel="stylesheet" type="text/css" href="CM336style.css">
    <form name='FinalSQLView.php' action='FinalSQLHome.php' method='POST'>
HTML;
    $query = "select * from ".$_GET['view'].";";
    $result = mysqli_query($link, $query);
    if($_GET['view'] == 'user'){
        echo "<h2>View Users</h2><table border='1'><tr>";
        echo "<th>User ID</th><th>User Name</th><th>VMO ID</th><th>Admin</th></tr>";
        while($rows = mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td>".$rows['userID']."</td>";
            echo "<td>".$rows['userName']."</td>";
            echo "<td>".$rows['VMO_VMOID']."</td>";
            echo "<td>";
            if($rows['adminRights'] == 1){
                echo "Y";
            }
            else{
                echo "N";
            }
            echo "</td></tr>";
        }
    }
    if($_GET['view'] == 'approval'){
        echo "<h2>View Approvals</h2><table border='1'><tr>";
        echo "<th>Approval ID</th><th>VMO ID</th><th>Inspection ID</th><th>Facility ID</th>";
        echo "<th>Approval Code</th><th>Approval Date</th><th>Pass</th><th>Comments</th></tr>";
        while($rows = mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td>".$rows['ApprovalID']."</td>";
            echo "<td>".$rows['Administrator_VMOID']."</td>";
            echo "<td>".$rows['Inspection_inspectionID']."</td>";
            echo "<td>".$rows['Facility_facilityID']."</td>";
            echo "<td>".$rows['approvalCode']."</td>";
            echo "<td>".$rows['approvalDate']."</td>";
            echo "<td>".$rows['approvalType']."</td>";
            echo "<td>".$rows['approvalComments']."</td>";
            echo "</tr>";
        }
    }
    if($_GET['view'] == 'inspection'){
        echo "<h2>View Inspections</h2><table border='1'><tr>";
        echo "<th>Inspection ID</th><th>Facility ID</th><th>Date Inspected</th><th>Date Submitted</th>";
        echo "<th>Inspection Comments</th></tr>";
	    while($rows = mysqli_fetch_assoc($result)){
		echo "<tr>";
		echo "<td>".$rows['inspectionID']."</td>";
		echo "<td>".$rows['Facility_facilityID']."</td>";
		echo "<td>".$rows['dateInspected']."</td>";
		echo "<td>".$rows['dateSubmitted']."</td>";
		echo "<td>".$rows['inspectionComments']."</td>";
		echo "</tr>";
	    }
    }
    echo "</table>";
	echo "</table><br><input type='submit' name='logout' value='Log out'>";
}
?>