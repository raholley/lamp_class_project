<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $conn = mysqli_connect("localhost", "lamp", 1) or
        die ("Hey!, check your server connection.");
        //create the main database if it doesn't already exist
        $create = mysqli_query($conn,"CREATE DATABASE IF NOT EXISTS lamp_final_project")
        or die(mysqli_error($conn, "Could not create database"));
        //make sure our recently created database is the active one
        mysqli_select_db($conn, "lamp_final_project");

        //create "Posts" table
        $posts = "CREATE TABLE posts (post_ID bigint NOT NULL AUTO_INCREMENT PRIMARY KEY,
        title varchar(100),
        price decimal(9,2),
        description text,
        email varchar(90),
        agreement int,
        timestmp timestamp,
        Image_1 blob,
        Image_2 blob,
        Image_3 blob,
        Image_4 blob,
        subcategory_id bigint,
        location_id bigint
        )";
        $results = mysqli_query($conn,$posts) or
          die (mysqli_error($conn));

        //create "SubCategory" table
        $subcat = "CREATE TABLE SubCategory (ID bigint AUTO_INCREMENT PRIMARY KEY,
        category_id bigint,
        SubCategoryName varchar(100)
        )";
         $results = mysqli_query($conn,$subcat) or
        die (mysqli_error($conn));

         //create "Location" table
        $location = "CREATE TABLE Location (ID bigint AUTO_INCREMENT PRIMARY KEY,
        region_id int,
        locationName varchar(100)
        )";
        $results = mysqli_query($conn,$location)
        or die (mysqli_error($conn));

         //create "Category" table
        $category = "CREATE TABLE Category (ID bigint AUTO_INCREMENT PRIMARY KEY,
        categoryName varchar(60)
        )";
        $results = mysqli_query($conn,$category)
        or die (mysqli_error($conn));

        //create "Region" table
        $region = "CREATE TABLE Region (ID bigint AUTO_INCREMENT PRIMARY KEY,
        regionName varchar(80)
        )";
        $results = mysqli_query($conn,$region)
        or die (mysqli_error($conn));

        echo "lamp_final_project Database successfully created!";
        ?>
    </body>
</html>
