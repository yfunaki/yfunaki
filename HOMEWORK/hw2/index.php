<!DOCTYPE html>
<?php

session_start();
session_destroy();
if(!isset($_SESSION['humanTotalWins'])) {
    $_SESSION['humanTotalWins'] = 0;
    $_SESSION['computerTotalWins'] = 0;
}

    function displayHand()
    {
        $symbol = array("rock", "paper", "scissors");
        
        shuffle($symbol);
        
        $chosen = array_shift($symbol);
        
        echo "<img id= 'symbolImg' src='img/$chosen.jpeg' alt='$chosen' title='". ucfirst($chosen)."'/>";
        
        array_push($symbol, $chosen);
        
        switch ($chosen)
        {
            case "rock": return 0;
            break;
            case "paper": return 1;
            break;
            case "scissors": return 2;
            break;
        }
    }
    
    function displayWin($randomValue1, $randomValue2)
    {
        if($randomValue1 == $randomValue2)
        {
            echo "<h2>It's a Tie! </h2>";
        }
        else
        {
            if($randomValue1 == 0 && $randomValue2 == 1) //rock vs paper
            {
                echo "<h2> You lose this round... </h2>";
                $_SESSION['computerTotalWins']++;
            }
            else if($randomValue1 == 0 && $randomValue2 == 2) //rock vs scissors
            {
                echo "<h2> You win this round! </h2>";
                $_SESSION['humanTotalWins']++;
            }
            else if ($randomValue1 == 1 && $randomValue2 == 0) //paper vs rock
            {
                echo "<h2> You win this round! </h2>";
                $_SESSION['humanTotalWins']++;
            }
            else if ($randomValue1 == 1 && $randomValue2 == 2) //paper vs scissors
            {
                echo "<h2> You lose this round... </h2>";
                $_SESSION['computerTotalWins']++;
            }
            else if ($randomValue1 == 2 && $randomValue2 == 0) //scissors vs rock
            {
                echo "<h2> You lose this round... </h2>";
                $_SESSION['computerTotalWins']++;
            }
            else if ($randomValue1 == 2 && $randomValue2 == 1) //scissors vs paper
            {
                echo "<h2> You win this round! </h2>";
                $_SESSION['humanTotalWins']++;
            }
        }
        echo "<h3> User Win Count: " . $_SESSION['humanTotalWins'] . ", Computer Win Count: " . $_SESSION['computerTotalWins'] . "</h3>";
        echo "<br />";
    }
    
    function displayWinner()
    {
        if($_SESSION['humanTotalWins'] < $_SESSION['computerTotalWins'])
        {
            echo "<h1> You lose the game. Better luck next time! </h1>";
        }
        else
        {
            echo "<h1> You win the game. Congratulations! </h1>";
        }
    }
    
    function play()
    {
        while ($_SESSION['humanTotalWins'] < 2 && $_SESSION['computerTotalWins'] < 2)    //wins[0] = user wins[1] = computer
        {
            echo "<h2> User <strong> VS. </strong> Computer </h2>";
            for($x = 1; $x < 3; $x++)
            {
                ${"value" . $x} = displayHand();
            }
            displayWin($value1, $value2);
        }
        displayWinner();
    }
    
    function getRandomColor()
    {
        // $colors = array("#13A5D6", "#D64413", "#A513D6", "000000");
        
        // $chosen = rand(0,3);
        // echo $chosen;
        // return $chosen;
        echo "border-color: rgba(".rand(0,255).", ".rand(0,255)." ,".rand(0,255).",".(rand(0,100)/100).");";
    }
?>

<html>
    <head>
        <title> Homework 2: Rock, Paper, Scissors </title>
        <meta charset="utf-8" />
        <style>
            @import url("styles.css");
            h1
            {
               <?php echo "border-color: rgba(".rand(0,255).", ".rand(0,255)." ,".rand(0,255).",".(rand(0,100)/100).");" ?>; 
            }
        </style>
    </head>
    
    <body>
        <h1> Rock, Paper, Scissors! </h1>
        <h2> Best 2 out of 3 </h2>
        <br/>
        
        <?php
        play();
        
        ?>
        
    </body>
    
    <footer>
        <br />
            <hr>
            CST 336 Internet Programming 2018&copy; Funaki <br />
            <strong> Disclaimer: </strong> This information on this webpage is used only for academic purposes. <br />
            <img src="img/buddy_verified.png" alt-"Buddy Verified Badge" />
    </footer>
    
</html>