<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>No Soup for You!</title>
</head>
<body>
<h1>Mmm...soups</h1>
<!--  -->
<?php // Script 7.1 - soups1.php
/* This script creates and prints out an array. */

// Create the array: (Thursday through sunday already added)
$soups = [
	'Monday' => 'Clam Chowder',
	'Tuesday' => 'White Chicken Chili',
	'Wednesday' => 'Vegetarian',
	'Thursday' => 'Chicken Noodle',
	'Friday' => 'Gumbo',
	'Saturday' => 'Beef Chili',
	'Sunday' => 'Stone Soup'
	
];	

// Count and pritn the number of elements again:
$count2 = count($soups);
print "<p>After adding 3 more soups,
the array now has $count2 elements.
</p>";

// Print the contents
print_r($soups);
	
?>
</body>
</html>


