<?php
    session_start();
    
    include '../../dbConnection.php';
    $dbConn = getDatabaseConnection("challenge");

    $check = false;
    $guessCount = array();
    $x = 0;
    
    
if(!isset($_GET['guessNumber']) && $check == false)
{
    $_SESSION['num'] = rand(1,10);
    $_SESSION['attempts'] = 0;
    $check = true;
    Num($guess);
    $x=  $_SESSION['attempts'];
}
    
    
if(isset($_GET['guessNumber']))
{
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
    echo "The correct number is " . $_SESSION['num'] . "</br>";
    $check = false;
}

function Num($guess){
    global $dbConn;
    $num = $_SESSION['num'];
    if(isset($_GET['guessNumber']))
    {
        echo "Number of tries: " . $_SESSION['attempts'];
        echo "<br/>";
    }
    
    
    // echo $num;
    // echo $guess;
    
    if($guess == $num && isset($_GET['guessNumber'])){
    echo "You've guessed the number!<br/>";
        global $guessCount;
         $_SESSION['numberGuessed'][]= $num;
        $_SESSION['totalTries'][] = $_SESSION['attempts']; 
        // guessHistory();
        
        $number = $num;
        $tries = $_SESSION['attempts'];
        
        $sql = "INSERT INTO `guess` (`guessId`, `number`, `attempts`) VALUES (NULL, :number, :tries)";
       
       $np = array();
       $np[":number"] = $number;
       $np[":tries"] = $tries;
       
       $stmt = $dbConn -> prepare($sql);
        $stmt -> execute($np);
    }
    
    else if ($guess < $num && isset($_GET['guessNumber'])){
        echo "Number should be higher. <br/>";
    }
    else if($guess > $num && isset($_GET['guessNumber'])){
        echo "Number should be lower. <br/>";
    }
    
    $_SESSION['attempts'] += 1;
    
}

function guessHistory()
{
    global $dbConn;
    $sql = "SELECT * FROM `guess`";
    
      $stmt = $dbConn->query($sql);	
	  $stmt->execute();
      $records = $stmt->fetchALL(PDO::FETCH_ASSOC);

     foreach($records as $record) {
    echo "You guessed the number " . $record['number'] . " in ". $record['attempts']. " attempts <br />";
}
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
            <br/><br/>
            <input type = "submit" name = "giveup" value = "Give Up">
            <input type = "submit" name = "playAgain" value = "Play Again">
            <br/>
        </form>
        
        <h2> Guesses History </h2>
        <?= guessHistory() ?>
    </body>
</html>