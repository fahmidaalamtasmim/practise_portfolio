<?php
session_start();
require 'db.php';
$email = $_POST['email'];
$password = $_POST['password'];


$select = "SELECT COUNT(*) as gotit FROM users WHERE email='$email'";
$select_res = mysqli_query($db_connection, $select);
$after_assoc = mysqli_fetch_assoc($select_res);
//echo $after_assoc['gotit'];

if ($after_assoc['gotit'] == 1) {
  $select2 = "SELECT * FROM users WHERE email='$email'";
  $select_res2 = mysqli_query($db_connection, $select2);
  $after_assoc2 = mysqli_fetch_assoc($select_res2);
  
  //echo $after_assoc2['password'];
  if (password_verify($password, $after_assoc2['password'])) {
    $_SESSION['login'] = 'loged in';
    $_SESSION['id'] = $after_assoc2['id'];
    header('location:dashboard.php');
  } else {
    // echo 'not matched';
    $_SESSION['wrong_pass'] = 'WRONG PASSWORD!!';

    header('location:login.php');
  }
  //echo 'found it !!!'; 

} else {
  $_SESSION['invalid'] = 'INVALID EMAIL ADDRESS';
  //echo 'Not found it !!!'; 
  header('location:login.php');
}
