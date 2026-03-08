<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Add a Blog Entry</title>
</head>
<body>

<h1>Add a Blog Entry</h1>

<?php
// Handle the form when submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Connect to the database
    $conn = mysqli_connect('localhost', 'root', '', 'myblog');

    if (!$conn) {
        echo '<p style="color:red;">Database connection failed.</p>';
    } else {

        // Validate input
        $title  = trim($_POST['title'] ?? '');
        $entry  = trim($_POST['entry'] ?? '');

        if ($title !== '' && $entry !== '') {

            // Prepare the insert
			$sql = "INSERT INTO entries (title, entry, date_entered) VALUES (?, ?, NOW())";
            $stmt = $conn->prepare($sql);

            if ($stmt) {
                $stmt->bind_param("ss", $title, $entry);

                if ($stmt->execute()) {
                    echo '<p>The blog entry has been added!</p>';
                } else {
                    echo '<p style="color:red;">Error inserting entry: ' . $stmt->error . '</p>';
                }

                $stmt->close();
            } else {
                echo '<p style="color:red;">Could not prepare statement.</p>';
            }

        } else {
            echo '<p style="color:red;">Please submit both a title and an entry.</p>';
        }

        mysqli_close($conn);
    }
}
?>

<form action="add_entry.php" method="post">
    <p>
        Entry Title:
        <input type="text" name="title" size="40" maxlength="100">
    </p>

    <p>
        Entry Text:<br>
        <textarea name="entry" cols="40" rows="5"></textarea>
    </p>

    <input type="submit" value="Post This Entry!">
</form>

</body>
</html>