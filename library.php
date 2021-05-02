<?php
//$SERVER = 'usersrv01.cs.virginia.edu';
//$USERNAME = 'ram8ny';
//$PASSWORD = 'Spring2021!!';
//$DATABASE = 'ram8ny';
//$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
//// Check connection
//if (mysqli_connect_errno()) {
//    echo "Failed to connect to MySQL: " . mysqli_connect_error();
//}
//// Form the SQL query (an INSERT query)
//
//
//
//
try {
    $username = 'ram8ny';
    $password = 'Spring2021!!';

    $dbname = 'ram8ny';

    $host = "usersrv01.cs.virginia.edu";

    $dsn = "mysql:host=$host;dbname=$dbname";
    $db = new PDO($dsn, $username, $password);
} catch (PDOException $e) {

    $error_message = $e->getMessage();

    echo "<p>An error occurred while connecting to the database: $error_message </p>";

} catch (Exception $e) {

    $error_message = $e->getMessage();

    echo "<p>Error Message: $error_message </p>";

}
//?>