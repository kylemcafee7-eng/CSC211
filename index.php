<?php
// index.php
include('header.php');
?>

<h2>Enter Your Information</h2>

<form action="process.php" method="post">

    <label>First Name:</label>
    <input type="text" name="first_name" required>

    <label>Last Name:</label>
    <input type="text" name="last_name" required>

    <label>Address:</label>
    <input type="text" name="address" required>

    <label>City:</label>
    <input type="text" name="city" required>

    <label>State:</label>
    <input type="text" name="state" required>

    <label>Phone Number:</label>
    <input type="text" name="phone" required>

    <label>Email Address:</label>
    <input type="email" name="email" required>

    <input type="submit" value="Submit">

</form>

<?php
include('footer.php');
?>