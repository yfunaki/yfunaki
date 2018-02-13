<?php
    function getRandomColor() {
    echo "background-color: rgba(".rand(0,255).",".rand(0,255).",".rand(0,255).",".(rand(0,100)/100).");";
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Random Color </title>
        <meta charset="utf-8" />
        
        <style>
        
            body {
                background-color: <?= getRandomColor() ?>;
            }
            
            h2 {
                color: <?= getRandomColor() ?>;
            }
            
        </style>
    </head>
    
    <body>
        <h1> Welcome! </h1>
        <h2> Random Background Color </h2>
    </body>
    
</html>