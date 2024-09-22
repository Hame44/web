<?php


    $link = mysqli_connect("localhost", "root", "", "weblabdatabase");


    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    $name = mysqli_real_escape_string($link, $_POST['name']);
    $email_address = mysqli_real_escape_string($link, $_POST['email']);
    $comment = mysqli_real_escape_string($link, $_POST['comment']);
    

    $sql = "INSERT INTO persons (name, comment, email) VALUES ('$name', '$comment', '$email_address')";

    if(mysqli_query($link, $sql)){
        echo "Records added successfully.";
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }


    mysqli_close($link);
?>