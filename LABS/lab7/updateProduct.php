<?php
    include '../../dbConnection.php';
    
    $conn = getDatabaseConnection("ottermart");
    
    function getProductInfo()
    {
        global $conn;
        
        $sql = "SELECT * FROM om_product WHERE productId = " . $_GET['productId'];
    
        $stmt = $conn -> prepare($sql);
        $stmt -> execute();
        $record = $stmt -> fetch(PDO::FETCH_ASSOC);
        
        return $record;
    }
    
    if(isset($_GET['updateProduct']))
    {
        //echo "Trying to update the product...";
        
        $sql = "UPDATE om_product
                SET productName = :productName,
                    productDescription = :productDescription,
                    productImage = :productImage,
                    price = :price,
                    catId = :catId
                WHERE productId = :productId";
        
        $np = array();
        $np[":productName"] = $_GET['productName'];
        $np[":productDescription"] = $_GET['productDescription'];
        $np[":productImage"] = $_GET['productImage'];
        $np[":price"] = $_GET['price'];
        $np[":catId"] = $_GET['catId'];
        $np[":productId"] = $_GET['productId'];
        
        $stmt = $conn -> prepare($sql);
        $stmt -> execute($np);
    }
    
    if(isset($_GET['productId']))
    {
        $product = getProductInfo();
            
        //print_r($product);
    }

    function getCategory()
    {
        global $conn, $product;
        
        $sql = "SELECT catId, catName FROM om_category ORDER BY catName";
        
        $stmt = $conn -> prepare($sql);
        $stmt -> execute();
        $records = $stmt -> fetchAll(PDO::FETCH_ASSOC);
        
        foreach($records as $record)
        {
            if($record['catId'] == $product['catId'])
            {
                echo "<option selected value = '" . $record['catId'] . "'>" . $record['catName'] . " </option>";
            }
            else
            {
                echo "<option value = '" . $record['catId'] . "'>" . $record['catName'] . " </option>";
            }
        }
    }
    
    // if(isset($_GET['updateProduct']))
    // {
    //     $name = $_GET['productName'];
    //     $description = $_GET['productDescription'];
    //     $price = $_GET['price'];
    //     $url = $_GET['productImage'];
    //     $category = $_GET['catId'];
        
    //     // $sql = "UPDATE om_product(`productName`, `productDescription`, `productImage`, `price`, `catId`)
    //     // VALUES(:name, :description, :url, :price, :category)";
    //     UPDATE om_product SET 
    //     $np = array();
    //     $np[":name"] = $name;
    //     $np[":description"] = $description;
    //     $np[":url"] = $url;
    //     $np[":price"] = $price;
    //     $np[":category"] = $category;
        
    //     $stmt = $conn -> prepare($sql);
    //     $stmt -> execute($np);
    // }
    
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Update Product </title>
    </head>
    <body>
        <h1> Update Product </h1>
        
        <form>
            <input type = "hidden" name = "productId" value = "<?= $product['productId'] ?>"/>
            
            Product Name: <input type = "text" name = "productName" value = "<?= $product['productName'] ?>">
            <br/>
            Product Description:
            <br/>
            <textarea name = "productDescription" rows = "5" cols = "50"><?= $product['productDescription'] ?></textarea>
            <br/>
            Price: <input type = "text" name = "price" value = "<?= $product['price'] ?>">
            <br/>
            Image URL: <input type = "text" name = "productImage" value = "<?= $product['productImage'] ?>">
            <br/>
            Category:
            <select name = "catId">
                <?= getCategory() ?>
            </select>
            <br/>
            <input type = "submit" name = "updateProduct" value = "Update Product">
            <br/>
        </form>
        
    </body>
</html>