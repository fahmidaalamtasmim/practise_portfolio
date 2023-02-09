<?php
//banner photo upload and update
session_start();
require '../db.php';
require '../session_check.php';

$uploaded_file =$_FILES['photo'];
$after_explode = explode('.',$uploaded_file['name']);
$extension = end($after_explode);
$allowed_extension=array('jpg','JPG','png','PNG','webp','gif');
$file = $uploaded_file['name'];

if(in_array($extension,$allowed_extension)){

    if($uploaded_file['size']<=1000000){
        


        

        ////////////////////////////////////
        $insert="INSERT INTO banner_photos(photo)VALUES('$file')";
        mysqli_query($db_connection,$insert);
        $last_id = mysqli_insert_id($db_connection);
        $file_name = $last_id.'.'.$extension;
        $new_location ='../uploads/banners/'.$file_name;
        move_uploaded_file($uploaded_file['tmp_name'],$new_location);
        $update = "UPDATE banner_photos SET photo = '$file_name' WHERE id =$last_id ";
        mysqli_query($db_connection,$update);
        header('location:edit_banner.php');

    }else{
        $_SESSION['error']="FILE SIZE EXCEED";  
        header('location:edit_banner.php');
    }

}else{
    $_SESSION['error']="INVALID EXTENSION";
    header('location:edit_banner.php');
}
?>