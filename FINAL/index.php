<?php 

include '../dbConnection.php';
$dbConn = getDatabaseConnection("otterstyle");

session_start();

// if(!isset($_SESSION['cart']))
// {
//     $_SESSION['cart'] = array();
// }
 
// if(isset($_POST['productName']))
// {
//     $newItem = array();
//     $newItem['name'] = $_POST['productName'];
//     $newItem['price'] = $_POST['productPrice'];
//     $newItem['size'] = $_POST['productSize'];
//     $newItem['id'] = $_POST['productId'];
    
//     foreach($_SESSION['cart'] as &$item)
//     {
//         if($newItem['id'] == $item['id'])
//         {
//             $item['quantity'] += 1;
//             $found = true;
//         }
//     }
    
//     if($found != true)
//     {
//         $newItem['quantity'] = 1;
//         array_push($_SESSION['cart'], $newItem);
//     }
// }   

function display(){
    global $dbConn;
    // if($_GET['query']!= "" && $_GET['category']=="" && $_GET['price']=="" && $_GET['gender']==""){
    //     $proName = $_GET['query'];
    //       $sql = "SELECT * FROM `product` WHERE productName LIKE '%$proName%'";
		  //      $stmt = $dbConn->query($sql);	
		  //      $stmt->execute();
    //             $records = $stmt->fetchALL(PDO::FETCH_ASSOC);
    //     echo "<table border=1 id='customer'>";
    //     echo "<tr>";
    //     echo "<th>Item Name</th>";
    //     echo "<th>Price</td>";
    //     echo "<th> Size</th>";
    //     echo "<th>More Info</th>";
    //     echo "<th>Checkout</th>";
    //     echo "</tr>";
    
    // foreach($records as $record){
    //     $productName = $record['productName'];
    //     $productPrice = $record['productPrice'];
    //     $productSize = $record['productSize'];
    //     $productId = $record['productId'];
                
    //     echo "<tr>";
    //     echo "<td>" . $productName . "</td> ";
    //     echo "<td>$" . $productPrice . "</td>";
    //     echo "<td>" . $productSize . "</td>";
    //     echo "<td>";
    //     echo "<a href='./moreinfo.php?productId=" . $record['productId'] . "' target='_blank'>More Info";
    //     echo "</td>";
        
    //     echo "<form method = 'post'>";
    //         echo "<input type = 'hidden' name = 'productName' value = '$productName'>";
    //         echo "<input type = 'hidden' name = 'productPrice' value = '$productPrice'>";
    //         echo "<input type = 'hidden' name = 'productSize' value = '$productSize'>";
    //         echo "<input type = 'hidden' name = 'productId' value = '$productId'>";
            
    //         if($_POST['productId'] == $productId)
    //         {
    //             echo '<td><button class = "btn btn-success">Added</button></td>';
    //         }
    //         else
    //         {
    //             echo '<td><button class = "btn btn-warning">Add</button></td>';
    //         }
    //     echo "</form>";      
                
    //     echo "</tr>";
    //     echo "</form>";
    // }
    // echo "</table>";
    // }
    if($_GET['category']!="" && $_GET['price']!="" && $_GET['gender']!=""){
        $num = $_GET['category'];
        $orderBy = $_GET["price"];
        $gender = $_GET['gender'];
            $sql = "SELECT * FROM `product` WHERE catId like $num AND productGender like '$gender' ORDER BY productPrice $orderBy";
		        $stmt = $dbConn->query($sql);	
		        $stmt->execute();
                $records = $stmt->fetchALL(PDO::FETCH_ASSOC);
        echo "<table border=1 id='customer'>";
        echo "<tr>";
        echo "<th>Item Name</th>";
        echo "<th>Price</td>";
        echo "<th> Size</th>";
        echo "<th>More Info</th>";
        echo "</tr>";
    
    foreach($records as $record){
        $productName = $record['productName'];
        $productPrice = $record['productPrice'];
        $productSize = $record['productSize'];
        $productId = $record['productId'];
                
        echo "<tr>";
        echo "<td>" . $productName . "</td> ";
        echo "<td>$" . $productPrice . "</td>";
        echo "<td>" . $productSize . "</td>";
        echo "<td>";
        echo "<a href='./moreinfo.php?productId=" . $record['productId'] . "' target='_blank'>More Info";
        echo "</td>";
        
        echo "<form method = 'post'>";
            echo "<input type = 'hidden' name = 'productName' value = '$productName'>";
            echo "<input type = 'hidden' name = 'productPrice' value = '$productPrice'>";
            echo "<input type = 'hidden' name = 'productSize' value = '$productSize'>";
            echo "<input type = 'hidden' name = 'productId' value = '$productId'>";
            
            // if($_POST['productId'] == $productId)
            // {
            //     echo '<td><button class = "btn btn-success">Added</button></td>';
            // }
            // else
            // {
            //     echo '<td><button class = "btn btn-warning">Add</button></td>';
            // }
        echo "</form>";      
                
        echo "</tr>";
        echo "</form>";
    }
    echo "</table>"; 
    }
    else if($_GET['category']!="" && $_GET['price']!="" && $_GET['gender']!=""){
        $num = $_GET['category'];
        $orderBy = $_GET["price"];
        $gender = $_GET['gender'];
            $sql = "SELECT * FROM `product` WHERE catId like $num AND productGender like '$gender' ORDER BY productPrice $orderBy";
		        $stmt = $dbConn->query($sql);	
		        $stmt->execute();
                $records = $stmt->fetchALL(PDO::FETCH_ASSOC);
        echo "<table border=1 id='customer'>";
        echo "<tr>";
        echo "<th>Item Name</th>";
        echo "<th>Price</td>";
        echo "<th> Size</th>";
        echo "<th>More Info</th>";
        echo "</tr>";
    
    foreach($records as $record){
        $productName = $record['productName'];
        $productPrice = $record['productPrice'];
        $productSize = $record['productSize'];
        $productId = $record['productId'];
                
        echo "<tr>";
        echo "<td>" . $productName . "</td> ";
        echo "<td>$" . $productPrice . "</td>";
        echo "<td>" . $productSize . "</td>";
        echo "<td>";
        echo "<a href='./moreinfo.php?productId=" . $record['productId'] . "' target='_blank'>More Info";
        echo "</td>";
        
        echo "<form method = 'post'>";
            echo "<input type = 'hidden' name = 'productName' value = '$productName'>";
            echo "<input type = 'hidden' name = 'productPrice' value = '$productPrice'>";
            echo "<input type = 'hidden' name = 'productSize' value = '$productSize'>";
            echo "<input type = 'hidden' name = 'productId' value = '$productId'>";
            
            // if($_POST['productId'] == $productId)
            // {
            //     echo '<td><button class = "btn btn-success">Added</button></td>';
            // }
            // else
            // {
            //     echo '<td><button class = "btn btn-warning">Add</button></td>';
            // }
        echo "</form>";      
                
        echo "</tr>";
        echo "</form>";
    }
    echo "</table>"; 
    }
    else if($_GET['category']!="" && $_GET['price']!="" && $_GET['gender']==""){
        $num = $_GET['category'];
        $orderBy = $_GET["price"];
            $sql = "SELECT * FROM `product` WHERE catId like $num ORDER BY productPrice $orderBy";
		        $stmt = $dbConn->query($sql);	
		        $stmt->execute();
                $records = $stmt->fetchALL(PDO::FETCH_ASSOC);
        echo "<table border=1 id='customer'>";
        echo "<tr>";
        echo "<th>Item Name</th>";
        echo "<th>Price</td>";
        echo "<th> Size</th>";
        echo "<th>More Info</th>";
        echo "</tr>";
    
    foreach($records as $record){
        $productName = $record['productName'];
        $productPrice = $record['productPrice'];
        $productSize = $record['productSize'];
        $productId = $record['productId'];
                
        echo "<tr>";
        echo "<td>" . $productName . "</td> ";
        echo "<td>$" . $productPrice . "</td>";
        echo "<td>" . $productSize . "</td>";
        echo "<td>";
        echo "<a href='./moreinfo.php?productId=" . $record['productId'] . "' target='_blank'>More Info";
        echo "</td>";
        
        echo "<form method = 'post'>";
            echo "<input type = 'hidden' name = 'productName' value = '$productName'>";
            echo "<input type = 'hidden' name = 'productPrice' value = '$productPrice'>";
            echo "<input type = 'hidden' name = 'productSize' value = '$productSize'>";
            echo "<input type = 'hidden' name = 'productId' value = '$productId'>";
            
            // if($_POST['productId'] == $productId)
            // {
            //     echo '<td><button class = "btn btn-success">Added</button></td>';
            // }
            // else
            // {
            //     echo '<td><button class = "btn btn-warning">Add</button></td>';
            // }
        echo "</form>";      
                
        echo "</tr>";
        echo "</form>";
    }
    echo "</table>"; 
    }
     else if($_GET['category']!="" && $_GET['price']!="" && $_GET['gender']==""){
        $num = $_GET['category'];
        
        $orderBy = $_GET["price"];
            $sql = "SELECT * FROM `product` WHERE catId like $num ORDER BY productPrice $orderBy";
		        $stmt = $dbConn->query($sql);	
		        $stmt->execute();
                $records = $stmt->fetchALL(PDO::FETCH_ASSOC);
        echo "<table border=1 id='customer'>";
        echo "<tr>";
        echo "<th>Item Name</th>";
        echo "<th>Price</td>";
        echo "<th> Size</th>";
        echo "<th>More Info</th>";
        echo "</tr>";
    
    foreach($records as $record){
        $productName = $record['productName'];
        $productPrice = $record['productPrice'];
        $productSize = $record['productSize'];
        $productId = $record['productId'];
                
        echo "<tr>";
        echo "<td>" . $productName . "</td> ";
        echo "<td>$" . $productPrice . "</td>";
        echo "<td>" . $productSize . "</td>";
        echo "<td>";
        echo "<a href='./moreinfo.php?productId=" . $record['productId'] . "' target='_blank'>More Info";
        echo "</td>";
        
        echo "<form method = 'post'>";
            echo "<input type = 'hidden' name = 'productName' value = '$productName'>";
            echo "<input type = 'hidden' name = 'productPrice' value = '$productPrice'>";
            echo "<input type = 'hidden' name = 'productSize' value = '$productSize'>";
            echo "<input type = 'hidden' name = 'productId' value = '$productId'>";
            
            // if($_POST['productId'] == $productId)
            // {
            //     echo '<td><button class = "btn btn-success">Added</button></td>';
            // }
            // else
            // {
            //     echo '<td><button class = "btn btn-warning">Add</button></td>';
            // }
        echo "</form>";      
                
        echo "</tr>";
        echo "</form>";
    }
    echo "</table>"; 
    }
      else if($_GET['category']=="" && $_GET['price']!="" && $_GET['gender']!=""){
        $orderBy = $_GET["price"];
        $gender = $_GET['gender'];
            $sql = "SELECT * FROM `product` WHERE productGender like '$gender' ORDER BY productPrice $orderBy";
		        $stmt = $dbConn->query($sql);	
		        $stmt->execute();
                $records = $stmt->fetchALL(PDO::FETCH_ASSOC);
        echo "<table border=1 id='customer'>";
        echo "<tr>";
        echo "<th>Item Name</th>";
        echo "<th>Price</td>";
        echo "<th> Size</th>";
        echo "<th>More Info</th>";
        echo "</tr>";
    
    foreach($records as $record){
        $productName = $record['productName'];
        $productPrice = $record['productPrice'];
        $productSize = $record['productSize'];
        $productId = $record['productId'];
                
        echo "<tr>";
        echo "<td>" . $productName . "</td> ";
        echo "<td>$" . $productPrice . "</td>";
        echo "<td>" . $productSize . "</td>";
        echo "<td>";
        echo "<a href='./moreinfo.php?productId=" . $record['productId'] . "' target='_blank'>More Info";
        echo "</td>";
        
        echo "<form method = 'post'>";
            echo "<input type = 'hidden' name = 'productName' value = '$productName'>";
            echo "<input type = 'hidden' name = 'productPrice' value = '$productPrice'>";
            echo "<input type = 'hidden' name = 'productSize' value = '$productSize'>";
            echo "<input type = 'hidden' name = 'productId' value = '$productId'>";
            
            // if($_POST['productId'] == $productId)
            // {
            //     echo '<td><button class = "btn btn-success">Added</button></td>';
            // }
            // else
            // {
            //     echo '<td><button class = "btn btn-warning">Add</button></td>';
            // }
        echo "</form>";      
                
        echo "</tr>";
        echo "</form>";
    }
    echo "</table>"; 
    }
    else if($_GET['category']!="" && $_GET['price']=="" && $_GET['gender']!=""){
        $num = $_GET['category'];
        $orderBy = $_GET["price"];
        $gender = $_GET['gender'];
            $sql = "SELECT * FROM `product` WHERE catId like $num AND productGender like '$gender'";
		        $stmt = $dbConn->query($sql);	
		        $stmt->execute();
                $records = $stmt->fetchALL(PDO::FETCH_ASSOC);
        echo "<table border=1 id='customer'>";
        echo "<tr>";
        echo "<th>Item Name</th>";
        echo "<th>Price</td>";
        echo "<th> Size</th>";
        echo "<th>More Info</th>";
        echo "</tr>";
    
    foreach($records as $record){
        $productName = $record['productName'];
        $productPrice = $record['productPrice'];
        $productSize = $record['productSize'];
        $productId = $record['productId'];
                
        echo "<tr>";
        echo "<td>" . $productName . "</td> ";
        echo "<td>$" . $productPrice . "</td>";
        echo "<td>" . $productSize . "</td>";
        echo "<td>";
        echo "<a href='./moreinfo.php?productId=" . $record['productId'] . "' target='_blank'>More Info";
        echo "</td>";
        
        echo "<form method = 'post'>";
            echo "<input type = 'hidden' name = 'productName' value = '$productName'>";
            echo "<input type = 'hidden' name = 'productPrice' value = '$productPrice'>";
            echo "<input type = 'hidden' name = 'productSize' value = '$productSize'>";
            echo "<input type = 'hidden' name = 'productId' value = '$productId'>";
            
            // if($_POST['productId'] == $productId)
            // {
            //     echo '<td><button class = "btn btn-success">Added</button></td>';
            // }
            // else
            // {
            //     echo '<td><button class = "btn btn-warning">Add</button></td>';
            // }
        echo "</form>";      
                
        echo "</tr>";
        echo "</form>";
    }
    echo "</table>"; 
    }
   else if($_GET['category']=="" && $_GET['price']!="" && $_GET['gender']!=""){
        
        $orderBy = $_GET["price"];
        $gender = $_GET['gender'];
            $sql = "SELECT * FROM `product` WHERE productGender like '$gender' ORDER BY productPrice $orderBy";
		        $stmt = $dbConn->query($sql);	
		        $stmt->execute();
                $records = $stmt->fetchALL(PDO::FETCH_ASSOC);
        echo "<table border=1 id='customer'>";
        echo "<tr>";
        echo "<th>Item Name</th>";
        echo "<th>Price</td>";
        echo "<th> Size</th>";
        echo "<th>More Info</th>";
        echo "</tr>";
    
    foreach($records as $record){
        $productName = $record['productName'];
        $productPrice = $record['productPrice'];
        $productSize = $record['productSize'];
        $productId = $record['productId'];
                
        echo "<tr>";
        echo "<td>" . $productName . "</td> ";
        echo "<td>$" . $productPrice . "</td>";
        echo "<td>" . $productSize . "</td>";
        echo "<td>";
        echo "<a href='./moreinfo.php?productId=" . $record['productId'] . "' target='_blank'>More Info";
        echo "</td>";
        
        echo "<form method = 'post'>";
            echo "<input type = 'hidden' name = 'productName' value = '$productName'>";
            echo "<input type = 'hidden' name = 'productPrice' value = '$productPrice'>";
            echo "<input type = 'hidden' name = 'productSize' value = '$productSize'>";
            echo "<input type = 'hidden' name = 'productId' value = '$productId'>";
            
            // if($_POST['productId'] == $productId)
            // {
            //     echo '<td><button class = "btn btn-success">Added</button></td>';
            // }
            // else
            // {
            //     echo '<td><button class = "btn btn-warning">Add</button></td>';
            // }
        echo "</form>";      
                
        echo "</tr>";
        echo "</form>";
    }
    echo "</table>"; 
    }
    else if($_GET['category']!=""){
        $num = $_GET['category'];
            $sql = "SELECT * FROM `product` WHERE catId like $num";
		        $stmt = $dbConn->query($sql);	
		        $stmt->execute();
                $records = $stmt->fetchALL(PDO::FETCH_ASSOC);
        echo "<table border=1 id='customer'>";
        echo "<tr>";
        echo "<th>Item Name</th>";
        echo "<th>Price</td>";
        echo "<th> Size</th>";
        echo "<th>More Info</th>";
        echo "</tr>";
    
    foreach($records as $record){
        $productName = $record['productName'];
        $productPrice = $record['productPrice'];
        $productSize = $record['productSize'];
        $productId = $record['productId'];
                
        echo "<tr>";
        echo "<td>" . $productName . "</td> ";
        echo "<td>$" . $productPrice . "</td>";
        echo "<td>" . $productSize . "</td>";
        echo "<td>";
        echo "<a href='./moreinfo.php?productId=" . $record['productId'] . "' target='_blank'>More Info";
        echo "</td>";
        
        echo "<form method = 'post'>";
            echo "<input type = 'hidden' name = 'productName' value = '$productName'>";
            echo "<input type = 'hidden' name = 'productPrice' value = '$productPrice'>";
            echo "<input type = 'hidden' name = 'productSize' value = '$productSize'>";
            echo "<input type = 'hidden' name = 'productId' value = '$productId'>";
            
            // if($_POST['productId'] == $productId)
            // {
            //     echo '<td><button class = "btn btn-success">Added</button></td>';
            // }
            // else
            // {
            //     echo '<td><button class = "btn btn-warning">Add</button></td>';
            // }
        echo "</form>";      
                
        echo "</tr>";
        echo "</form>";
    }
    echo "</table>"; 
    }
    else if($_GET['price']!=""){
        
        $orderBy = $_GET["price"];
        
            $sql = "SELECT * FROM `product` ORDER BY productPrice $orderBy";
		        $stmt = $dbConn->query($sql);	
		        $stmt->execute();
                $records = $stmt->fetchALL(PDO::FETCH_ASSOC);
        echo "<table border=1 id='customer'>";
        echo "<tr>";
        echo "<th>Item Name</th>";
        echo "<th>Price</td>";
        echo "<th> Size</th>";
        echo "<th>More Info</th>";
        echo "</tr>";
    
    foreach($records as $record){
        $productName = $record['productName'];
        $productPrice = $record['productPrice'];
        $productSize = $record['productSize'];
        $productId = $record['productId'];
                
        echo "<tr>";
        echo "<td>" . $productName . "</td> ";
        echo "<td>$" . $productPrice . "</td>";
        echo "<td>" . $productSize . "</td>";
        echo "<td>";
        echo "<a href='./moreinfo.php?productId=" . $record['productId'] . "' target='_blank'>More Info";
        echo "</td>";
        
        echo "<form method = 'post'>";
            echo "<input type = 'hidden' name = 'productName' value = '$productName'>";
            echo "<input type = 'hidden' name = 'productPrice' value = '$productPrice'>";
            echo "<input type = 'hidden' name = 'productSize' value = '$productSize'>";
            echo "<input type = 'hidden' name = 'productId' value = '$productId'>";
            
            // if($_POST['productId'] == $productId)
            // {
            //     echo '<td><button class = "btn btn-success">Added</button></td>';
            // }
            // else
            // {
            //     echo '<td><button class = "btn btn-warning">Add</button></td>';
            // }
        echo "</form>";      
                
        echo "</tr>";
        echo "</form>";
    }
    echo "</table>"; 
    }
    else if($_GET['gender']!=""){
        $gender = $_GET['gender'];
            $sql = "SELECT * FROM `product` WHERE productGender like '$gender'";
		        $stmt = $dbConn->query($sql);	
		        $stmt->execute();
                $records = $stmt->fetchALL(PDO::FETCH_ASSOC);
        echo "<table border=1 id='customer'>";
        echo "<tr>";
        echo "<th>Item Name</th>";
        echo "<th>Price</td>";
        echo "<th> Size</th>";
        echo "<th>More Info</th>";
        echo "</tr>";
    
    foreach($records as $record){
        $productName = $record['productName'];
        $productPrice = $record['productPrice'];
        $productSize = $record['productSize'];
        $productId = $record['productId'];
                
        echo "<tr>";
        echo "<td>" . $productName . "</td> ";
        echo "<td>$" . $productPrice . "</td>";
        echo "<td>" . $productSize . "</td>";
        echo "<td>";
        echo "<a href='./moreinfo.php?productId=" . $record['productId'] . "' target='_blank'>More Info";
        echo "</td>";
        
        echo "<form method = 'post'>";
            echo "<input type = 'hidden' name = 'productName' value = '$productName'>";
            echo "<input type = 'hidden' name = 'productPrice' value = '$productPrice'>";
            echo "<input type = 'hidden' name = 'productSize' value = '$productSize'>";
            echo "<input type = 'hidden' name = 'productId' value = '$productId'>";
            
            // if($_POST['productId'] == $productId)
            // {
            //     echo '<td><button class = "btn btn-success">Added</button></td>';
            // }
            // else
            // {
            //     echo '<td><button class = "btn btn-warning">Add</button></td>';
            // }
        echo "</form>";      
                
        echo "</tr>";
        echo "</form>";
    }
    echo "</table>"; 
    }
    
    else{
      $sql = "SELECT * FROM `product`";
		        $stmt = $dbConn->query($sql);	
		        $stmt->execute();
                $records = $stmt->fetchALL(PDO::FETCH_ASSOC);
        echo "<table border=1 id='customer'>";
        echo "<tr>";
        echo "<th>Item Name</th>";
        echo "<th>Price</td>";
        echo "<th> Size</th>";
        echo "<th>More Info</th>";
        echo "</tr>";
    
    foreach($records as $record){
        $productName = $record['productName'];
        $productPrice = $record['productPrice'];
        $productSize = $record['productSize'];
        $productId = $record['productId'];
                
        echo "<tr>";
        echo "<td>" . $productName . "</td> ";
        echo "<td>$" . $productPrice . "</td>";
        echo "<td>" . $productSize . "</td>";
        echo "<td>";
        echo "<a href='./moreinfo.php?productId=" . $record['productId'] . "' target='_blank'>More Info";
        echo "</td>";
        
        echo "<form method = 'post'>";
            echo "<input type = 'hidden' name = 'productName' value = '$productName'>";
            echo "<input type = 'hidden' name = 'productPrice' value = '$productPrice'>";
            echo "<input type = 'hidden' name = 'productSize' value = '$productSize'>";
            echo "<input type = 'hidden' name = 'productId' value = '$productId'>";
            
            // if($_POST['productId'] == $productId)
            // {
            //     echo '<td><button class = "btn btn-success">Added</button></td>';
            // }
            // else
            // {
            //     echo '<td><button class = "btn btn-warning">Add</button></td>';
            // }
        echo "</form>";      
                
        echo "</tr>";
        echo "</form>";
    }
    echo "</table>"; 
    }
    
}
  function displayCategories(){
        global $dbConn;
        
        $sql = "SELECT catId, catName FROM `category` ORDER BY catName";
        
        $stmt = $dbConn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        foreach ($records as $record) {
        $id = $record['catId'];
        $name = $record['catName'];
            echo '<option value="'.$id.'">'.$name.'</option>';
            
        }
        
    }


?>	 

        
<?php

    include 'header.php';

?>
        <h1>Otterstyle Shop's Main Page</h1>    
        <form>  
         <!-- Category for filtering-->
         <h4>Filter Data</h4>
       <!--  <div class="form-group">-->
       <!--     <label for="pName">Product Name</label>-->
       <!--     <input type="text" class="form-control" name="query" id="pName" placeholder"Name">-->
       <!--</div>-->
        Category: 
            <select name="category">
                <option value=""> Select One </option>
                <?=displayCategories(); ?>
            </select>
        <br />
        <br/>
        Price: 
            <select name="price">
                <option value=""> Select One </option>
                <option value ="ASC"> Lowest to Highest</option>
                <option value ="DESC"> Highest to Lowest</option>
            </select>
        <br />
        <br/>
        Gender: 
            <select name="gender">
                <option value=""> Select One </option>
                <option value ="Male"> Male</option>
                <option value ="Female"> Female</option>
            </select>
        <br />
        <br/>
        
        <input type="submit" value="Submit" class="btn btn-default">
        <br />
        <hr>
        
        </form>
        <!--display items-->
        <strong>Products</strong>
        <?=display(); ?>

        
    </body>

    <?php

        include 'footer.php';

    ?>

    </html>