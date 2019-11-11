<?php


if(isset($_GET['try'])) {
    

    include 'connectDB.php';

    // Yes, the user has clicked on the submit button,
    // let's check if he filled in all the fields
    if(empty($_POST['username']) OR
        empty($_POST['password']) OR
        empty($_POST['email']) ) {

        // At least one of the file is empty, display an error
        echo 'You haven\'t filled in all the fields. Please do it again.';

    } else {

        // User has filled it all in!

        // SQL save variables
        $username = mysqli_real_escape_string($conn,$_POST['username']);
        $password = MD5($_POST['password']);
        $email = mysqli_real_escape_string($conn,$_POST['email']);

        $query = mysqli_query($conn, "SELECT COUNT(id) FROM login
   WHERE username = '" . $username . "'
   OR email = '" . $email . "' ") or die(mysqli_error("Can't connect to the database"));


        list($count) = mysqli_fetch_row($query);

        if($count == 0) {

            // Username and Email are free!
            mysqli_query($conn,"INSERT INTO login
                    (username, password, email)
                    VALUES
                    ('" . $username . "', '" . $password . "', '" . $email . "')
                    ") or die(mysqli_error("Can't connect to database"));

            echo 'You are successfully registered!<br>';
            ?>

        <a href="login.html">Please Click Here to Login</a>

        <?php
        } else {

            // Username or Email already taken
            echo 'Username or Email address already taken!';

        }


    }

}

?>




