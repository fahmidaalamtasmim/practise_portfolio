<?php
session_start();
require '../db.php';



$title = $_POST['title'];
$address = $_POST['address'];
$email = $_POST['email'];
$phone = $_POST['phone'];


        $insert = "INSERT INTO contact(title,address,email,phone)VALUES('$title','$address','$email','$phone')";
        mysqli_query($db_connection,$insert);
        header('location:contact_form.php');
?>