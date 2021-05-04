<?php
        $username = 'ram8ny';
        $password = 'Spring2021!!';
        
        $dbname = 'ram8ny';
        
        $host = "usersrv01.cs.virginia.edu";
        
        $dsn = "mysql:host=$host;dbname=$dbname";
        $db = new PDO($dsn, $username, $password);

        session_start();
    
        if(isset($_GET['orderNum'])) {
            $orderNum = $_GET['orderNum'];
            $email = $_SESSION['email'];
            $sql = "UPDATE Orders SET orderStatus = :s WHERE orderNum = :num";
            $statement = $db->prepare($sql);
            $statement->bindValue(':s', 1, PDO::PARAM_INT);
            $statement->bindParam(':num', $orderNum);
            $statement->execute();
        }

?>