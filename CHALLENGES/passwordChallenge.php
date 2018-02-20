<?php
$numbers =array(0,1,2,3,4,5,6,7,8,9);
$letters = array("a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z");
$password = array();

$rows = 25;
$cols = 1;
function drawTable($rows, $cols, $password){


for($tr = 1; $tr <= $rows; $tr++){ 
    echo "<table border='0'>"; 
        for($td = 1; $td <= $cols; $td++){ 
               echo "<td align='center'>".$password."</td>"; 
        } 
    echo "</tr>"; 
} 

echo "</table>";
}

function choosePassword()
{
$numbers =array(0,1,2,3,4,5,6,7,8,9);
$letters = array("a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z");
$password = array();
    $length=rand(5,10);
    $numbersTimes = 0;
    
    for($x = 0; $x < $length; $x++)
    {
        if(rand(0,1) == 0)
        {
            if($numbersTimes < 3)
            {
            $password[$x] =  $numbers[rand(0,10)];
            $numbersTimes++;
            }
            else
            {
                 $password[$x]= $letters[rand(0,25)];
            }
            
        }
        else
        {
            $password[$x]= $letters[rand(0,25)];
        }
    
        echo $password[$x]; 
    }

    echo " ";
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <style>
        
        
    </style>
    <body>
        
        <h1> Password Generator </h1>
    
<?php
   
    for($x = 0; $x < 25; $x++)
    {
      $password =  choosePassword();
      drawTable(1,1, $password);
    }

?>
    </body>
</html>