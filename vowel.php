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
            font-size:20px;
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
    </style>
</head>
<body>

<form action="vowel.php" method="post">
Alphabet: <input type="text" name="char" placeholder="Enter any alphabet"><br>
<input type="submit" class="sub"><br>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // collect value of input field
     $c = $_POST["char"];

     if (empty($c)) {
      echo $c."<b>is empty</b>";
    } else {
       
        switch ($c) {
            case 'a':
                
                echo '<b style="color:green;">VOWEL</b>';
                break;
            case 'e':
                
                echo '<b style="color:green;">VOWEL</b>';
                break;
                
            
            case 'i':
                
                echo '<b style="color:green;">VOWEL</b>';
                break;
                
            
            case 'o':
                
                echo '<b style="color:green;">VOWEL</b>';
                break;
                
            
            case 'u':
                
                echo '<b style="color:green;">VOWEL</b>';
                break;
                
            
            default:
              echo '<b style="color:red;">CONSONANT</b>';
                break;
        }

    }

}


?>

</form>
</body>
</html>