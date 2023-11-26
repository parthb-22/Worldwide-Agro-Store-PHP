<?php

    $name = $_POST["your_name"];
    $email = $_POST["your_email"];
    $subject = $_POST["your_subject"];

    $servername = "localhost"; //server
    $username = "root"; //username
    $password = ""; //password
    $dbname = "agdb";  //database

    // Create connection
    $db = mysqli_connect($servername, $username, $password, $dbname); // connecting 
    // Check connection
    if (!$db) {       //checking connection to DB	
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql_query = "INSERT INTO contact(your_name,your_email,your_subject,your_message) VALUES('{$name}','{$email}','{$subject}','{$message}')";
    $result_query = mysqli_query($db,$sql_query) or die("Query Failed")
?>