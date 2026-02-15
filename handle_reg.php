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
    $errors[] = "Please enter your email.";
}
if (empty($password)) {
    $errors[] = "Please enter a password.";
}
if ($password != $confirm) {
    $errors[] = "Passwords do not match.";
}
if (empty($year)) {
    $errors[] = "Please select a year.";
}
if (empty($terms)) {
    $errors[] = "You must agree to the terms.";
}
if (empty($color)) {
    $errors[] = "Please select a color.";
}
if (!empty($errors)) {
    echo "<h3 class='error'>There were errors with your submission:</h3>";
    echo "<ul class='error'>";
    foreach ($errors as $msg) { // Enhanced for loop prints contents of errors array 
        echo "<li>$msg</li>";
    }
    echo "</ul>";
}

// Flag variable to track success:
$okay = true;

// If there were no errors, print a success message:
if($okay){
	
	print '<p>You have been successfully registered</p>';
	
}

?>
</body>
</html>