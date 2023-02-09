<!-- 
< ?php
    echo "<div id='demo'></div>";
?>
<script type="text/JavaScript">
  
// Function is called, return 
// value will end up in x
var x = myFunction(11, 10);   
document.getElementById("demo").innerHTML = x;
  
// Function returns the product of a and b
function myFunction(a, b) {
    return a * b;             
}
</script> -->

<html>
    <head>
        <title></title>
        <script type="text/javascript">
            function deleteRecord()
            {
                if (confirm("Do you wanto delete the player?")) {
                    alert("player Deleted");
                }
                else {
                    alert("Record not deleted");
                }
            }
        </script>
    </head>
    <body>
        <a href="delete.php?player_id=<?php echo $player_id ?>" onclick='deleteRecord();'>Delete record?</a>
    </body>
</html>

