<?php
    session_start();

    session_destroy();
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Admin Login </title>
    </head>
    <body>
        <h1> OtterMart - Admin Login </h1>
        
        <form method = "POST" action = "loginProcess.php">
            
            Username: <input type = "text" name = "username"/> <br/>
            Password: <input type = "password" name = "password"/> <br/>
            
            <input type = "submit" name = "submitForm" value = "Login!"/>
        </form>
        
        <?php
            if(isset($_SESSION['wrong']))
            {
                echo $_SESSION['wrong'];
            }
        ?>
        
        <br/>
        
    </body>
</html>