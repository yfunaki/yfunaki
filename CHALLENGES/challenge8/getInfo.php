<?php

    include 'poll.php';
    include '../../dbConnection.php';
   

     include '../../../dbConnection.php';

      $conn = getDatabaseConnection('challenge');
     
      $sql = "UPDATE  FROM ch8 WHERE id = :id";
      
      $stmt = $conn->prepare($sql);  
      $stmt->execute(array(":id"=>$_GET['id']));
      $record = $stmt->fetch(PDO::FETCH_ASSOC);
      //print_r($record);  
    
     echo json_encode($record);
        
?>