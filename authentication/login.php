<?php


include 'connectDB.php';

// Start the session (DON'T FORGET!!)
if(!isset($_SESSION))
{
session_start();
}

	// That's nice, user wants to login. But lets check if user has filled in all information
	If(empty($_POST['username']) OR empty($_POST['password'])) {
	
		// User hasn't filled it all in!
		echo 'Please fill in all the required fields!';
	
	} else {

		// User filled it all in!

		// Make variables save with addslashes and md5
		$username = mysqli_real_escape_string($conn,$_POST['username']);
		$password = md5($_POST['password']);

		// Search for a combination
		$query = mysqli_query($conn, "SELECT id FROM login
					   WHERE username = '" . $username . "' 
					   AND password = '" . $password . "'
					  ") or die(mysqli_error("Can't find the user"));

		// Save result
		list($user_id) = mysqli_fetch_row($query);

		// If the user_id is empty no combination was found
		if(empty($user_id)) {

			echo 'No combination of username and password found.';

		} else {
		
			// the user_id variable doesn't seem to be empty, so a combination was found!

			// Create new session, store the user id
			$_SESSION['user_id'] = $user_id;
			$_SESSION['username'] = $username;
;

			// Redirect to userpanel.php
			header('location: userpanel.php');
		
		}		
	
	}

?>



