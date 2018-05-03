<?php
    
    session_start();

    if(!isset($_SESSION['adminName']))
    {
        header("Location:index.php");
    }
    
    include '../../dbConnection.php';
    
    $conn = getDatabaseConnection("otterstyle");
    
    function getCategory()
    {
        global $conn;
        
        $sql = "SELECT catId, catName FROM category ORDER BY catName";
        
        $stmt = $conn -> prepare($sql);
        $stmt -> execute();
        $records = $stmt -> fetchAll(PDO::FETCH_ASSOC);
        
        foreach($records as $record)
        {
            echo "<option value = '" . $record['catId'] . "'>" . $record['catName'] . " </option>";
        }
    }
    
    if(isset($_GET['submit']))
    {
        $name = $_GET['productName'];
        $description = $_GET['productDescription'];
        $price = $_GET['price'];
        $url = $_GET['productImage'];
        $category = $_GET['catId'];
        $size = $_GET['size'];
        $gender = $_GET['gender'];
        
        $sql = "INSERT INTO product(`productName`, `productDescription`, `productImage`, `productPrice`, `productSize`, `catId`, `productGender`)
        VALUES(:name, :description, :url, :price, :size, :category, :gender)";
        
        $np = array();
        $np[":name"] = $name;
        $np[":description"] = $description;
        $np[":url"] = $url;
        $np[":price"] = $price;
        $np[":size"] = $size;
        $np[":category"] = $category;
        $np[":gender"] = $gender;
        
        $stmt = $conn -> prepare($sql);
        $stmt -> execute($np);
        // echo "return confirm(Product added!)";
        
        header("Location:admin.php");
    }
?>

<?php
include 'header.php';
?>
<!--<!DOCTYPE html>-->
<!--<html>-->
<!--    <head>-->
<!--        <title> Add Product </title>-->
<!--    </head>-->
<!--    <style>-->
<!--        @import url("styles.css");-->
<!--    </style>-->
<!--    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">-->
<!--    <body>-->
        <h1> Add Product </h1>
        
        <form>
            Product Name: <input type = "text" name = "productName">
            <br/>
            Product Description:
            <br/>
            <textarea name = "productDescription" rows = "5" cols = "50">Enter description here.</textarea>
            <br/>
            Price: <input type = "text" name = "price">
            <br/>
            Image URL: <input type = "text" name = "productImage">
            <br/>
            Size:
            <select name = "size">
                <option value = "">Select One</option>
                <option value = "S">Small</option>
                <option value = "M">Medium</option>
                <option value = "L">Large</option>
                <option value = "One Size">One Size</option>
            </select>
            <br/>
            Category:
            <select name = "catId">
                <option value = "">Select One</option>
                <?= getCategory() ?>
            </select>
            <br/>
            Gender:
            <select name = "gender">
                <option value = "">Select One</option>
                <option value = "Male">Male</option>
                <option value = "Female">Female</option>
            </select>
            <br/>
            <input type = "submit" name = "submit">
            <br/>
        </form>
    </body>
<?php
include 'footer.php';
?>
</html>