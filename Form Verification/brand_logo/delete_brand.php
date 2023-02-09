<?php 
///////////logo
session_start();
require '../db.php';

$id = $_GET['id'];

////
$select_img = "SELECT * FROM brand WHERE id=$id";
$result = mysqli_query($db_connection,$select_img);
$after_assoc_img = mysqli_fetch_assoc($result);
$delete_from = '../uploads/brand/'.$after_assoc_img['logo'];
unlink($delete_from);
////

$delete = "DELETE FROM brand WHERE id=$id";
mysqli_query($db_connection, $delete);


header('location:brand.php');

?>