<?php

    // Database configuration 
    $dbHost     = "localhost"; 
    $dbUsername = "root"; 
    $dbPassword = "root"; 
    $dbName     = "agenda"; 

    // Create database connection 
    $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);   

    // Get search term 
    $searchTerm = $_GET['term']; 

    // Fetch matched data from the database 
    $query = $db->query("SELECT identificacao FROM contato WHERE name LIKE '%".$searchTerm."%'");

    // Generate array with skills data 
    $skillData = array(); 
    if($query->num_rows > 0){ 
        while($row = $query->fetch_assoc()){  
            $data['value'] = $row['name']; 
            array_push($skillData, $data); 
        } 
    } 

    // Return results as json encoded array 
    echo json_encode($skillData); 
?>