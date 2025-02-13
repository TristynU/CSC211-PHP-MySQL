<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title> Registration</title>
	<style type="text/css"
	media="screen">
		.error { color: red; }
	</style>
</head>
<body>
<h1>Registration Results</h1>
<?php

// error
ini_set('display_errors',0);

$okay = true;

if (empty($_POST['email'])) {
	print '<p class="error">Please
	enter your email address.</p>';
	$okay = false;
}

if (empty($_POST['password'])) {
	print '<p class="error">Please enter your password.</p>';
	$okay = false;
}
if (is_numeric($_POST['year'])) {
	$age = 2016 - $_POST['year'];
} else {
	print '<p class="error">Please
	enter the year you were born as four digits.</p>';
}


if ($okay) {
	print '<p>You have been successfully registered (but not really).</p>';
	print "<p>You will turn $age this year.</p>";
}
?>
</body>
</html>