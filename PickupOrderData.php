<?php

session_start();

include "library.php";



if (isset($_SESSION['email'])) {
    $user=$_SESSION['email'];
} else {
    header("Location: returning.php");
}


global $db;


$sql = "SELECT * FROM (( (Orders NATURAL JOIN Location) NATURAL JOIN Topping NATURAL JOIN Size) NATURAL JOIN (Cashier NATURAL JOIN Employee)) WHERE uemail=:user and orderStatus=0";
$statement = $db->prepare($sql);
$statement->bindParam(":user", $user);
$statement->execute();

if(isset($_GET["data"])) {
    echo json_encode($statement->fetchAll());
}

?>