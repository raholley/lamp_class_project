<!-- 
    Document   : LAMP final project search.php 
    Created on : Feb 10, 2019, 10:47 PM
    Author     : Ruth Holley
-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
         <title>Search</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="style.css"/>
     </head>
    <body>
    	<?php
    	// Open a connection to the DB
        
        $connect = mysqli_connect("localhost", "lamp", 1) or
        die ("Hey!, check your server connection.");
        //make sure our Lamp class database is the active one
        mysqli_select_db($connect,"lamp_final_project");

        // gets value sent over search form
        $query = $_GET['query']; 
     
    $min_length = 3;
    // you can set minimum length of the query if you want
     
    if(strlen($query) >= $min_length){ // if query length is more or equal minimum length then
         
        $query = htmlspecialchars($query); 
        // changes characters used in html to their equivalents, for example: < to &gt;
         
        $query = mysqli_real_escape_string($connect, $query);
        // makes sure nobody uses SQL injection
         
        $raw_results = mysqli_query($connect, "SELECT * FROM Location 
 	WHERE (`locationName` LIKE '%".$query."%') OR (`locationName` LIKE '%".$query."%')") or die(mysqli_error($connect)); 
             
        // * means that it selects all fields, you can also write: `id`, `title`, `text`
        // articles is the name of our table
         
        // '%$query%' is what we're looking for, % means anything, for example if $query is Hello
        // it will match "hello", "Hello man", "gogohello", if you want exact match use `title`='$query'
        // or if you want to match just full word so "gogohello" is out use '% $query %' ...OR ... '$query %' ... OR ... '% $query'
         
        if(mysqli_num_rows($raw_results) > 0){ // if one or more rows are returned do following
             
            while($results = mysqli_fetch_array($raw_results)){
            // $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop
             
                echo "<p><h3>".$results['locationName']."</h3>".$results['locationName']."</p>";
                // posts results gotten from database(title and text) you can also show id ($results['id'])
            }
             
        }
        else{ // if there is no matching rows do following
            echo "No results";
        }
         
    }
    else{ // if query length is less than minimum
        echo "Minimum length is ".$min_length;
    }
?>
</body>
</html>










































     