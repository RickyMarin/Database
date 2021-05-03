<html>
<head>
    <title>Update Info</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../assets/css/main.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body class="is-preload">
<?php
ob_start();
include("library.php");
session_start();
if (!isset($_SESSION['logged_in'])) {
    header("Location:SignUp.php");
}
$stmt = $db->prepare("SELECT * FROM Users WHERE uemail = ?");
$stmt->execute([$_SESSION['email']]);
$user = $stmt->fetch();
$mobile = "Mobile";
$home = "Home";
$Phonestmt = $db->prepare("SELECT * FROM UsersPhone WHERE uemail = ? AND numtype = ?");
$Phonestmt->execute([$_SESSION['email'],$mobile]);
$Phoneuser = $Phonestmt->fetch();
$Homestmt = $db->prepare("SELECT * FROM UsersPhone WHERE uemail = ? AND numtype = ?");
$Homestmt->execute([$_SESSION['email'],$home]);
$Homeuser = $Homestmt->fetch();
?>

<html>
<head>
    <title>Hoo's Pizza</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="../assets/css/main.css" />
</head>
<body>
<header id="header">
    <nav id="nav">
        <ul>
            <!--<li>-->
            <!--<a href="#" class="icon solid fa-angle-down">Browse</a>
            <ul>-->
            <li><a href="../index.php">Home</a></li>
            <li><a href="../Order.php">Order a Pizza!</a></li>
            <li><a href="../contact.php">Contact Us</a></li>
            <li><a href="../OrderStatus.php">Check Order Status</a></li>
            <li><a href="../account.php">Account Info</a></li>
            <li><a href='../logout.php'>Click here to log out</a></li>

        </ul>
    </nav>
</header>
</body>
</html>
<div class="container-fluid">
    <form method="POST" validate enctype="multipart/form-data">

        <fieldset class="form-group">
            <div class="border border-light p-3 mb-4">
                <div class="text-left">

                    <h2> Your Current Info </h2>
                    <form class="blueForms" id="id-profile_form" method="post">
                        <div id="div_id_first_name" class="form-group"><label for="id_first_name"
                                                                              class=" requiredField">
                                First name<span class="asteriskField">*</span> </label>
                            <div class=""><input type="text" name="name"
                                                 value='<?php echo $user['uname']; ?> ' maxlength="30"
                                                 class="textinput textInput form-control" required id="id_first_name">
                            </div>
                        </div>
                        <h5 class="text-secondary" style="padding: 0.5rem;"><b>Email:</b> <?php echo $user['uemail']; ?>
                        </h5>
                        <div id="div_id_phone_number" class="form-group"><label for="id_phone_number"
                                                                                class=" requiredField">
                                Phone number<span class="asteriskField">*</span> </label>
                            <div class=""><input type="text" name="PhoneNum" id = "PhoneNum"
                                                 value=<?php echo $Phoneuser['uphone']; ?> maxlength="17"
                                                 class="textinput textInput form-control" required id="id_phone_number">
                                <small id="hint_id_phone_number" class="form-text text-muted">Phone number must be
                                    entered in the format: '9999999999'. </small></div>
                        </div>
                        Home Phone number<span class="asteriskField">*</span></form>
                    <div class=""><input type="text" name="HomePhoneNum" value='<?php echo $Homeuser['uphone'];?>' maxlength="17"
                                         class="textinput textInput form-control" required id="id_phone_number">
                        <small id="hint_id_phone_number" class="form-text text-muted">Phone number must be entered
                            in the format: '9999999999'. </small></div>
                </div>
                Address<span class="asteriskField">*</span>
                <div class=""><input type="text" name="Address" value='<?php echo $user['uaddrstr'];?>' maxlength="30"
                                     class="textinput textInput form-control" required id="id_address"></div>
                <div id="address" class="form-group"><label for="address" class=" requiredField">
                        City<span class="asteriskField">*</span>
                        <div class=""><input type="text" name="City" value='<?php echo $user['uaddrcity']; ?> '
                                             maxlength="30"
                                             class="textinput textInput form-control" required id="id_City"></div></div>
                <div id="State" class="form-group"><label for="State" class=" requiredField">
                        State<span class="asteriskField">*</span>
                        <div class=""><input type="text" name="State" value='<?php echo $user['uaddrstate']; ?> '
                                             maxlength="30"
                                             class="textinput textInput form-control" required id="id_State"></div></div>
                <div id="State" class="form-group"><label for="State" class=" requiredField">
                        Zip Code<span class="asteriskField">*</span>

                        <div class=""><input type="text" name="ZipCode"
                                             value=<?php echo $user['uaddrzip']; ?> maxlength="30"
                                             class="textinput textInput form-control" required id="id_Zip"></div></div>
                <div id="zip" class="form-group"><label for="zip" class=" requiredField">

                </div>
                <div
                        class="buttonHolder"><input type="submit"
                                                    name="submit"
                                                    value="Submit"

                                                    class="btn btn-primary btn btn-outline-primary"
                                                    id="submit-id-submit"


                    />

                </div>
    </form>

