<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Registration</title>
	<style type="text/css" media="screen">
    .error { color: red; }
</style>


</head>
<body>
<h1>Registration Results</h1>
<?php /* Script 6.2 - handle_reg.php
This script receives seven values from register.html:
email, password, confirm, year, terms, color, submit*/

// Error management: 
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Flag variable to track success:
$okay = true;

// Define inherited variables, we're probably gonna do this later, but I needed them for the error handling 
$email    = $_POST['email']    ?? '';
$password = $_POST['password'] ?? '';
$confirm  = $_POST['confirm']  ?? '';
$year     = $_POST['year']     ?? '';
//$terms    = $_POST['terms']    ?? '';
$color    = $_POST['color']    ?? '';



// Populates $errors array with applicable error messages
$errors = [];

if (empty($email)) {
    $errors[] = "Please enter your email."; $okay = false;
}
if (empty($password)) {
    $errors[] = "Please enter a password."; $okay = false;
}
if ($password != $confirm) {
    $errors[] = "Passwords do not match."; $okay = false;
}
if (empty($year)) {
    $errors[] = "Please select a year."; $okay = false;
}
if (!isset($_POST['terms'])) { // Validate terms 
    $errors[] = '<p class="error">You must agree to the terms.</p>'; $okay = false;
}
if ($color == 'red' OR $color == 'yellow' OR $color == 'blue'){
	
	$color_type = 'primary';
	
	} elseif (!($color == 'red' OR $color == 'yellow' OR $color == 'blue') AND !(empty($color))){
	
	$color_type = 'secondary'; 
	
	} else {
    $errors[] = "Please select a color."; $okay = false;
} 


if(is_numeric($year) AND strlen($year) == 4){
	
	if($year < 2026){$age = 2026 - $year; // Calc age this year, I assigned this variable earlier
	} else { // Else for nested condition
	$errors[] = '<p>Either you entered the wrong year or come from the future.</p>'; 
	$okay=false;
	}
	
}  else { // Else for first condition 
	
	print '<p class"error">Please enter the year you were born as four digits</p>';
	$okay = false;
	
}

if (!$okay) {
    echo "<h3 class='error'>There were errors with your submission:</h3>";
    echo "<ul class='error'>";
    foreach ($errors as $msg) { // Enhanced for loop prints contents of errors array 
        echo "<li>$msg</li>";
    }
    echo "</ul>";
}

// If there were no errors, print a success message:
if($okay){
	
	print '<p>You have been successfully registered</p>';
	print "<p>You will turn $age this year.</p>";
	print "<p>Your favorite color is a $color_type color.</p>";
	
}

?>
</body>
</html>