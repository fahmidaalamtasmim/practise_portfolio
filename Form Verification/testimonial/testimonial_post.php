<?php
session_start();
require '../session_check.php';
require '../db.php';

//$user_id = $_POST['user_id'];
$desp = $_POST['description'];
$name = $_POST['name'];
$position = $_POST['position'];



// $insert_t = "INSERT INTO testimonial(user_id,description,name,position)VALUES($user_id,'$desp','$name','$position')";

$insert_t = "INSERT INTO testimonial(description,name,position)VALUES('$desp','$name','$position')";
mysqli_query($db_connection,$insert_t);


  $last_id = mysqli_insert_id($db_connection);
//   echo $last_id;
//   die();

  $image = $_FILES['image'];

 $after_explode = explode('.', $image['name']);
 $extension = end($after_explode);
  //echo $extension;
  //die();
 $allowed_extension = array('png', 'jpg', 'gif');
 if (in_array($extension, $allowed_extension)) {
     if ($image['size'] <= 1000000) {
         $file_name = $last_id.'.'.$extension;
         
        //  echo $file_name;
        //  die();

         $new_location = 'G:\XMPPPPP\htdocs\web dev 2205\Form Verification\uploads\testimonial/'.$file_name;
         
         move_uploaded_file($image['tmp_name'], $new_location);


         $update_name = "UPDATE testimonial SET image ='$file_name' WHERE id=$last_id ";

         mysqli_query($db_connection, $update_name);
         header('location:testimonial_form.php');

     } else {
         header('location:testimonial_form.php');
     }
 } else {
     header('location:testimonial_form.php');
 }




header('location:testimonial_form.php');
