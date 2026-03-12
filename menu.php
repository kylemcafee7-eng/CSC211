<?php
// menu.php
include('header.php');
include('db.php');

// Sql command to take data from the people table 
$query = "SELECT * FROM people";
// applies the command to the database 
$result = mysqli_query($dbc, $query);
?>

<h2>Menu</h2>

<p>Select an action below or choose a record to edit/delete.</p>

<!-- buttons for adding records, showing files and comparing fields-->
<form action="actions.php" method="post">
    <input type="submit" name="action" value="Add Record">
    <input type="submit" name="action" value="Show Files">
    <input type="submit" name="action" value="Compare Fields">
</form>

<hr>

<h3>Current Records</h3>

<table border="1" cellpadding="8" cellspacing="0" style="width:100%; border-collapse:collapse;">
    <tr style="background:#eee;">
        <!-- Need an id variable so that otherwise identical entries could be queried -->
        <th>ID</th>
        <th>First</th>
        <th>Last</th>
        <th>City</th>
        <th>State</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Actions</th>
    </tr>

<?php

// loop through each row returned from the database
while ($row = mysqli_fetch_assoc($result)) {
	
	// prints field per row from the table
    echo "<tr>";
    echo "<td>{$row['id']}</td>";
    echo "<td>{$row['first_name']}</td>";
    echo "<td>{$row['last_name']}</td>";
    echo "<td>{$row['city']}</td>";
    echo "<td>{$row['state']}</td>";
    echo "<td>{$row['phone']}</td>";
    echo "<td>{$row['email']}</td>";
	
    // Edit/Delete buttons for each row
    echo "<td>
            <form action='actions.php' method='post' style='display:inline;'>
                <input type='hidden' name='id' value='{$row['id']}'>
                <input type='submit' name='action' value='Edit'>
            </form>

            <form action='actions.php' method='post' style='display:inline; margin-left:5px;'>
                <input type='hidden' name='id' value='{$row['id']}'>
                <input type='submit' name='action' value='Delete'>
            </form>
          </td>";

    echo "</tr>";
}
?>

</table>

<?php
include('footer.php');
?>