<?php
$name = "Kyle McAfee";

// Using substr to extract my first name
$firstName = substr($name, 0, 4);

// Extract last name
$lastName = substr($name, -7);

// Replace Kyle with "Mr." 
$formal = str_replace("Kyle", "Mr.", $name);

// Replace "Mc" with "Mac"
$altSpelling = str_replace("Mc", "Mac", $name);


// Counting characters using strlen
$length = strlen($name);


// Output
echo "substr examples:<br>";
echo $firstName . "<br>";
echo $lastName . "<br><br>";

echo "str_replace examples:<br>";
echo $formal . "<br>";
echo $altSpelling . "<br><br>";

echo "strlen example:<br>";
echo "The name '$name' has $length characters.";
?>