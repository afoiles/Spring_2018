<?php
if(!isset($_POST['location']))
echo <<<EOT
<html>
<body>
<form name='assignment2.php' action='assignment2.php' method='POST'>
Location: <input type='text' name='location'> <input type='submit' name='lookup' value='Look it up'>
</body>
</html>
EOT;
else{
	echo "<html><body><form name='assignment2.php' action='assignment2.php' method='POST'>";
  	echo "<iframe width='600' height='450' frameborder='0' style='border:0'";
  	echo "src='https://www.google.com/maps/embed/v1/place?key=AIzaSyAPI73Rinz6rIlLcSIN8x438Mv3LggPGKs&q=".$_POST['location']."' allowfullscreen></iframe>";
  	echo "<br><input type='submit' name='return' value='return'>";
}
?>