<?php 
session_start();
require '../db.php';

$id = $_GET['id'];

$select_status = "SELECT * FROM skills WHERE id=$id";
$select_status_res = mysqli_query($db_connection, $select_status);
$after_assoc = mysqli_fetch_assoc($select_status_res);

if($after_assoc['status'] == 1){
    $update = "UPDATE skills SET status=0 WHERE id=$id";
    mysqli_query($db_connection, $update);
    header('location:skill.php');
}
else{
        $update2 = "UPDATE skills SET status=1 WHERE id=$id";
        mysqli_query($db_connection, $update2);
        header('location:skill.php');
}

?>