<?php 
session_start();
require '../db.php';

$id = $_GET['id'];

$select_status = "SELECT * FROM social WHERE id=$id";
$select_status_res = mysqli_query($db_connection, $select_status);
$after_assoc = mysqli_fetch_assoc($select_status_res);

$select_status2 = "SELECT COUNT(*) as total_active FROM social WHERE status=1";
$select_status_res2 = mysqli_query($db_connection, $select_status2);
$after_assoc2 = mysqli_fetch_assoc($select_status_res2);

if($after_assoc['status'] == 1){
    $update = "UPDATE social SET status=0 WHERE id=$id";
    mysqli_query($db_connection, $update);
    header('location:social.php');

    if($after_assoc2['total_active'] == 2){
        $_SESSION['limit'] = 'At least 2 icons must be active';
        $update2 = "UPDATE social SET status=1 WHERE id=$id";
        mysqli_query($db_connection, $update2);
        header('location:social.php');
     } 



}
else{
  
    if($after_assoc2['total_active'] == 4){
        $_SESSION['limit'] = 'You can active maximum 4 icons at the same time';
        header('location:social.php');
     } 
    
    
    else{
        $update2 = "UPDATE social SET status=1 WHERE id=$id";
        mysqli_query($db_connection, $update2);
        header('location:social.php');

       
        
    }}

?>