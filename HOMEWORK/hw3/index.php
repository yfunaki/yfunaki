<?php
    $totalPoints = 0;
    
    function checkAnswer1()
    {
        global $totalPoints;
        if(isset($_GET["submit"]))
        {
            if(empty($_GET['answer1']))
            {
                echo "<div> <h3> Please answer this question. You received 0 points. <h3> </div>";
            }
            else if($_GET['answer1'] != 8)
            {
                echo "<div> <h3> Wrong. You receive 0 points. <h3> </div>";
            }
            else
            {
                echo "<div> <h3> Correct! You receive 10 points. <h3> </div>";
                $totalPoints = $totalPoints + 10;
            }
        }
    }
    
    function checkAnswer2()
    {
        global $totalPoints;
        if(isset($_GET["submit"]))
        {
            if($_GET['answer2'] == "")
            {
                echo "<div> <h3> Please answer this question. You received 0 points. <h3> </div>";
            }
            else if($_GET['answer2'] != "Hula")
            {
                echo "<div> <h3> Wrong. You receive 0 points. <h3> </div>";
            }
            else
            {
                echo "<div> <h3> Correct! You receive 10 points. <h3> </div>";
                $totalPoints = $totalPoints + 10;
            }
        }
        
    }
    
    function checkAnswer3()
    {
        global $totalPoints;
        if(isset($_GET["submit"]))
        {
            if($_GET['answer3'] == "")
            {
                echo "<div> <h3> Please answer this question. You received 0 points. <h3> </div>";
            }
            else if($_GET['answer3'] != "Mahalo")
            {
                echo "<div> <h3> Wrong. You receive 0 points. <h3> </div>";
            }
            else
            {
                echo "<div> <h3> Correct! You receive 10 points. <h3> </div>";
                $totalPoints = $totalPoints + 10;
            }
        }
    }
    
    function checkAnswer4()
    {
        global $totalPoints;
        if(isset($_GET["submit"]))
        {
            if($_GET['answer4'] == "")
            {
                echo "<div> <h3> Please answer this question. You received 0 points. <h3> </div>";
            }
            else if($_GET['answer4'] == "aloha" || $_GET['answer4'] == "Aloha")
            {
                echo "<div> <h3> Correct! You receive 10 points. <h3> </div>";
                $totalPoints = $totalPoints + 10;
            }
            else
            {
                echo "<div> <h3> Wrong. You receive 0 points. <h3> </div>";
            }
        }
    }
    
    function checkAnswer5()
    {
        global $totalPoints;
        if(isset($_GET["submit"]))
        {
            if($_GET['answer5'] == "")
            {
                echo "<div> <h3> Please answer this question. You received 0 points. <h3> </div>";
            }
            else if($_GET['answer5'] != "Honolulu")
            {
                echo "<div> <h3> Wrong. You receive 0 points. <h3> </div>";
            }
            else
            {
                echo "<div> <h3> Correct! You receive 10 points. <h3> </div>";
                $totalPoints = $totalPoints + 10;
            }
        }
    }
    
    function displayPoints()
    {
        global $totalPoints;
        if(isset($_GET["submit"]))
        {
            if($totalPoints == 50)
            {
                echo "<div> <h2> You got all of the questions correct! <h2> </div>";
            }
            else if($totalPoints == 40)
            {
                echo "<div> <h2> You got 4 of the questions correct! <h2> </div>";
            }
            else if($totalPoints == 30)
            {
                echo "<div> <h2> You got 3 of the questions correct! <h2> </div>";
            }
            else if($totalPoints == 20)
            {
                echo "<div> <h2> You got 2 of the questions correct! <h2> </div>";
            }
            else if($totalPoints == 10)
            {
                echo "<div> <h2> You got 1 of the questions correct! <h2> </div>";
            }
            else
            {
                echo "<div> <h2> Sorry. You didn't get any of the questions correct. <h2> </div>";
            }
            echo "<div> <h2> You won " . $totalPoints . " points out of 50. <h2> </div>";
        }
    }
    
    function checkCategoryList5($answer5)
    {
        if($answer5 == $_GET['answer5'])
        {
            echo 'selected = "selected"';
        }
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Homework 3: Hawai`i Trivia </title>
        <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Acme" rel="stylesheet">
    </head>
    <style>
        @import url("css/styles.css");
        
    </style>
    
    <body>
        <h1> Hawai`i Trivia </h1>
        
        <form method = "GET">
            <div id = "layoutDiv">
                <legend>1. How many main Hawaiian islands are there?</legend>
                <input type = "text" size = "25" id = "answer1" name = "answer1" placeholder = "Enter a number from 0 to 10" value = "<?= $_GET['answer1']?>">
            </div>
            
            <br/>
            
            <?= checkAnswer1(); ?>
            
            <br/>
            
            <div id = "layoutDiv">
                <legend>2. Hawaiians have their own special type of dance. What is it called?</legend>
                <select name = "answer2">
                    <option value = "" > Select One </option>
                    <option value = "Haole"
                    <?php if(isset($_GET['answer2']) && $_GET['answer2'] == 'Haole') 
                    echo 'selected= "selected"';
                    ?>
                    > Haole </option>
                    <option value = "Hula"
                    <?php if(isset($_GET['answer2']) && $_GET['answer2'] == 'Hula') 
                    echo 'selected= "selected"';
                    ?>
                    > Hula </option>
                    <option value = "Haupia"
                    <?php if(isset($_GET['answer2']) && $_GET['answer2'] == 'Haupia') 
                    echo 'selected= "selected"';
                    ?>
                    > Haupia </option>
                    <option value = "Honu"
                    <?php if(isset($_GET['answer2']) && $_GET['answer2'] == 'Honu') 
                    echo 'selected= "selected"';
                    ?>
                    > Honu </option>
                </select>
            </div>
            
            <br/>
            
            <?= checkAnswer2(); ?>
            
            <br/>
            
            <div id = "layoutDiv">
                <legend>3. What is "thank you" in Hawaiian?</legend>
                <input type = "radio" name = "answer3" id = "answer3" value = "Mahalo" <?= ($_GET['answer3'] == "Mahalo")?"checked":"" ?>>
                <label for = "Mahalo"> Mahalo </label>
                <input type = "radio" name = "answer3" id = "answer3" value = "Aloha" <?= ($_GET['answer3'] == "Aloha")?"checked":"" ?>>
                <label for "Aloha"> Aloha </label>
                <input type = "radio" name = "answer3" id = "answer3" value = "A hui hou" <?= ($_GET['answer3'] == "A hui hou")?"checked":"" ?>>
                <label for "A hui hou"> A hui hou </label>
            </div>
            
            <br/>
            
            <?= checkAnswer3(); ?>
            
            <br/>
            
            <div id = "layoutDiv">
                <legend>4. There is one word that can mean many different things in Hawaiian. <br/>
                This word can mean love, hello, welcome, and goodbye. What is this word?</legend>
                <input type="textarea" name="answer4" rows = "1" columns = "30" placeholder = "Enter word here." value = "<?= $_GET['answer4']?>"/>
            </div>
            
            <br/>
            
            <?= checkAnswer4(); ?>
            
            <br/>
            
            <div id = "layoutDiv">
                <legend>5. What is the capital of Hawai`i?</legend>
                <select name = "answer5">
                    <option value = "" > Select One </option>
                    <option value = "Honolulu"
                    <?php if(isset($_GET['answer5']) && $_GET['answer5'] == 'Honolulu') 
                    echo 'selected= "selected"';
                    ?>
                    > Honolulu </option>
                    <option value = "Hilo"
                    <?php if(isset($_GET['answer5']) && $_GET['answer5'] == 'Hilo') 
                    echo 'selected= "selected"';
                    ?>
                    > Hilo </option>
                    <option value = "Kona"
                    <?php if(isset($_GET['answer5']) && $_GET['answer5'] == 'Kona') 
                    echo 'selected= "selected"';
                    ?>
                    > Kona </option>
                    <option value = "Kahului"
                    <?php if(isset($_GET['answer5']) && $_GET['answer5'] == 'Kahului') 
                    echo 'selected= "selected"';
                    ?>
                    > Kahului </option>
                </select>
            </div>
            
            <br/>
            
            <?= checkAnswer5(); ?>
            
            <br/>
            
            <?= displayPoints(); ?>
            
            <br/>
            
            <div id = "submitDiv">
                <input type = "submit" name = "submit" value = "Submit!"/>
            </div>
            
            <br/>
        </form>
        
    </body>
    
    <footer>
        <hr>
            CST 336 Internet Programming 2018&copy; Funaki <br />
            <strong> Disclaimer: </strong> This information on this webpage is used only for academic purposes. <br />
            <img src="img/buddy_verified.png" alt-"Buddy Verified Badge" />
    </footer>