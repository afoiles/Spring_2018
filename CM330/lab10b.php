<?php
session_start();
if (empty($_POST['captcha_code'])){

//declare variables for form data and set to empty
//if $_SESSION variables set, assign values to variable

		


// Add form fields here for new member information ****



//end of form************************************ 


// this is code for the captcha leave as is
print <<< EOT2
<img id="captcha" src="../securimage/securimage_show.php" alt="CAPTCHA Image" />
<br>Enter above code: <input type="text" name="captcha_code" size="10" maxlength="6" /><br>
<a href="#" onclick="document.getElementById('captcha').src = '/securimage/securimage_show.php?' + Math.random(); return false">[ Try A Different Image ]</a>
<br><br><input type="submit" value="Apply" name="submitbtn">
</form>
EOT2;

}
else //Process Form  data
{

// save input data from $_POST to $_SESSION variables******
			
			
	
//************************************************	
// more captcha code to validate entered characters	
	include_once $_SERVER['DOCUMENT_ROOT'] . '/securimage/securimage.php';

	$securimage = new Securimage();
	if ($securimage->check($_POST['captcha_code']) == false) {
		// the code was incorrect
		print "Sorry, incorrect code!";
		print '<form name="return" action="lab10b.php" method="POST">';
		print '<input type="submit" name="subbtn" value="Try Again">';
		print "</form>";
	  
	}else{
		//validate form data
		//check that passwords match? print message => Passwords do not match - Click back button
		//encrypt password
		//connect to database
		//insert data into database 
		//handle duplicate email address
		//clear $_SESSION array
	

	
	
	
		// print success message and clear $_POST
		
		
		//provide a button to send to login page
	

?>