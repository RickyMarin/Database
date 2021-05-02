<?php
    $username = 'ram8ny';
    $password = 'Spring2021!!';
    
    $dbname = 'ram8ny';
    
    $host = "usersrv01.cs.virginia.edu";
    
    $dsn = "mysql:host=$host;dbname=$dbname";
    $db = new PDO($dsn, $username, $password);

    $sql = "SELECT * FROM Location";
    $statement = $db->prepare($sql);
    $statement->execute();
    
    if(isset($_GET["data"])) {
        echo json_encode($statement->fetchAll());
    }
?>