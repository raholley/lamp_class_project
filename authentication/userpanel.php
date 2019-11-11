<?php

include 'connectDB.php';

// Start session
if(!isset($_SESSION))
{
session_start(); 
}

// Check if user is logged in
if(isset($_SESSION['user_id'])) {

	// User is logged in!
	$query = mysqli_query($conn,"SELECT username FROM login
				   WHERE ID = " . $_SESSION['user_id'] . " LIMIT 1")
				   or die(mysqli_error("Cant connect to the database"));

	list($username) = mysqli_fetch_row($query);


    if ($username == 'admin') {
        header('Location: ../postAdmin/postadmin_index.html');
    } else {
        header('Location: ../postuser/user_index.php');
    }

} else {
	
	// User not logged in
	echo 'Please login before opening the user panel.';

}

?>