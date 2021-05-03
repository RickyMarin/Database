<?php

        session_start();

        $username = 'ram8ny';
        $password = 'Spring2021!!';

        $dbname = 'ram8ny';

        $host = "usersrv01.cs.virginia.edu";

        $dsn = "mysql:host=$host;dbname=$dbname";
        $db = new PDO($dsn, $username, $password);
        $status = 1;
        if(isset($_SESSION['email'])) {
            $uemail = $_SESSION['email'];
            $sql = "SELECT * FROM Orders WHERE uemail = :uemail AND orderStatus = :os";
            $statement = $db->prepare($sql);
            $statement->bindParam(":uemail", $uemail);
            $statement->bindParam(":os", $status, PDO::PARAM_INT);
            $statement->execute();
            $data = json_encode($statement->fetchAll(), JSON_PRETTY_PRINT);


            $filename = "orders.json";
            $file = fopen($filename, "w") or die("Unable to open file!");
            fwrite($file, $data);
            fclose($file);
            
            header('Content-Description: File Transfer');
            header('Content-Length: ' . filesize($filename));
            header('Content-Disposition: attachment; filename='.basename($filename));
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header("Content-Type: application/json");
            readfile($filename);
        }


    ?>