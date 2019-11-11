<?php
// Open a connection to the DB
$conn = mysqli_connect('localhost', 'lamp', 1) or die(mysqli_error("Can't connect"));
mysqli_select_db($conn,'lamp_final_project');
?>