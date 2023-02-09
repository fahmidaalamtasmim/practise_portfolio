<?php 

session_start();
require '../db.php';

$id = $_GET['id'];

////
$select_img = "SELECT * FROM testimonial WHERE id=$id";
$result = mysqli_query($db_connection,$select_img);
$after_assoc_img = mysqli_fetch_assoc($result);
$delete_from = '../uploads/testimonial/'.$after_assoc_img['image'];
unlink($delete_from);
////


$delete = "DELETE FROM testimonial WHERE id=$id";
mysqli_query($db_connection, $delete);

header('location:testimonial_form.php');
?>