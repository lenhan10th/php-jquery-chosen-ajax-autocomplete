<?php
    $hostName = "localhost";
    $username = "root";
    $password = "";
    $dbname = "demo";
 
    $mysqli = new mysqli($hostName, $username, $password, $dbname);
 
    $sql = "SELECT * FROM countries WHERE name LIKE '%".$_GET['name']."%'";
 
    $result = $mysqli->query($sql);
 
    $response = [];
    while($row = mysqli_fetch_assoc($result)){
        $response[] = array("id"=>$row['id'], "name"=>$row['name']);
    }
    echo json_encode($response);
    exit();
?>