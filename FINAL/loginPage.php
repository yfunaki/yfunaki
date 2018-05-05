<?php
    session_start();

    session_destroy();
?>

<?php

    include 'header.php';

?>
    <head>
        <title> Admin Login </title>
        <script>
            $(document).ready( function()
            {
                $("#submit").click(function()
                {
                    var username = $("#username").val();
                    var password = $("#password").val();
                //     if(username = "")
                //     {
                //         $("#usernameMsg").html("Please enter a username.");
                //         $("#usernameMsg").css('color', 'red');
                //         return;
                //     }
                //     else
                //     {
                //       $("#usernameMsg").html("");
                //   }
                //   if (password == "")
                //   {
                //       $("#passwordMsg").html("Please enter a password.");
                //       $("#passwordMsg").css('color', 'red');
                //       return;
                //   }
                //   else
                //   {
                //       $("#passwordMsg").html("");
                //   }
                   $.ajax({
                    type: "GET",
                    url: "loginProcess.php",
                    dataType: "json",
                    data: { "username": username, "password": password},
                    success: function(data,status) {
                    // alert(data);
                        if(data)
                        {
                            
                        }
                        else
                        {
                            
                        }
                    },
                    complete: function(data,status) { //optional, used for debugging purposes
                    //alert(status);
                    }
                    
                    });//ajax
                    
                });
            }); //document.ready
        </script>
    </head>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <body>
        <h1> Otterstyle Shop - Admin Login </h1>
        
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