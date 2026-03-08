<?php
// Connect to database 
require_once "mysqli_connect.php";

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Grab the content from the form
    $entry = $_POST['content'] ?? '';

    // Doesn't try to make an entry if input is empty 
    if (!empty(trim($entry))) {

        // Prepare the SQL insert
        $query = "INSERT INTO myblog (content) VALUES (?)";
        $stmt = $conn->prepare($query);

        // Bind as string 
        $stmt->bind_param("s", $entry);

        // Run the statement and validate success or failure 
        if ($stmt->execute()) {
            echo "<p>Entry saved successfully.</p>";
        } else {
            echo "<p>Error saving entry: " . $stmt->error . "</p>";
        }

        // Clean up
        $stmt->close();
    } else {
        echo "<p>Please write something before submitting.</p>";
    }
}

// Close the DB connection
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Add New Entry</title>
</head>
<body>

<h2>Create a Blog Entry</h2>

<form method="post" action="add_entry.php">
    <textarea name="content" rows="8" cols="60" placeholder="Write your blog entry here..."></textarea>
    <br><br>
    <input type="submit" value="Save Entry">
</form>

</body>
</html>