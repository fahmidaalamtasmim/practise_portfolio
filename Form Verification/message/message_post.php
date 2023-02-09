<?php 
session_start();
require '../session_check.php';
require '../db.php';

date_default_timezone_set('Asia/Dhaka');
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$date = date("Y-m-d h:i");//can also use varchar  class 15
// echo $date;
// die();

$insert = "INSERT INTO messages(name,email,message,date)VALUES('$name','$email','$message','$date')";
mysqli_query($db_connection,$insert);


$_SESSION['sss']='Done!';

header('location:/web dev 2205/Form Verification/index.php#contact');
// echo "hell";

?>