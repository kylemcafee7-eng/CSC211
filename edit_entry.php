<?php
require_once "mysqli_connect.php";

$id = 0;
$content = null;

// If the form was submitted, update the entry
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $id = intval($_POST['id']);
    $content = $_POST['content'];

    $stmt = $conn->prepare("UPDATE myblog SET content=? WHERE id=?");
    $stmt->bind_param("si", $content, $id);
    $stmt->execute();
    $stmt->close();

    header("Location: view_entries.php");
    exit;
}

// If GET request, load the entry to edit
if (isset($_GET['id'])) {

    $id = intval($_GET['id']);

    if ($id > 0) {
        $stmt = $conn->prepare("SELECT content FROM myblog WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->bind_result($content);
        $stmt->fetch();
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Edit Blog Entry</title>
</head>
<body>

<h1>Edit Blog Entry</h1>

<?php if ($id > 0 && $content !== null): ?>

<form action="edit_entry.php" method="post">
    <input type="hidden" name="id" value="<?php echo $id; ?>">

    <p>Entry Text:</p>
    <textarea name="content" cols="60" rows="8"><?php 
        echo htmlspecialchars($content); 
    ?></textarea>

    <br><br>
    <input type="submit" value="Update Entry">
</form>

<?php else: ?>

<p style="color:red;">This page was accessed in error or the entry does not exist.</p>
<p><a href="view_entries.php">Back to Blog Entries</a></p>

<?php endif; ?>

</body>
</html>