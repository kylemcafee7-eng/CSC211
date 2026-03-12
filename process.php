<?php
// process.php
include('header.php');
include('db.php');

// Store data from the form in variables 
$first  = $_POST['first_name'];
$last   = $_POST['last_name'];
$addr   = $_POST['address'];
$city   = $_POST['city'];
$state  = $_POST['state'];
$phone  = $_POST['phone'];
$email  = $_POST['email'];

// store array of input variables as an sql command
$query = "INSERT INTO people (first_name, last_name, address, city, state, phone, email)
          VALUES ('$first', '$last', '$addr', '$city', '$state', '$phone', '$email')";

// php command that connects to the database, then applies the sql statement above
mysqli_query($dbc, $query);

// Confirmation message
echo "<h2>Record Saved</h2>";
echo "<p>Your information has been successfully added to the database.</p>";
echo "<p>You will be redirected to the menu shortly.</p>";

// html meta tag that refreshes the browser, content is the timer, refreshes to url menu.php
echo "<meta http-equiv='refresh' content='2;url=menu.php'>";

include('footer.php');
?>