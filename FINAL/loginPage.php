<?php
    session_start();

    session_destroy();
?>

<?php

    include 'header.php';

?>
    <head>
        <title> Admin Login </title>
    </head>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <body>
        <h1> OtterMart - Admin Login </h1>
        
        <form method = "POST" action = "loginProcess.php">
            
            Username: <input type = "text" name = "username"/> <br/>
            Password: <input type = "password" name = "password"/> <br/>
            <br/>
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
<?php

    include 'footer.php';

?>

</html>