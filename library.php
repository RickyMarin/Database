<?php
$SERVER = 'usersrv01.cs.virginia.edu';
$USERNAME = 'ram8ny';
$PASSWORD = 'Spring2021!!';
$DATABASE = 'ram8ny';
$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
// Form the SQL query (an INSERT query)




?>