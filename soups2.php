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
		'Saturday'=>'Cream of Broccoli',
		'Sunday'=>'Closed'
	];
	
$count1 = count($soups);
print "<p>The soups array originally had $count1 elements.</p>";

$soups['Thursday'] = 'Beef Soup';
$soups['Friday']='Rock Soup';
$soups['Saturday']='Soup Soup';
$soups['Sunday']='NO soup';

$count2 =count($soups);
print "<p>After adding 3 more soups, the array now has $count2 elements.</p>";

foreach ($soups as $day => $soup){
	print "<p>$day: $soup.</p>";
}
?>
</body>
</html>
