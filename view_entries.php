<?php
// Connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'myblog');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Query to get blog entries
$sql = "SELECT id, content, created_at FROM myblog ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Blog Entries</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 10px;
        }
        th {
            background-color: #f4f4f4;
        }
        tr:nth-child(even) {
            background-color: #fafafa;
        }
    </style>
</head>
<body>

<h2>Blog Entries</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Content</th>
        <th>Created At</th>
    </tr>

    <?php
    // Check if we have rows
    if ($result && $result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row["id"]) . "</td>";
            echo "<td>" . nl2br(htmlspecialchars($row["content"])) . "</td>";
            echo "<td>" . htmlspecialchars($row["created_at"]) . "</td>";
            echo "</tr>";
        }

    } else {
        // Empty table case
        echo "<tr><td colspan='3'>No blog entries found</td></tr>";
    }

    // Close connection
    $conn->close();
    ?>
</table>

</body>
</html>