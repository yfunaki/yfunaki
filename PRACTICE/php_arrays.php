<?php

    $cards = array("ace", "one", 2);
    
    $cards[] = "jack";
    array_push($cards, "queen", "king");
    
    $cards[2] = "ten";
    
    // print_r($cards);
    
    displayCard();
    
    
    function displayCard()
    {
        global $cards;
        echo "<img src='/CHALLENGES/img/cards/clubs/$cards[2].png'/>";
    }

 
?>



<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>
      
    </body>
</html>