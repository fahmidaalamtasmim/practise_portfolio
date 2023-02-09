<?php
session_start();
require '../db.php';



$logo = $_FILES['logo'];
$after_explode = explode('.',$logo['name']);
$extension = end($after_explode);
$allowed_extension = array('png','jpg','gif','PNG','JPG','webp');
$lname = $logo['name'];

if(in_array($extension,$allowed_extension)){
    if($logo['size']<=1000000){
        $insert = "INSERT INTO logos (logo)VALUES('$lname')";
        mysqli_query($db_connection,$insert);
        $last_id = mysqli_insert_id($db_connection);
        
        //file naming
        $file_name = $last_id.'.'.$extension;
        $new_location ='../uploads/logo/'.$file_name;
        move_uploaded_file($logo['tmp_name'],$new_location);
        $update = "UPDATE logos SET logo='$file_name' WHERE id=$last_id";
        mysqli_query($db_connection,$update);
        header('location:add_logo.php'); 

    }else{
        $_SERVER['error']='File size exceed';
        header('location:add_logo.php'); 
    }

}else{
    $_SERVER['error']='Invalid Extension';
    header('location:add_logo.php');
}
