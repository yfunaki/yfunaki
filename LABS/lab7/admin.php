<?php
    session_start();
    
    if(!isset($_SESSION['adminName']))
    {
        header("Location:index.php");
    }

    include '../../dbConnection.php';
    
    $conn = getDatabaseConnection("ottermart");
    
    function displayAllProducts()
    {
        global $conn;
        $sql="SELECT * FROM om_product";
        $statement = $conn->prepare($sql);
        $statement->execute();
        $records = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        //print_r($records);
    
        return $records;
    }
    
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Admin Main Page </title>
    </head>
    <style>
        form
        {
            display: inline;
        }
    </style>
    <script>
        function confirmDelete()
        {
                
            return confirm("Are you sure you want to delete this product?");
                
        }
    </script>
    <body>
        <h1> Admin Main Page </h1>
        <h2> Welcome <?= $_SESSION['adminName'] ?>! </h2>
        
        <br/>
        
        <form action = "addProduct.php">
            <input type = "submit" name = "addProduct" value = "Add Product"/>
        </form>
        
        <br/>
        
        <form action="logout.php">
            <input type="submit"  value="Logout"/>
        </form>
        
        <br/>
        
        <?php $records=displayAllProducts();
            foreach($records as $record)
            {
                echo "[<a href = 'updateProduct.php?productId=" . $record['productId'] . "'> Update </a>]";
                //echo "[<a href = 'deleteProduct.php?productId=" . $record['productId'] . "'> Delete </a>]";
                
                
                echo "<form action='deleteProduct.php' onsubmit='return confirmDelete()'>";
                echo "<input type='hidden' name='productId' value= " . $record['productId'] . " />";
                echo "<input type='submit' value='Remove'>";
                echo "</form>";
                
                echo $record['productName'];
                echo '<br/>';
            }
        
        ?>
   
    </body>
</html>