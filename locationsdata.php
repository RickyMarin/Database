<?php
    require('library.php');

    if(isset($_GET["data"])) {
        echo json_encode(array(0, 1));
    }
?>