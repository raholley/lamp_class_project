<?php
// Open a connection to the DB
$conn = mysqli_connect('localhost', 'lamp', 1) or die(mysqli_error("Cant connect to database"));
mysqli_select_db($conn,'usersDB');
?>