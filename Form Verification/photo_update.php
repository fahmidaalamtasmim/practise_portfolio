<?php
//print_r($_FILES['photo']) ;

// Array ( [name] => context.PNG [full_path] 
// =>context.PNG [type] 
// => image/png [tmp_name] 
// => G:\XMPPPPP\tmp\phpF799.tmp [error] 
// => 0 [size] => 34281 )
session_start();
require 'db.php';
$uploaded_file = $_FILES['photo'];
$id = $_POST['id'];
$after_explode = explode('.',$uploaded_file['name']);
$extension = end($after_explode);
$allowed_extension = array('jpg','PNG','gif','png','JPG');
if(in_array($extension , $allowed_extension)){

    if($uploaded_file ['size'] <= 1000000){

        //previous picture delete before update


        
        $select_img = "SELECT * FROM users WHERE id=$id";
        $result = mysqli_query($db_connection,$select_img);
        $after_assoc_img = mysqli_fetch_assoc($result);
        $delete_from = '../uploads/pics/'.$after_assoc_img['photo'];
        unlink($delete_from);

        $file_name = $id . '.' . $extension;
        $new_location = $_SERVER['DOCUMENT_ROOT'].'/web dev 2205/Form Verification/uploads/pics/' . $file_name;
        move_uploaded_file($uploaded_file['tmp_name'], $new_location);
        $update = "UPDATE users SET photo='$file_name' WHERE id=$id";
        mysqli_query($db_connection, $update);
        header('location:profile.php');

    }else{
        $_SESSION['error']='File size limit exceed';
        header('location:profile.php');
       
    
    }

}else{
    $_SESSION['error']='Invalid Extension';
    header('location:profile.php');
}




?>