<?php
    include 'header.php';
?>

<h1> Report for Otterstyle Shop</h1>

<?php

$sql = "SELECT AVG(productPrice) FROM product";
  
$sql2 = "SELECT COUNT(*) FROM product";

$sql3 = "SELECT productGender, AVG(productPrice) FROM product GROUP BY productGender";

$host = "localhost";
$dbname = "otterstyle";
$username = "root";
$password = "";
$dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

$dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $dbConn -> prepare($sql);
$stmt -> execute();
$records = $stmt -> fetch();

echo "<br/> <strong>Average Price of All Products:</strong> <br/>";
// print_r($records);
echo "$" . number_format((float)$records['AVG(productPrice)'], 2, '.', '') . "<br/>";

$records = $stmt -> fetchAll(PDO::FETCH_ASSOC);

$stmt = $dbConn -> prepare($sql2);
$stmt->execute();
$records = $stmt -> fetch();

echo "<br/><br/><strong>Count of All Products:</strong><br />";
echo $records['COUNT(*)'] . " products <br/>";

$stmt = $dbConn -> prepare($sql3);
$stmt -> execute();
$records = $stmt -> fetchAll(PDO::FETCH_ASSOC);

echo "<br/><br/><strong>Average Price of Product by Gender</strong> <br />";

foreach($records as $record)
{
    echo $record['productGender'] . ": $" . number_format((float)$record['AVG(productPrice)'], 2, '.', '') . "<br />";
}

?>

<?php
    include 'footer.php';
?>