</div>
</fieldset>


</form>
</div>


<?php
function makeSafe($value)
{
    $value = htmlspecialchars($value);
    return $value;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $UsernameError = $emailMessage = $genderErr = $AgeMessage = "";
    $Username = $email = $ZipMessage = $comment = $hashedPassword = "";
    $state = "";
    $Phone = $ZipCode = 0;
    $error = false;
    $name = makeSafe($_POST["name"]);
    $city = makeSafe($_POST["City"]);
    $Phone = makeSafe($_POST["PhoneNum"]);
    $HomePhone = makeSafe($_POST["HomePhoneNum"]);
    $address = makeSafe($_POST["Address"]);
    $state = $_POST["State"];
    if (empty($name)) {
        echo "<font color=red  size='5pt'>Enter your name.</font> </p>";
        $error = true;
    } else {
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            echo "<font color=red  size='5pt'>You have an invalid character in your name.</font> </p>";
            $error = true;

        }
    }


    if (empty($_POST["ZipCode"])) {
        echo "<font color=red  size='5pt'>You did not enter a Zip Code.</font> </p>";
        $error = true;
    } else {
        $ZipCode = $_POST["ZipCode"];
        if (!filter_var(intval($ZipCode), FILTER_VALIDATE_INT)) {
            echo "<font color=red  size='5pt'>You did not enter a proper number for Zip Code.</font> </p>";
            $error = true;
        }
        if (strlen($ZipCode) != 5) {
            echo "<font color=red  size='5pt'>You did not enter a proper 5 digit Zip Code.</font> </p>";
            $error = true;
        }

    }

//    if (empty($_POST["Address"])) {
//        echo "<font color=red  size='5pt'>You did not enter an address.</font> </p>";
//        $error = true;
//    } else {
//        if (!preg_match('/^\\d+ [a-z0-9A-Z ]+/', $address)) {
//            echo "<font color=red  size='5pt'>You did not enter a correct address.</font> </p>";
//            $error = true;
//        }
//    }
    if (empty($city)) {
        echo "<p align='left'> <font color=red  size='5pt'>Enter a city.</font> </p>";
        $error = true;
    } else {
        if (!preg_match("/^[a-zA-Z ]*$/", $city)) {
            echo "<font color=red  size='5pt'>You need a proper city.</font> </p>";
            $error = true;

        }
    }
//    if (empty($_POST["HomePhoneNum"]) || !is_numeric($_POST["HomePhoneNum"]) || strlen($HomePhone) != 10) {
//        echo "<font color=red  size='5pt'>You did not enter a correct home Phone Number</font> </p>";
//        $error = true;
//    }
//    if (empty($_POST["PhoneNum"]) || !is_numeric($_POST["PhoneNum"]) || strlen($Phone) != 10) {
//        echo "<font color=red  size='5pt'>You did not enter a correct Phone Number</font> </p>";
//        $error = true;
//    }

    try {
        //checking for prior email

        $newstmt = $db->prepare("UPDATE Users SET uname = ?, uaddrstr = ?, uaddrcity = ?, uaddrstate = ?, uaddrzip = ? WHERE  uemail = ?");
        if (empty($email)) {
            $email = $user['uemail'];
        }
        if (empty($address)) {
            $address = $user['uaddrstr'];
        }
        if (empty($city)) {
            $city = $user['uaddrcity'];
        }
        if (empty($state) || strlen($state) != 2) {
            $state = $user['uaddrstate'];
        }
        if (empty($ZipCode)) {
            $ZipCode = $user['uaddrzip'];
        }
        if (empty($name)) {
            $name = $user['uname'];
        }
        if(!$error){
        $newstmt->execute([$name, $address, $city, $state, $ZipCode, $email]);
        $newPhonestmt = $db->prepare("UPDATE UsersPhone SET uphone = ? WHERE  uemail = ? AND numtype = ?" );
        if (empty($Phone)) {
            $Phone = $Phoneuser['uphone'];
        }
        if (empty($HomePhone)) {
            $HomePhone = $Homeuser['uphone'];
        }
        $newPhonestmt->execute([$Phone,$email,$mobile]);
        $newPhonestmt->execute([$HomePhone,$email,$home]);}

    } catch (Exception $e) {

    }
    ob_end_clean();
    header("Location: ../account.php");

}
include("footer.php"); ?>
</body>
</html>