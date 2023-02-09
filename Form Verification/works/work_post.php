<?php
session_start();
require '../session_check.php';
require '../db.php';

$user_id = $_POST['user_id'];
$category = $_POST['category'];
$subtitle = $_POST['subtitle'];
$title = $_POST['title'];
$desp = $_POST['description'];

    $insert = "INSERT INTO works(user_id,category,subtitle,title,description)VALUES($user_id,'$category','$subtitle','$title', '$desp')";
     mysqli_query($db_connection, $insert);


$last_id = mysqli_insert_id($db_connection);



$thumbnail = $_FILES['thumbnail'];
$featured_image = $_FILES['featured_image'];

//thumbnail starts

$after_explode = explode('.', $thumbnail['name']);
$extension = end($after_explode);
// echo $extension;
// die();
$allowed_extension = array('png', 'jpg', 'gif');
if (in_array($extension, $allowed_extension)) {
    if ($thumbnail['size'] <= 1000000) {
        $file_name = $last_id . '.' . $extension;
        // echo $file_name;
        // die();
        $new_location = 'G:\XMPPPPP\htdocs\web dev 2205\Form Verification\uploads\work/thumbnail/'.$file_name;
        move_uploaded_file($thumbnail['tmp_name'], $new_location);
        $update_name = "UPDATE works SET thumbnail ='$file_name' WHERE id=$last_id ";

        mysqli_query($db_connection, $update_name);
        header('location:works.php');

    } else {
        header('location:works.php');
    }
} else {
    header('location:works.php');
}
//thumbnail ends

//featured image starts
$after_explode1 = explode('.', $featured_image['name']);
$extension1 = end($after_explode1);

$allowed_extension1 = array('png', 'jpg', 'gif');
if (in_array($extension1, $allowed_extension1)) {
    if ($featured_image['size'] <= 1000000) {
        $file_name1 = $last_id . '.' . $extension1;
        
        $new_location1 = 'G:\XMPPPPP\htdocs\web dev 2205\Form Verification\uploads\work/featured_image/'.$file_name1;
        move_uploaded_file($featured_image['tmp_name'], $new_location1);
        $update_name1 = "UPDATE works SET featured_image ='$file_name1' WHERE id=$last_id ";

        mysqli_query($db_connection, $update_name1);
        header('location:works.php');

    } else {
        header('location:works.php');
    }
} else {
    header('location:works.php');
}

//feature image ends

header('location:works.php');
