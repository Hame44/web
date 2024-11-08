<?php


    $link = mysqli_connect("localhost", "root", "", "weblabdatabase");


    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    $name = mysqli_real_escape_string($link, $_POST['name']);
    $email_address = mysqli_real_escape_string($link, $_POST['email']);
    $question1 = mysqli_real_escape_string($link, $_POST['question1']);
    $question2 = mysqli_real_escape_string($link, $_POST['question2']);
    $question3 = mysqli_real_escape_string($link, $_POST['question3']);
    

    $sql = "INSERT INTO persons (name, question1,question2,question3,
     email, time) VALUES ('$name', '$question1','$question2','$question3', '$email_address', NOW())";

    if(mysqli_query($link, $sql)){
        echo "Records added successfully.";
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }


    mysqli_close($link);
?>