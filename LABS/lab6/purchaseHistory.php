<?php
    include '../../dbConnection.php';
    
    $conn = getDatabaseConnection("ottermart");
    
    $productId = $_GET['productId'];
    
    $sql = "SELECT * FROM om_product
            NATURAL JOIN om_purchase
            WHERE productId = :pId";
    
    $np = array();
    $np[":pId"] = $productId;
    
    $stmt = $conn -> prepare($sql);
    $stmt -> execute($np);
    $records = $stmt -> fetchAll(PDO::FETCH_ASSOC);
    
    echo $records[0]['productName'] . "<br/>";
    echo "<img src ='" . $records[0]['productImage'] . "' width = '200' /><br/>";
    
    foreach($records as $record)
    {
        echo "Purchase Date: " . $record['purchaseDate'] . "<br/>";
        echo "Unit Price: " . $record['unitPrice'] . "<br/>";
        echo "Quantity: " . $record['quantity'] . "<br/>";
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Purchase History </title>
        <style>
             @import url("styles.css");
        </style>
    </head>
    <body>
    </body>
    <footer>
        <hr>
            CST 336 Internet Programming 2018&copy; Funaki <br />
            <strong> Disclaimer: </strong> This information on this webpage is used only for academic purposes. <br />
            <img src="img/buddy_verified.png" alt-"Buddy Verified Badge" />
    </footer>
</html>