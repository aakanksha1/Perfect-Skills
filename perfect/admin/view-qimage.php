<?php

    //DB details
    $dbHost     = 'localhost';
    $dbUsername = 'u942694520_sgs';
    $dbPassword = 'Ednations@2017';
    $dbName     = 'u942694520_sgs';
    
    //Create connection and select DB
    $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
    
    //Check connection
    if($db->connect_error){
       die("Connection failed: " . $db->connect_error);
    }
    
    //Get image data from database
    $result = $db->query("SELECT nam FROM tbl_questions1 WHERE question_id = 'QS-759605' ");
    
    if($result->num_rows > 0){
        $imgData = $result->fetch_assoc();
        
        //Render image
        // header("Content-type: image/jpg"); 
        echo $imgData['image'];
        
        echo "smoething";
    }else{
        echo 'Image not found...';
    }

?>