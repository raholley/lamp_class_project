<!--
Connect to final lamp project database
-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $connect = mysqli_connect("localhost", "lamp", 1) or
            die ("Hey!, check your server connection.");
        //create the main database if it doesn't already exist
        $create = mysqli_query($connect,"CREATE DATABASE IF NOT EXISTS usersDB")or 
            die(mysqli_error("Can't create database"));
        //make sure our recently created database is the active one
        mysqli_select_db($connect,"usersDB");
        //create "login" table
        $login = "CREATE TABLE login (ID mediumint(9) AUTO_INCREMENT PRIMARY KEY,
        username varchar(255),
        password varchar(40),
        email varchar(255)
        )";
        $results = mysqli_query($connect, $login) or 
            die (mysqli_error("Can't query the database"));
    
        echo "usersDB Database successfully created!";
        ?>
    </body>
</html>