<?php
// Include your database connection file
include("connection/connect.php"); 
session_start(); 

 // Replace with the actual path

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $your_name = $_POST['your_name'];
    $your_email = $_POST['your_email'];
    $your_subject = $_POST['your_subject'];
    $your_message = $_POST['your_message'];

    // Insert data into the database
    $sql = "INSERT INTO contact (your_name, your_email, your_subject, your_message) VALUES ('$your_name', '$your_email', '$your_subject', '$your_message')";

    if (mysqli_query($db, $sql)) {
        // Data has been successfully inserted
        // You can add a success message or redirect the user to a thank you page.
        // echo "Data has been successfully inserted!";
        echo '<script>alert("Your response is submitted successfully!Thank you for choosing Worldwide Agro Store!");</script>';
        echo '<script>window.location.href = "contact.php";</script>';
    } else {
        // Handle the case where insertion fails
        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
    }
}

// Close the database connection
mysqli_close($db);
?>
