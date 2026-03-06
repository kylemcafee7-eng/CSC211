<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Sticky Text Inputs (with Sizes)</title>
</head>
<body>
<?php // Script 10.3 - sticky2.php
/* This script defines and calls a function that creates a sticky text input
   with an optional size argument. */

// This function makes a sticky text input.
// $name and $label are required; $size is optional (default = 20).
function make_text_input($name, $label, $size = 20) {

    // Begin a paragraph and a label:
    print '<p><label>' . $label . ': ';

    // Begin the input:
    print '<input type="text" name="' . $name . '" size="' . $size . '"';

    // Add the value if the form was submitted:
    if (isset($_POST[$name])) {
        print ' value="' . htmlspecialchars($_POST[$name]) . '"';
    }

    // Complete the input, label, and paragraph:
    print '></label></p>';
}

// Make the form:
print '<form action="" method="post">';

// Create some text inputs with different sizes:
make_text_input('first_name', 'First Name');          // uses default size 20
make_text_input('last_name', 'Last Name', 30);        // custom size
make_text_input('email', 'Email Address', 50);        // custom size

print '<input type="submit" name="submit" value="Register!"></form>';

?>
</body>
</html>