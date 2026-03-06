<?php // Script 9.7 - welcome.php

// Start the session:
session_start();

// Set the page title and include the header file:
define('TITLE', 'Welcome to the J.D. Salinger Fan Club!');
include('templates/header.html');

// Print a greeting:
print '<h2>Welcome to the J.D. Salinger Fan Club!</h2>';

// Print the user's email:
print '<p>Hello, ' . $_SESSION['email'] . '!</p>';

// Print how long they've been logged in:
date_default_timezone_set('America/New_York');
print '<p>You have been logged in since: ' . date('g:i a', $_SESSION['loggedin']) . '.</p>';

// Make a logout link:
print '<p><a href="logout.php">Logout</a></p>';

include('templates/footer.html');
?>