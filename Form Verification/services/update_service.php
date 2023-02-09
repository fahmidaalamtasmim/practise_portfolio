<?php


require '../db.php';


$id =$_POST['id'];
$service = $_POST['service'];


$update ="UPDATE services SET service='$service' WHERE id=$id";
mysqli_query($db_connection,$update);
header("location:services.php");




?>
