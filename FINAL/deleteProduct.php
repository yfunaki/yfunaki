<?php
    
    include '../../dbConnection.php';
    
    $conn = getDatabaseConnection("otterstyle");
    $sql = "DELETE FROM product WHERE productId = " . $_GET['productId'];
    
    $stmt = $conn -> prepare($sql);
    $stmt -> execute();
    
    header("Location:admin.php");
    
?>