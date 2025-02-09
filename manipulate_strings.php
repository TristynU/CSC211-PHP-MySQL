<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>String Manipulation Examples</title>
</head>
<body>

<?php

$first_name = "Tristyn";
$last_name = "Urquijo";

// using strcmp() to compare two strings
echo "<h3>Using strcmp()</h3>";
$comparison_result = strcmp($first_name, $last_name);
if ($comparison_result == 0) {
    echo "The names '$first_name' and '$last_name' are equal.<br>";
} elseif ($comparison_result < 0) {
    echo "'$first_name' is less than '$last_name'.<br>";
} else {
    echo "'$first_name' is greater than '$last_name'.<br>";
}
// using str_replace() to replace parts of a string
echo "<h3>Using str_replace()</h3>";
$full_name = $first_name . " " . $last_name;
echo "Original full name: $full_name <br>";

$updated_name = str_replace("Urquijo", "Smith", $full_name);
echo "Updated full name after replacement: $updated_name <br>";

//using substr() to extract parts of a string
echo "<h3>Using substr()</h3>";
$substring = substr($full_name, 0, 4); 
echo "The first 4 characters of '$full_name' are: $substring <br>";

?>

</body>
</html>