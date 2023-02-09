<?php

    

        $num =4;
        for($row=1;$row<=$num;$row++){
            for($col=1;$col<=$row;$col++){
                    echo '*';
            }
            echo '<br>';
    } 
    
    
        


?>
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