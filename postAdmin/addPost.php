<?php

include '../authentication/header.php';

include 'ConnectLampDB.php';

if(empty($_POST['Title']) OR
        empty($_POST['Price']) OR
        empty($_POST['SubCategory']) OR
        empty($_POST['Location']) OR
       empty($_POST['Description']) OR
        empty($_POST['Email']) OR
        empty($_POST['Confirm email']) OR
       empty($_POST['Terms'])) {

        // At least one of the file is empty, display an error
        echo 'You haven\'t filled in all the fields. Please do it again.';
       echo '<p></p>';
       echo '<a href="newpostform.html">Add Post</a>';

    } else {

        // User has filled it all in!

        // SQL save variables
        $subcat = mysqli_real_escape_string($conn,$_POST['SubCategory']);
        $location = mysqli_real_escape_string($conn,$_POST['Location']);
        $title = mysqli_real_escape_string($conn,$_POST['Title']);
        $price = mysqli_real_escape_string($conn,$_POST['Price']);
        $desc = mysqli_real_escape_string($conn,$_POST['Description']);
        $email = mysqli_real_escape_string($conn,$_POST['Email']);
        $confirm = mysqli_real_escape_string($conn,$_POST['Confirm email']);
        $terms = (int)$_POST['Terms'];
        
        mysqli_query($conn,"INSERT INTO posts
                    (title, price, description, email, agreement)
                    VALUES
                    ('" . $title . "', '" . $price . "', '" . $description . "', '" . $email . "', '" . $terms . "')
                    ") or die(mysqli_error($conn));

            echo 'You have successfully added a new Post!<br>';
            echo '<p></p>';
            echo '<a href="postadmin_index.html">Go To Admin Home</a>';
    }

?>

