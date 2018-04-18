<?php
require("../includes/dbconnect.php");
if(!isset($_POST["hidden"])){
	echo "<html><body><form name='titles' action='lab8.php' method='POST'><h2 style='text-align:center' colspan='2'>San Francisco Films</h2><input type='hidden'  name='hidden' value='YES'>";
	echo "<td style='text-align:center' colspan='2'><tr><select name='pulldown'><option selected value='selectMovie'>Select a Movie Title</option>";
	$query = "SELECT DISTINCT Title FROM filmlocations;";
	$result = mysqli_query($link, $query);
	while($rows = mysqli_fetch_assoc($result)){
		printf ("<option value='%s'>%s</option>",htmlspecialchars($rows['Title'],ENT_QUOTES),htmlspecialchars($rows['Title'],ENT_QUOTES));
		#echo addslashes("<option value='".$rows['Title']."'>".$rows['Title']."</option>");
	}
	echo "</select></td>";
	echo "<input type='submit' name='subbutton' value='Search Title' action='lab8.php'></body></html>";
}
else {
	echo "<html><body><form name='titles' action='lab8.php' method='POST'>";
	$query = "SELECT * FROM filmlocations WHERE Title = '".mysqli_real_escape_string($link, $_POST['pulldown'])."';";
	$results = mysqli_query($link, $query);
	$rows = mysqli_fetch_assoc($results);
	echo "<table>";
	echo "<tr><td style='text-align:center' colspan='2'><h2>San Fransisco Films<br>'".$rows['Title']."'</h2></td></tr>";
	if (isset($rows['ProductionCo'])) echo "<tr><th style='text-align:left'>Production Company: </th><td>".$rows['ProductionCo']."</td></tr>";
	if (isset($rows['Distributor'])) echo "<tr><th style='text-align:left'>Distributor: </th><td>".$rows['Distributor']."</td></tr>";
	if (isset($rows['Director'])) echo "<tr><th style='text-align:left'>Director: </th><td>".$rows['Director']."</td></tr>";
	if (isset($rows['Writer'])) echo "<tr><th style='text-align:left'>Writer(s): </th><td>".$rows['Writer']."</td></tr>";
	if (isset($rows['Actor1'])) echo "<tr><th style='text-align:left'>Actor(s): </th><td>".$rows['Actor1']."</td></tr>";
	if (isset($rows['Actor2'])) echo "<tr><th style='text-align:left'></th><td>".$rows['Actor2']."</td></tr>";
	if (isset($rows['Actor3'])) echo "<tr><th style='text-align:left'></th><td>".$rows['Actor3']."</td></tr>";
	echo "<table>";
	echo "<br><br><b>Locations:</b><br>";
	$results = mysqli_query($link, $query);
	while($rows = mysqli_fetch_assoc($results)){
		echo $rows['Locations']."<br>";
	}
	echo "<input type='submit' value='Return'></body></html>";
}
?>