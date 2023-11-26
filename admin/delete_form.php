<?php
include("../connection/connect.php");
error_reporting(0);
session_start();

mysqli_query($db,"DELETE FROM contact WHERE your_email = '".$_GET['form_del']."'");
header("location:all_contact_forms.php");  

?>