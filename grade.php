<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        form{
            padding:50px;
            margin:30px;
            position:absolute;
            font-size:20px;
            
        }
        input{
            margin:10px;
            display:block;
            font-size:20px;
            box-sizing:border-box;
        }
        .sub{
            position:relative;
            background:blue;
            color:white;
            font-size:20px;
            float:right;
        }
        p{
            font-size:20px;  
            color:green; 
        }
        div{
            margin:30px;
            padding:10px;
            background:#CCFFCD;
        }
    </style>
</head>
<body>

<form action="grade.php" method="post">
Subject: <input type="text" name="subject" placeholder="Enter subject"><br>
Marks: <input type="text" name="num" placeholder="Enter Marks"><br>
<input type="submit" class="sub"><br>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // collect value of input field
     $s = $_POST["subject"];
     $m = $_POST["num"];

     if (empty($s)||empty($m)) {
      echo $s." , ".$m."<br> are empty</b>";
    } else {
       
       if($m>='90'){
        echo "<div>";
        echo 'Subject : '.$s.'<br>';
        echo 'Grade point : 4.00'.'<br>';
        echo 'Letter grade : A'.'<br>';
        echo "</div>";
       }

       else if($m>='86' && $m<'90'){
        echo "<div>";
        echo 'Subject : '.$s.'<br>';
        echo 'Grade point : 3.67'.'<br>';
        echo 'Letter grade : A-'.'<br>';
        echo "</div>";
       }else if($m>='82' && $m<'86'){
        echo "<div>";
        echo 'Subject : '.$s.'<br>';
        echo 'Grade point : 3.33'.'<br>';
        echo 'Letter grade : A-'.'<br>';
        echo "</div>";

       }else if($m>='78' && $m<'82'){
        echo "<div>";
        echo 'Subject : '.$s.'<br>';
        echo 'Grade point : 3.00'.'<br>';
        echo 'Letter grade : B'.'<br>';
        echo "</div>";
       }else if($m>='74' && $m<'78'){
        echo "<div>";
        echo 'Subject : '.$s.'<br>';
        echo 'Grade point : 2.67'.'<br>';
        echo 'Letter grade : B='.'<br>';
        echo "</div>";
    }else if($m>='62' && $m<'74'){
        echo "<div>";
        echo 'Subject : '.$s.'<br>';
        echo 'Grade point : 2.00'.'<br>';
        echo 'Letter grade : B'.'<br>';
        echo "</div>";
}else if($m>='55' && $m<'62'){
    echo "<div>";
    echo 'Subject : '.$s.'<br>';
    echo 'Grade point : 1.00'.'<br>';
    echo 'Letter grade : D'.'<br>';
    echo "</div>";
}else{
    echo '<div style="background:#F75D59";>';
    echo 'Subject : '.$s.'<br>';
    echo 'Grade point : 0.00'.'<br>';
    echo 'Letter grade : F'.'<br>'; 
    echo '</div>';
}
    }}

?>

</form>
</body>
</html>