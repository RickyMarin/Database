<!DOCTYPE HTML>
<!--
	Alpha by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->


<html>
<head>
    <title>Signup Page</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="assets/css/main.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<style>
    input[type=radio] {
        border: 0px;
        width: 100%;
        height: 2em;
    }
</style>

<body class="is-preload">
<div id="page-wrapper">


    <!-- Header -->
    <?php include("header.php"); ?>
    <?php include("library.php"); ?>

    <section id="main" class="container medium">
        <header>
            <h2>Sign Up</h2>
            <p>Sign up for exclusive rewards and to enjoy delicious pizza!</p>
        </header>
        <?php
        function makeSafe($value)
        {
            $value = htmlspecialchars($value);
            return $value;
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $UsernameError = $emailMessage = $genderErr = $AgeMessage = "";
            $Username = $email = $ZipMessage = $comment = $hashedPassword = "";
            $Phone = $ZipCode = 0;
            $error = false;
            $password = $_POST['Password'];
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $name = makeSafe($_POST["name"]);
            $city = makeSafe($_POST["City"]);
            $Phone = makeSafe($_POST["PhoneNum"]);

            $address = makeSafe($_POST["Address"]);
            $email = makeSafe($_POST["email"]);
            if (empty($name)) {
                echo "<font color=red  size='5pt'>Enter your name.</font> </p>";
                $error = true;
            } else {
                if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
                    echo "<font color=red  size='5pt'>You have an invalid character in your name.</font> </p>";
                    $error = true;

                }
            }

            if (empty($email)) {
                echo "<font color=red  size='5pt'>Enter an Email.</font> </p>";
                $error = true;
            } else {
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    echo "<font color=red  size='5pt'>You need a proper email format.</font> </p>";
                    $error = true;
                }
            }
            if (empty($_POST["Age"])) {
                echo "<font color=red  size='5pt'>You did not enter an Age.</font> </p>";
                $error = true;
            } else {
                $age = $_POST["Age"];
                if (!filter_var(intval($age), FILTER_VALIDATE_INT)) {
                    echo "<font color=red  size='5pt'>You did not enter a number for your age.</font> </p>";
                    $error = true;
                }
                if (intval($age) > 110 || intval($age) < 0) {
                    echo "<font color=red  size='5pt'>You are not the proper age.</font> </p>";
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

            if (empty($_POST["Address"])) {
                echo "<font color=red  size='5pt'>You did not enter an address.</font> </p>";
                $error = true;
            } else {
                if (!preg_match('/^\\d+ [a-z0-9A-Z ]+/', $address)) {
                    echo "<font color=red  size='5pt'>You did not enter a correct address.</font> </p>";
                    $error = true;
                }
            }
            if (empty($city)) {
                echo "<p align='left'> <font color=red  size='5pt'>Enter a city.</font> </p>";
                $error = true;
            } else {
                if (!preg_match("/^[a-zA-Z ]*$/", $city)) {
                    echo "<font color=red  size='5pt'>You need a proper city.</font> </p>";
                    $error = true;

                }
            }
            if (empty($_POST['Password'])) {
                echo "<font color=red  size='5pt'>You did not enter a password.</font> </p>";
                $error = true;
            }
            if (empty($_POST["State"])) {
                echo "<font color=red  size='5pt'>You did not enter a state</font> </p>";
                $error = true;
            }

            if ($error == false) {
  //QUERY WILL GO HERE
            }
        }
        ?>


        <div class="box">
            <form id="insert" name="insert" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
                  method="POST">
                <div class="row gtr-50 gtr-uniform">
                    <div class="col-6 col-12-mobilep">
                        <label for="NameLabel">Name:</label>
                        <input type="text" name="name" id="name" value="" placeholder="Name"/>
                    </div>
                    <div class="col-6 col-12-mobilep">
                        <label for="emailLabel">Email:</label>
                        <input type="email" name="email" id="email" value="" placeholder="Email"/>
                    </div>
                    <div class="col-12">
                        <label for="PasswordLabel">Password:</label>
                        <input type="password" name="Password" id="Password" placeholder="Enter a password"/>
                    </div>
                    <div class="col-12">
                        <label for="AddressLabel">Address:</label>
                        <input type="text" name="Address" id="Address" placeholder="Address"/>
                    </div>
                    <div class="col-4">
                        <label for="CityLabel">City:</label>
                        <input type="text" name="City" id="City" placeholder="City"/>
                    </div>
                    <div class="col-4">
                        <label for="State">State:</label>
                        <select name="State">
                            <option value="" disabled selected>State</option>
                            <option value="AL">Alabama</option>
                            <option value="AK">Alaska</option>
                            <option value="AZ">Arizona</option>
                            <option value="AR">Arkansas</option>
                            <option value="CA">California</option>
                            <option value="CO">Colorado</option>
                            <option value="CT">Connecticut</option>
                            <option value="DE">Delaware</option>
                            <option value="DC">District Of Columbia</option>
                            <option value="FL">Florida</option>
                            <option value="GA">Georgia</option>
                            <option value="HI">Hawaii</option>
                            <option value="ID">Idaho</option>
                            <option value="IL">Illinois</option>
                            <option value="IN">Indiana</option>
                            <option value="IA">Iowa</option>
                            <option value="KS">Kansas</option>
                            <option value="KY">Kentucky</option>
                            <option value="LA">Louisiana</option>
                            <option value="ME">Maine</option>
                            <option value="MD">Maryland</option>
                            <option value="MA">Massachusetts</option>
                            <option value="MI">Michigan</option>
                            <option value="MN">Minnesota</option>
                            <option value="MS">Mississippi</option>
                            <option value="MO">Missouri</option>
                            <option value="MT">Montana</option>
                            <option value="NE">Nebraska</option>
                            <option value="NV">Nevada</option>
                            <option value="NH">New Hampshire</option>
                            <option value="NJ">New Jersey</option>
                            <option value="NM">New Mexico</option>
                            <option value="NY">New York</option>
                            <option value="NC">North Carolina</option>
                            <option value="ND">North Dakota</option>
                            <option value="OH">Ohio</option>
                            <option value="OK">Oklahoma</option>
                            <option value="OR">Oregon</option>
                            <option value="PA">Pennsylvania</option>
                            <option value="RI">Rhode Island</option>
                            <option value="SC">South Carolina</option>
                            <option value="SD">South Dakota</option>
                            <option value="TN">Tennessee</option>
                            <option value="TX">Texas</option>
                            <option value="UT">Utah</option>
                            <option value="VT">Vermont</option>
                            <option value="VA">Virginia</option>
                            <option value="WA">Washington</option>
                            <option value="WV">West Virginia</option>
                            <option value="WI">Wisconsin</option>
                            <option value="WY">Wyoming</option>
                        </select>
                    </div>
                    <div class="col-4">
                        <label for="ZipCodeLabel">Zip Code:</label>
                        <input type="text" name="ZipCode" id="ZipCode" placeholder="Zip Code"/>
                    </div>

                    <div class="col-12">
                        <label for="PhoneLabel">Phone Number:</label>
                        <input type="text" name="PhoneNum" id="PhoneNum" placeholder="Enter your phone number in the form '0000000000'"/>
                    </div>



                    <div class="col-12">
                        <ul class="actions special">
                            <li><input type="submit" value="Sign Up!"/></li>
                        </ul>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <!-- Footer -->



</div>
<?php include("footer.php"); ?>
<!-- Scripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/jquery.dropotron.min.js"></script>
<script src="assets/js/jquery.scrollex.min.js"></script>
<script src="assets/js/browser.min.js"></script>
<script src="assets/js/breakpoints.min.js"></script>
<script src="assets/js/util.js"></script>
<script src="assets/js/main.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


</body>
</html>