<?php
// Script: create_table.php
// This script creates the "myblog" table if it does not already exist.

// Include your database connection file:
require_once 'mysqli_connect.php';

// SQL statement to create the table:
$sql = "CREATE TABLE IF NOT EXISTS myblog (
    id INT AUTO_INCREMENT PRIMARY KEY,
    content TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

// Run the query and check for success/failure:
if ($conn->query($sql) === TRUE) {
    echo "<p>Table 'myblog' created successfully.</p>";
} else {
    echo "<p>Error creating table: " . $conn->error . "</p>";
}

// Close the connection:
$conn->close();
?>