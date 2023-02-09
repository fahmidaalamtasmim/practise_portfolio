<?php 
session_start();
require '../session_check.php';
require '../db.php';

$icon = $_POST['icon'];
$number = $_POST['number'];
$title = $_POST['title'];


$insert = "INSERT INTO counts(icon,number,title)VALUES('$icon','$number','$title')";
mysqli_query($db_connection, $insert);
header('location:count.php');




?>