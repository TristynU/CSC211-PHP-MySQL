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

$html_post= htmlentities($_POST['posting']);
$strip_post = strip_tags($_POST['posting']);

$words = str_word_count ($posting);
$posting = substr($posting, 0, 50);

print "<div>Thank you, $name, for your posting:<p>$posting</p>
<p>($words words)</p></div>";


print"<div>Thank you, $name, for your posting:
<p>Original: $posting</p>
<p>Entity: $html_post</p>
<p>Stripped: $strip_post</p>
</div>";

?>
</body>
</html>