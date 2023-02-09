<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        form{
            padding:10px;
        }
        input{
            margin:30px;
            background-color: #C1FFE8;
        }
        .img{
            width:100px;
            height:70px;
           padding:10px;
           /* display:block; */
        }
        .img:hover{
            background:#E4F4EE;
            /* border: 2px solid red; */
            border-radius:   50%;
        }
        .loop{
            background:#C8FCE8;
            display:inline;
            color:green;
        }
        .patn{
            padding:10px;
            margin:30px;
            
        }
        
        
       
    </style>
</head>
<body>



<form action="pattern.php" method ="post">
<input type="number" name="num" placeholder="Enter length">

<form action="pattern.php" method ="post">
<div>
<input type="image" name="i[1]" src="images/i1.png" class="img">
<input type="image" name="i[2]" src="images/i2.png" class="img">
<input type="image" name="i[3]" src="images/i3.png" class="img">
</div>
</form>

<!-- <input type="submit" name="submit" > -->
</form>


<?php

 echo '<div class="patn">';

    if(isset($_POST['i'])){

    foreach ( $_POST['i'] as $key => $value ) {
    // echo 'Image number '.$key.' was clicked.';


     switch ($key) {

        case '1':
            echo '<div class="loop">';
           $num=$_POST['num'];
           
             for($row=0 ; $row<=$num ; $row++){
                 for($col=1;$col<=$row;$col++){
                         echo '*';
                 }echo '<br>';
               } echo '</div>';
            break;



         case '2':
            echo '<div class="loop">';
                $num=$_POST['num'];
                  for($row=$num ; $row>=0 ; $row--){
                      for($col=1;$col<=$row;$col++){
                              echo '*';
                      }echo '<br>';
              }  echo '</div>';
                 break;
          case '3':

            echo '<div class="loop">';

                    $num=$_POST['num'];
                    for($row=0 ; $row<=$num ; $row++){
                        for($col=1;$col<=$row;$col++){  
                                echo '*';
                        }echo '<br>';
                      } 
                      for($row=$num-1 ; $row>=0 ; $row--){
                          for($col=1;$col<=$row;$col++){
                                  echo '*';
                          }echo '<br>';
                  } 
                  echo '</div>';

                     break;
        
        default:
            echo 'Something went wrong :3';
            break;
     }

    }


}
echo '</div>';

?>

    
</body>
</html>