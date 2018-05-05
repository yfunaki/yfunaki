<?php
    session_start();

    session_destroy();
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Admin Login </title>
    </head>
    <style>
        @import url("styles.css");
    </style>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <body>
        <h1> OtterMart - Admin Login </h1>
        
        <form method = "POST" action = "loginProcess.php">
            
            Username: <input type = "text" id = "username" name = "username"/><span id = "usernameMsg"></span> <br/>
            Password: <input type = "password" id = "password" name = "password"/><span id = "passwordMsg"></span> <br/>
            <br/>
            <input type = "submit" id = "submit" name = "submitForm" value = "Login!"/>
        </form>
        
        <?php
            if(isset($_SESSION['wrong']))
            {
                echo $_SESSION['wrong'];
            }
        ?>
        
        <br/>
        
    </body>
    <footer>
        <hr>
            CST 336 Internet Programming 2018&copy; Funaki <br />
            <strong> Disclaimer: </strong> This information on this webpage is used only for academic purposes. <br />
            <img src="img/buddy_verified.png" alt-"Buddy Verified Badge" />
            
    </footer>
</html>