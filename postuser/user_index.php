<?php

include '../authentication/header.php';

// Start session
if(!isset($_SESSION))
{
session_start(); 
}

// Check if user is logged in
if(isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    //echo 'Hi '. $username . ', welcome to your profile!';

    include '../postAdmin/ConnectLampDB.php';

    $query = mysqli_query($conn, "SELECT * FROM posts") or die(mysqli_error("Can't connect"));

    echo '<p></p>';
    echo '<table border="1">';
    echo '<tr>';
    echo '<th>Title</th><th>Price</th><th>Description</th><th>Email</th><th>Browse posts</th>';
    echo '</tr>';
    while ($result= mysqli_fetch_assoc($query)) {

        //print_r($result);
        //echo '<p></p>';
        // <input type=\"hidden\" name=\"browse\" value=\"" . $result[ID] . "\">

        echo '<tr>';
        echo '<td>' . $result["title"] . '</td>';
        echo '<td>' . $result["price"] . '</td>';
        echo '<td>' . $result["description"] . '</td>';
        echo '<td>' . $result["email"] . '</td>';
        
       echo '<td>' . "<form action=\"browseReviews.php\" method=\"get\">
                   
                        <input type=\"submit\" value=\"Browse\"></form>" . '</td>';
        echo '</tr>';
    }
    echo '</table>';

    echo '<p></p>';

        echo '<a href="homepage_index.html">Return to homepage</a>';

}

?>

