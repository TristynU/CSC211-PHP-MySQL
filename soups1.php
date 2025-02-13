<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>No Soup for You!</title>
</head>
<body>
<h1>Mmmm...soups</h1>
<?php
	$soups = [
		'Monday'=>'Clam Chowder',
		'Tuesday'=>'White Chicken Chili',
		'Wednesday'=>'Vegetarian',
		'Thursday'=>'Chicken Noodle',
		'Friday'=>'Tomato',
		'Saturday'=>'Cream of Broccoli'
	];

foreach ($soups as $day => $soup){
	print "<p>$day: $soup.</p>";
}
?>
</body>
</html>
