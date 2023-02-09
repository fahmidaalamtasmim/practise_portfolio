<?php
 session_start();
 //print_r($_POST);
 //echo $_POST["name"];

 require 'db.php'; //connecting db.php page

 $name = $_POST['name'];
 $email = $_POST['email'];
 $password = $_POST['password'];
 $after_hash = password_hash($password,PASSWORD_DEFAULT);
 $flag = true;

 //preg_match : creates criteria
 $upper = preg_match('@[A-Z]@',$password);//can also be done with php regex
 $lower = preg_match('@[a-z]@',$password);
 $number = preg_match('@[0-9]@',$password);
 $special = preg_match('@[#,%,$,*,^,(,&,)]@',$password);

//empty() : if it is empty | empty or not
// $_SESSION : can send data from one page to another page, a superglobal variable

//name
 if(empty($name)){
    //echo 'Give us your name';
    $_SESSION["name"]='Give us your name';
    $flag = false;
    header('location:register.php');
 } 

 //email
 if(empty($email)){
   $_SESSION["email"]='Give us your email';
   $flag = false;
   header('location:register.php');
}else{
//email format check
if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
   $_SESSION["email"]='format didnt match';
   $flag = false;
   header('location:register.php');
}
}
//password starts
if(empty($password)){
   $_SESSION["password"]='Give us your password';
   $flag = false;
   header('location:register.php');
}else{
   if(!$upper || !$lower || !$number || !$special || strlen($password)<8){
     // echo 'uppper not found';
   $_SESSION['password']='Password must contain one upper case,one lower case,one special char';
   $flag = false;
   header('location:register.php');
   }
}
//password ends

//if all good then it will enter flag
if($flag){

// echo $name;
// echo $email;
// echo $password;

$insert = "INSERT INTO users(name,email,password)VALUES('$name','$email','$after_hash')";

//mysqli_query() requires two things : database connection and the query

mysqli_query($db_connection,$insert);
$_SESSION['success'] = 'Registered successfully';
header('location:register.php');

}
//if any field error occurs, it will enter else clause
else{
   $_SESSION['name_value']=$name;// stores name
   $_SESSION['email_value']=$email;//stores email
   header('location:register.php');

 }



 ?>