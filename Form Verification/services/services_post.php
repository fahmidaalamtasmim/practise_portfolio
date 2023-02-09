<?php 
session_start();
require '../session_check.php';
require '../db.php';

$icon = $_POST['icon'];
$title = $_POST['title'];
$service = $_POST['service'];

$insert = "INSERT INTO services(icon,title,service)VALUES('$icon','$title','$service')";
mysqli_query($db_connection, $insert);
header('location:services.php');




?>