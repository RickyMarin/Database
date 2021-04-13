<html>
    <head>
        <link rel="icon" href="images/favicon.ico" type="image/ico">
        <title>Order Status</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="assets/css/main.css"/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    
    <body class="is-preload">
    <?php
    session_start();
   if(!isset($_SESSION['logged_in'])){
       header("Location:SignUp.php");
   }
    ?>

    <?php include("LoggedInHeader.php"); ?>
        


        <?php include("footer.php"); ?>
    </body>
</html>