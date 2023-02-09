<?php 
///////////service
session_start();
require '../session_check.php';
require '../db.php';

$id = $_GET['id'];
$delete = "DELETE FROM counts WHERE id=$id";
mysqli_query($db_connection, $delete);

$_SESSION['delete'] = 'Service Deleted Successfully';
header('location:count.php');

?>