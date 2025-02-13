<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Larry Ullman's Books and Chapters</title>
</head>
<body>
<h1>Some of Larry Ullman's Books</h1>
<?php
$phpvqs = [1 => 'Getting Started with PHP', 'Variables', 'HTML Forms and PHP', 'Using Numbers'];
$phpadv = [1 => 'Advance PHP Techniques', 'Developing Web Applications', 'Advance Database Concepts', 'Basic Object-Oriented Programming'];
$phpmysql = [1 => 'Introduction to PHP', 'Programming with PHP', 'Creating Dynamic Web Sites', 'Introduction to MySQL'];

print "<p>The third chapter of my first book is <i>{$phpvqs[3]}</i>.</p>";
print "<p>The first chapter of my second book is <i>{$phpadv[1]}</i>.</p>";	
print "<p>The fourth chapter of my first book is <i>{$phpmysql[4]}</i>.</p>";

$books = [
    'PHP VQS' => $phpvqs,
    'PHP Advanced' => $phpadv,
    'PHP and MySQL' => $phpmysql
];

foreach ($books as $book => $chapters) {
    print "<h3>$book</h3>";
    foreach ($chapters as $index => $chapter) {
        print "<p>Chapter $index: $chapter</p>";
    }
}
?>
</body>
</html>