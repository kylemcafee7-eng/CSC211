<?php
// actions.php
include('header.php');
include('db.php');

// store the action sent from menu.php
$action = $_POST['action'];
?>

<h2>Action: <?php echo $action; ?></h2>

<?php

// switch statement to handle all actions, one of many control structures
switch ($action) {

    case 'Add Record':
        ?>

        <!-- form for adding a new record -->
        <form action="actions.php" method="post">
            <p>First Name: <input type="text" name="first_name"></p>
            <p>Last Name: <input type="text" name="last_name"></p>
            <p>Address: <input type="text" name="address"></p>
            <p>City: <input type="text" name="city"></p>
            <p>State: <input type="text" name="state"></p>
            <p>Phone: <input type="text" name="phone"></p>
            <p>Email: <input type="text" name="email"></p>

            <input type="hidden" name="action" value="Update Record">
            <input type="submit" value="Save New Record">
        </form>

        <?php
        break;


    case 'Edit':

        // get record by id
        $id = $_POST['id'];
        $query = "SELECT * FROM people WHERE id = $id";
        $result = mysqli_query($dbc, $query); // my sqli_query is a php function
        $row = mysqli_fetch_assoc($result); // also a function 
        ?>

        <!-- form for editing record -->
        <form action="actions.php" method="post">
            <p>First Name: <input type="text" name="first_name" value="<?php echo $row['first_name']; ?>"></p>
            <p>Last Name: <input type="text" name="last_name" value="<?php echo $row['last_name']; ?>"></p>
            <p>Address: <input type="text" name="address" value="<?php echo $row['address']; ?>"></p>
            <p>City: <input type="text" name="city" value="<?php echo $row['city']; ?>"></p>
            <p>State: <input type="text" name="state" value="<?php echo $row['state']; ?>"></p>
            <p>Phone: <input type="text" name="phone" value="<?php echo $row['phone']; ?>"></p>
            <p>Email: <input type="text" name="email" value="<?php echo $row['email']; ?>"></p>

            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <input type="hidden" name="action" value="Update Record">
            <input type="submit" value="Save Changes">
        </form>

        <?php
        break;


    case 'Update Record':

        // collect form data
        $id     = $_POST['id'] ?? null;
        $first  = $_POST['first_name'];
        $last   = $_POST['last_name'];
        $addr   = $_POST['address'];
        $city   = $_POST['city'];
        $state  = $_POST['state'];
        $phone  = $_POST['phone'];
        $email  = $_POST['email'];

        // update if id exists, otherwise insert
        if ($id) {
			// stores php variables in fields 
            $query = "UPDATE people SET 
                        first_name='$first',
                        last_name='$last',
                        address='$addr',
                        city='$city',
                        state='$state',
                        phone='$phone',
                        email='$email'
                      WHERE id=$id";
        } else {
			// if id doesn't exist uses INSERT INTO to create a new entry
            $query = "INSERT INTO people 
                        (first_name, last_name, address, city, state, phone, email)
                      VALUES 
                        ('$first', '$last', '$addr', '$city', '$state', '$phone', '$email')";
        }

        mysqli_query($dbc, $query);

        echo "<p>Record saved successfully.</p>";
        echo "<meta http-equiv='refresh' content='2;url=menu.php'>";
        break;


    case 'Delete':

        // delete a record
        $id = $_POST['id'];
        $query = "DELETE FROM people WHERE id = $id";
        mysqli_query($dbc, $query);

        echo "<p>Record deleted.</p>";
        echo "<meta http-equiv='refresh' content='2;url=menu.php'>";
        break;


    case 'Show Files':

        echo "<h3>Files in Directory</h3>";

        // stores current directory in an array, so an array is used here  
		// don't need to store the filepath because '.' just defaults to the directory the file is in
        $files = scandir('.');

		// enhanced for loop to print all files
        echo "<ul>";
		
        foreach ($files as $file) {
            echo "<li>$file</li>";
        }
        echo "</ul>";

        break;


case 'Compare Fields':

    // get all state values from the database
    $query = "SELECT state FROM people";
    $result = mysqli_query($dbc, $query);

    // array to store counts
    $stateCounts = array(); // initializing array

    // loop through each row
    while ($row = mysqli_fetch_assoc($result)) {

        $state = strtoupper($row['state']); // modifies strings to uppercase so it's not case sensitive
		
		// takes the first five characters for substring comparison, 
		//no two states have the same first 5 characters, only added this to fulfill requirement
        $sub = substr($state, 0, 5); 

        // if substring not in array, initialize it
        if (!isset($stateCounts[$sub])) {
            $stateCounts[$sub] = 0;
        }

        // add 1 to the count, fulfills the php math requirement
        $stateCounts[$sub] = $stateCounts[$sub] + 1;
    }

    // display results
    echo "<h3>State Substring Occurrences</h3>";

    foreach ($stateCounts as $sub => $count) {
        echo "<p>$sub occurs $count times.</p>"; // concatenates string
    }

    break;
}

include('footer.php');
?>