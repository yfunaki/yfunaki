<?php
    
    session_start();
    
    //print_r($_POST);  //displays values passed in the form
    
    include '../../dbConnection.php';
    
    $conn = getDatabaseConnection("ottermart");
    
    $username = $_POST['username'];
    $password = sha1($_POST['password']);
    
    //echo $password;
    
    //have to change from '$username' to :username and add named parameters array to prevent SQL injection
    $sql = "SELECT *
            FROM om_admin
            WHERE username = :username
            AND password = :password";
    
    $np = array();
    $np[":username"] = $username;
    $np[":password"] = $password;
    
    $stmt = $conn -> prepare($sql);
    $stmt -> execute($np);
    $record = $stmt -> fetch(PDO::FETCH_ASSOC); //only one single record (fetch() not fetchAll())
    
    //print_r($record);
    
    if(empty($record))
    {
        //echo "Wrong username or password.";
        $_SESSION['wrong'] = "Wrong username and/or password.";
        header("Location:index.php");
    }
    else
    {
        //echo $record['firstName'] . " " . $record['lastName'];
        $_SESSION['adminName'] = $record['firstName'] . " " . $record['lastName'];
        
        header("Location:admin.php");
    }
    
    
?>