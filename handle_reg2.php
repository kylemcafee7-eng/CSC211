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
$terms    = $_POST['terms']    ?? '';
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
if (empty($terms)) {
    $errors[] = "You must agree to the terms."; $okay = false;
}
if (empty($color)) {
    $errors[] = "Please select a color."; $okay = false;
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
	
}

?>
</body>
</html>