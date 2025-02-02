<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Your feedback</title>
</head>
<body>
<?php // Script 3.3 handle_form.php

// This page receives the data from feedback.html.
// it will recieve: title, name, email, response, comments, and submit in $_POST.
ini_set('display_errors',1);

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$response = $_POST['response'];
$comments = $_POST['comments'];

print "<p>Thank you, $first_name $last_name, for your comments.</p>";
print "<p>You stated that your found this example to be '$response' and added:<br>$comments</p>";

?>
</body>
</html>