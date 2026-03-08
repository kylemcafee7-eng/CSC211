<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Connect to MySQL</title>
</head>
<body>

<?php
// Script 12.2 - mysqli_connect.php
// This script connects to the MySQL database.

// Attempt to connect to MySQL and print out messages:
$conn = @mysqli_connect('localhost', 'root', '', 'myblog');

if ($conn) {
    print '<p>Successfully connected to the database!</p>';
} else {
    print '<p style="color: red;">Could not connect to the database:<br>'
        . mysqli_connect_error() . '.</p>';
    // Stop the script so create_table.php doesn't run with a null connection
    exit();
}
?>

</body>
</html>