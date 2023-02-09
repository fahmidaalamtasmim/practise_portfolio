<?php
/* For database connection we need :
   hostname
   hostusername (means database username)
   password
   databasename
*/


$hostname = 'localhost';
$hostuser_name = 'root';//default
$host_password = '';//default
$db_name = 'raze';//database name

//connects this page with database
//takes 4 parameters

$db_connection = mysqli_connect($hostname,$hostuser_name,$host_password,$db_name);

if($db_connection){
  // echo 'done';
}

?>