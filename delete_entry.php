<?php
require_once "mysqli_connect.php";

$deleted = false;
$error = "";

// If we have an id via GET, attempt to delete and then redirect
if (isset($_GET['id'])) {

    $id = intval($_GET['id']);

    if ($id > 0) {
        $stmt = $conn->prepare("DELETE FROM myblog WHERE id=?");
        if ($stmt) {
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $stmt->close();

            // Redirect back to the list after delete
            header("Location: view_entries.php");
            exit;
        } else {
            $error = "Could not prepare delete statement.";
        }
    } else {
        $error = "Invalid ID value.";
    }

} else {
    $error = "No ID was provided.";
}

$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Delete Entry</title>
</head>
<body>

<h2>Delete Blog Entry</h2>

<?php if ($error): ?>
    <p style="color:red;"><?php echo htmlspecialchars($error); ?></p>
    <p><a href="view_entries.php">Back to Blog Entries</a></p>
<?php endif; ?>

</body>
</html>