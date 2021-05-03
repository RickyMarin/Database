<?php
    $username = 'ram8ny';
    $password = 'Spring2021!!';
    
    $dbname = 'ram8ny';
    
    $host = "usersrv01.cs.virginia.edu";
    
    $dsn = "mysql:host=$host;dbname=$dbname";
    $db = new PDO($dsn, $username, $password);

    
    if(isset($_GET["locations"])) {
        $sql = "SELECT * FROM Location";
        $statement = $db->prepare($sql);
        $statement->execute();
        echo json_encode($statement->fetchAll());
    }

    if(isset($_GET['employees'])) {
        $lid = $_GET['lid'];
        $sql = "SELECT * FROM Employee WHERE lid = :lid";
        $statement = $db->prepare($sql);
        $statement->bindParam(":lid", $lid);
        $statement->execute();
        echo json_encode($statement->fetchAll());
    }
?>