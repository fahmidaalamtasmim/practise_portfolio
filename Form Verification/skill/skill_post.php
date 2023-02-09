<?php 
session_start();
require '../session_check.php';
require '../db.php';

$title = $_POST['title'];
$desp = $_POST['description'];
$percentage = $_POST['percentage'];

$insert = "INSERT INTO skills(title,description,percentage)VALUES('$title', '$desp', '$percentage')";
mysqli_query($db_connection, $insert);

header('location:skill.php');

?>