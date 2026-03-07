<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Add A Quotation</title>
</head>
<body>

<?php
// Script 11.2 - add_quote.php
/* This script displays and handles an HTML form.
   It takes text input and stores it in a text file. */

// Identify the file to use:
$file = '../quotes.txt';

// Check for a form submission:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Check if something was entered:
    if (!empty($_POST['quote']) && ($_POST['quote'] != 'Enter your quotation here.')) {

        // Confirm that the file is writable:
        if (is_writable($file)) {

            // Write the data with exclusive lock:
            file_put_contents(
                $file,
                $_POST['quote'] . PHP_EOL,
                FILE_APPEND | LOCK_EX
            );

            // Print a success message:
            print '<p>Your quotation has been stored.</p>';

        } else {
            // File not writable:
            print '<p style="color:red;">Your quotation could not be stored due to a system error.</p>';
        }

    } else {
        // Nothing entered:
        print '<p style="color:red;">Please enter a quotation!</p>';
    }

} // End of form submission check.
?>

<form action="add_quote.php" method="post">
    <textarea name="quote" rows="5" cols="30">Enter your quotation here.</textarea><br>
    <input type="submit" name="submit" value="Add This Quote!">
</form>

</body>
</html>
