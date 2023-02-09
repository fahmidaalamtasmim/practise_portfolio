<?php 
///////////banner photo
session_start();
require '../db.php';

$id = $_GET['id'];

////
$select_img = "SELECT * FROM banner_photos WHERE id=$id";
$result = mysqli_query($db_connection,$select_img);
$after_assoc_img = mysqli_fetch_assoc($result);
$delete_from = '../uploads/banners/'.$after_assoc_img['photo'];
unlink($delete_from);
////


$delete = "DELETE FROM banner_photos WHERE id=$id";
mysqli_query($db_connection, $delete);

$_SESSION['delete'] = 'Photo Deleted Successfully';
header('location:edit_banner.php');

?>