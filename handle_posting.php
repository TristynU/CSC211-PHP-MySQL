<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Forum Posting</title>
</head>
<body>
<?php
ini_set('display_errors', 0);

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$posting = nl2br($_POST['posting'], false);

$name = $first_name . ' ' . $last_name;
print "<div>Thank you, $name, for your posting:<p>$posting</p></div>";

$name = urlencode($name);
$email = urlencode($_POST['email']);

print "<p>Click <a href=\"thanks.php?name=$name&email=$email\">here</a> to continue.</p>";
?>
</body>
</html>