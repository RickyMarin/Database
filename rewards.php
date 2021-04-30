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
//if(!isset($_SESSION['logged_in'])){
//    header("Location:SignUp.php");
//}
?>

<?php include("LoggedInHeader.php"); ?>
<div class="container-fluid">
    <form method="post" enctype="multipart/form-data">

        <fieldset class="form-group">
            <div class="border border-light p-3 mb-4">
                <div class="row">


                    <div class="col-md-8">
                        <div container="container-fluid" style="background-color:whitesmoke; padding: 1rem;">
                            <h2 class="text-light" style="background-color:#122C34; padding: 1rem;">
                                Rewards
                            </h2>
                            <h5 class="text-secondary" style="padding: 0.5rem;"> <b>Rewards:</b> You currently have INSERT NUM AWARDS HERE</h5>
                            You are currently INSERT away from a reward.
                            Maybe we can add apply button


                        </div>
                    </div>
                </div>
        </fieldset>
    </form>
</div>


<?php include("footer.php"); ?>
</body>
</html>