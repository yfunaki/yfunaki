<!DOCTYPE html>
<?php
    include 'inc/functions.php';
?>
<html>
    <head>
        <title> Lab 2: 777 Slot Machine </title>
        <meta charset="utf-8" />
        <style>
            @import url("css/styles.css");
        </style>
    </head>
    <body>
        <div id="main">
        <?php
            play();
        ?>

        <form>
            <input type="submit" value="Spin!"/>
        </form>
        
        </div>
        
        
    </body>
    
    <footer>
            <hr>
            CST 336 Internet Programming 2018&copy; Funaki <br />
            <strong> Disclaimer: </strong> This information on this webpage is used only for academic purposes. <br />
            <img src="img/buddy_verified.png" alt-"Buddy Verified Badge" />
            
        </footer>
        <!-- closing footer -->
</html>