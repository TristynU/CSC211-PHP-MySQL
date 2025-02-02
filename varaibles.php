<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<tite>Variables</title>
	</head>
	<body>
	<?php // Script 2.3 - variables.php
	
	// The Name
	$first_name = "Tristyn";
	$last_name ="Urquijo";
	$full_name = $first_name." 
	".$last_name;
	
	// An address
	$street = "2004 E Wanda Street";
	$city = "Flagstaff";
	$state = "AZ";
	$zip = "85540";
	
	// The Phone number
	$phone_number = "938-343-3435";
	
	//Print the name:
	print "<p> The name is:<br> $full_name</p>";
	
	//Print the address:
	print "<p>The address is: <br>$street <br>$city $state $zip</p>";
	
		//Print the Phone Number:
	print "<p> The Phone Number is:<br> $phone_number</p>";
	
	?>
	</body>
	</html>