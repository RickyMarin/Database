<html>
<head>
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
<div class="content-section">
    <form method="POST" validate enctype="multipart/form-data">

        <fieldset class="form-group">
            <div class="border border-light p-3 mb-4">
                <div class="text-left">
                    <h1> Your Current Info </h1>
                    <form class="blueForms" id="id-profile_form" method="post" > <div id="div_id_first_name" class="form-group"> <label for="id_first_name" class=" requiredField">
                                First name<span class="asteriskField">*</span> </label> <div class=""> <input type="text" name="name" value="INSERT NAME" maxlength="30" class="textinput textInput form-control" required id="id_first_name"> </div> </div> <div id="div_id_last_name" class="form-group"> <label for="id_last_name" class=" requiredField">
                                Email address<span class="asteriskField">*</span> </label> <div class=""> <input type="email" name="email_addr" value="INSERT EMAIL" maxlength="200" class="emailinput form-control" required id="id_email_addr"> <small id="hint_id_email_addr" class="form-text text-muted">Ex: example@email.com</small> </div> </div> <div id="div_id_phone_number" class="form-group"> <label for="id_phone_number" class=" requiredField">
                                Phone number<span class="asteriskField">*</span> </label> <div class=""> <input type="text" name="phone_number" value="INSERT PHONE NUM" maxlength="17" class="textinput textInput form-control" required id="id_phone_number"> <small id="hint_id_phone_number" class="form-text text-muted">Phone number must be entered in the format: '9999999999'. Up to 15 digits allowed.</small> </div> </div>
                        Address<span class="asteriskField">*</span> <div class=""> <input type="text" name="Address" value="INSERT ADDRESS" maxlength="30" class="textinput textInput form-control" required id="id_address"> </div> </div> <div id="address" class="form-group"> <label for="address" class=" requiredField">

                </div> <div
                            class="buttonHolder"> <input type="submit"
                                                         name="submit"
                                                         value="Submit"

                                                         class="btn btn-primary btn btn-outline-primary"
                                                         id="submit-id-submit"


                            />

                        </div> </form>

                </div>
        </fieldset>


    </form>
</div>


<?php include("footer.php"); ?>
</body>
</html>