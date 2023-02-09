<?php 
///////////logo
session_start();
require '../db.php';

$id = $_GET['id'];

////
$select_img = "SELECT * FROM logos WHERE id=$id";
$result = mysqli_query($db_connection,$select_img);
$after_assoc_img = mysqli_fetch_assoc($result);
$delete_from = '../uploads/logo/'.$after_assoc_img['logo'];
unlink($delete_from);
////

$delete = "DELETE FROM logos WHERE id=$id";
mysqli_query($db_connection, $delete);

$_SESSION['delete'] = 'Logo Deleted Successfully';
header('location:add_logo.php');

?>