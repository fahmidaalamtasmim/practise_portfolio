<?php 
session_start();
require '../session_check.php';
require '../db.php';

$icon = $_POST['icon'];
$link = $_POST['link'];

$insert = "INSERT INTO social(icon, link)VALUES('$icon','$link')";
mysqli_query($db_connection, $insert);
header('location:social.php');




?>