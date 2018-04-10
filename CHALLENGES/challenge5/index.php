<?php
    session_start();
    
    $check = false;
    $guessCount = array();
    $x = 0;
    
if(!isset($_GET['guessNumber']) && $check == false)
{
    $num = rand(1,10);
    echo $num;
    $_SESSION['attempts'] = 0;
    $check = true;
    Num($guess);
    $x=  $_SESSION['attempts'];
}
    
    
if(isset($_GET['guessNumber']))
{
    $num = rand(1,10);
    $check = true;
    $guess = $_GET['guess'];
    
    Num($guess);
}

if (isset($_GET['playAgain'])){
    $check = false;
    $_SESSION['attempts'] = 0;
    
}

if(isset($_GET['giveup']))
{
    
}

function Num($guess){
    global $num, $x;
    echo "Number of tries: " . $_SESSION['attempts'];
    echo "<br/>";
    
    echo $num;
    echo $guess;
    
    if($guess == $num){
    echo "You've guessed the number!";
        global $guessCount;
        $guessCount[$x] = "You guessed the number " . $num . " in " . $_SESSION['attempts'] . " attempts. <br/>";;
       // $x += 1;   
    }
    
    else if ($guess < $num){
        echo "Number should be higher";
    }
    else {
        echo "Number should be lower";
    }
    
    $_SESSION['attempts'] += 1;
    
}

function guessHistory()
{
    global $num;
    //echo "You guessed the number " . $num . " in " . $ . " attempts. <br/>";
}

?>



<!DOCTYPE html>
<html>
    <head>
        <title> </title>
        <h1>Guess a number between 1 and 10!</h1>
    </head>
    <body>
        <form>
            Guess: <input type = "text" name = "guess">
            <br/>
            <input type = "submit" name = "guessNumber" value = "Guess Number">
            <br/>
            <input type = "submit" name = "giveup" value = "Give Up">
            <input type = "submit" name = "playAgain" value = "Play Again">
            <br/>
        </form>
        
        <h2> Guesses History </h2>
        <?= guessHistory() ?>
    </body>
</html>