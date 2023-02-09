<?php
//banner information update
session_start();
require '../db.php';
require '../session_check.php';

$subtitle = $_POST['subtitle'];
$title = $_POST['title'];
$description = $_POST['description'];

$update_banner = "UPDATE banners SET subtitle='$subtitle',title='$title',description='$description'";
mysqli_query($db_connection,$update_banner);
header('location:edit_banner.php');




?>
