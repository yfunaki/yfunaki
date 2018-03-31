<?php
    session_start();
    
    include '../../dbConnection.php';
    
    $conn = getDatabaseConnection("ottermart");
    
    function displayAllProducts()
    {
        global $conn;
        
        $sql = "SELECT `productName`, `price`, `productDescription` FROM `om_product` ORDER BY productName";
        
        $stmt = $conn -> prepare($sql);
        $stmt -> execute();
        $records = $stmt -> fetchAll(PDO::FETCH_ASSOC);
        
        foreach($records as $record)
        {
            echo $record["productName"] . " " . $record['productDescription'] . " $" . $record['price'] . "<br/>";
        }
        
    }
    
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Admin Main Page </title>
    </head>
    <body>
        <h1> Admin Main Page </h1>
        <h2> Welcome <?= $_SESSION['adminName'] ?>! </h2>
        
        <br/>
        
        <?= displayAllProducts() ?>
        
    </body>
</html>