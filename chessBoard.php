<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>



    <table cellpadding="0" cellspacing = "0" border = "1" >


    
    <?php
        for($row = 1;$row<=8;$row++){
            echo '<tr>';
            for($col = 1;$col<=8;$col++){
                $total=$row+$col;
                if($total%2==0){
                 echo '<td width = "40" height = "40" bgcolor="#fff"></td>';
                }else{
                    echo '<td width = "40" height = "40" bgcolor="#000"></td>';
                }
            }
            echo '</tr>';
        }
    ?>



    </table>




</body>
</html>


