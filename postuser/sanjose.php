<?php

include '../authentication/header.php';

// Start session
if(!isset($_SESSION))
{
session_start();
}

// Check if user is logged in
if(isset($_SESSION['username'])) {

        include '../postAdmin/ConnectLampDB.php';

        //Browse Post by location
        
        $sql = "SELECT title, price, description, email FROM posts WHERE location_id =1";

        $query = mysqli_query($conn, $sql) or die(mysqli_error("Cant connect"));

        if (mysqli_num_rows($query) > 0) {
   

    // output data of each row


    while ($row = mysqli_fetch_assoc($query)) {

        //echo "Title: " . $row["title"]. "Price: " . $row["price"].  "Description: ". $row["description"]. "Email: " . $row["email"]."<br>";

        echo '<p></p>';
        echo '<table border="1">';
        echo '<tr>';
        echo '<th>Title</th><th>Price</th><th>Description</th><th>Email</th>';
        echo '</tr>';
        

            echo '<tr>';
            echo '<td>' . $row["title"] . '</td>';
            echo '<td>' . $row["price"] . '</td>';
            echo '<td>' . $row["description"] . '</td>';
            echo '<td>' . $row["email"] . '</td>';
            echo '</tr>' ;
            echo '</table>';
      
        
    }
} else {
    echo "0 results";


}
        

        echo '<p></p>';
        echo '<a href="user_index.php">Browse Post</a>';

    }

mysqli_close($conn);
?>