<?php 
///////////logo
session_start();
require '../db.php';

$id = $_GET['id'];


$delete = "DELETE FROM contact WHERE id=$id";
mysqli_query($db_connection, $delete);

header('location:contact_form.php');

?>