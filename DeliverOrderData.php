
<?php

    session_start();
  

    
    include "library.php";

    
    if (isset($_SESSION['email'])) {
        $user=$_SESSION['email'];
    } else {
        header("Location: returning.php");
    }

    

    global $db;
    
    $sql = "SELECT * FROM ((Topping NATURAL JOIN Orders NATURAL JOIN Size) NATURAL JOIN (Driver NATURAL JOIN Employee)) WHERE uemail=:user and orderStatus=0";
    $statement = $db->prepare($sql);
    $statement->bindParam(":user", $user);
    $statement->execute();
    //echo print_r($statement->fetchAll());
    
    if(isset($_GET["data"])) {
        echo json_encode($statement->fetchAll());
    }
    
?>
