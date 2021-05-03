<!DOCTYPE HTML>
<!--
	Alpha by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Order Now!</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>

    <style>
        /* Style the tab */
        .tab {
            overflow: hidden;
            border: 1px solid #ccc;
            background-color: #f1f1f1;
        }

        /* Style the buttons that are used to open the tab content */
        .tab button {
            background-color: inherit;
            float: left;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 16px;
            transition: 0.3s;
            color: black;
        }

        /* Change background color of buttons on hover */
        .tab button:hover {
            box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
        }

        /* Create an active/current tablink class */
        .tab button.active {
            background-color: #EFCA46;
        }

        /* Style the tab content */
        .tabcontent {
            display: none;
            padding: 0;
            border: 1px solid #ccc;
            border-top: none;
        }

        .us {
            background-color: lightgray;
            color: white;
            margin: 10px;
            padding: 30px;
            height: 250px;
            vertical-align: middle;
        }
    </style>

    <script>
        
        function displayFunction(name) {
            var x = document.getElementById(name);
            if (x.style.display === "none") { // if element hidden
                x.style.display = "block"; // unhide it
            } else {
                x.style.display = "none";
            }
        }
        

        function displayLocationFunction() {
            if(document.getElementById("pickup").checked) {
                document.getElementById("pickup-method").style.display = "block"; // unhide it
            } else {
                document.getElementById("pickup-method").style.display = "none";  //hide
            }
        }

        /*
        function displayFunction(name) {
            var x = document.getElementById(name);
            if (x.checked) {
                document.getElementById(name.concat("-topping")).style.display = "block"; // unhide it
            } else {
                document.getElementById(name.concat("-topping")).style.display = "none";  //hide
            }
        }
        */


    </script>

	<body class="is-preload">
		<div id="page-wrapper">
            
            <?php
                session_start();
                if(!isset($_SESSION['logged_in'])) {
                    header("Location:SignUp.php");
                }

            ?>
            <?php include("LoggedInHeader.php"); ?>

			<!-- Header -->

            <?php include("library.php"); $stmt = $db->prepare("SELECT * FROM Users WHERE uemail = ?");
            $stmt->execute([$_SESSION['email']]);
            $user = $stmt->fetch();?> <!-- Includes  database login information-->
            
            <!-- |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||-->
            
            
            <?php
            
                function makeSafe($value)
                {
                    $value = htmlspecialchars($value);
                    return $value;
                }

                include_once("./library.php"); // To connect to the database
                
                if ($_SERVER["REQUEST_METHOD"] == "POST") {

                    
                    $address = $pizza_size = $cheese = $topping = $quantity = "";
                    $email = $_SESSION['email'];
                    $deliver = 1;

                    $points = 10 + $user['upoints'];
                    $newstmt = $db->prepare("UPDATE Users SET upoints = ? WHERE  uemail = ?");
                    $newstmt->execute([$points,$email]);
                    if($user['upoints'] >= 100){
                        $points = 10;
                        $newstmt = $db->prepare("UPDATE Users SET upoints = ? WHERE  uemail = ?");
                        $newstmt->execute([$points,$email]);
                    }
                    $location = makeSafe($_POST["location"]); // either delivery or pickup
                    if(strcmp($location, "pickup") == 0) {  // if equal
                        $address = $_POST["pickup-method"];
                        $deliver = 0;
                    }
                    
                    $pizza_size = $_POST["pizza-size"];
                    
                    if(isset($_POST['cheese'])) {
                        $cheese = $_POST["pizza-cheese"];  // light, regular, or extra
                    } else {
                        $cheese = "none";
                    }

                    $topping = $_POST['topping'];
                    $quantity = $_POST['quantity'];
                    $cost = 10; // <------------------------------------------------------------------------ change later
                    $order_status = 0; // change later
                    $eid = 2; // change later

                    $con = new mysqli($host, $username, $password, $dbname);

                    // Check connection
                    if (mysqli_connect_errno()) {
                        echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    }
                    
                    // Form the SQL query (a SELECT query)
                    $sql="SELECT tid FROM Topping WHERE tname = '$topping'";
                    // $sql= $db->prepare("SELECT tid FROM Topping WHERE tname = '$topping'");
                    $result = mysqli_query($con,$sql);
                    // $result = $sql->execute();
                    $tid = 0;  // Topping ID value: tid
                    while($row = mysqli_fetch_array($result)) {
                        $tid = $row["tid"];
                    }
                    
                    $sql="SELECT sid FROM Size WHERE sname = '$pizza_size'";
                    //$sql= $db->prepare("SELECT sid FROM Size WHERE sname = '$pizza_size'");
                    $result = mysqli_query($con,$sql);
                    //$result = $sql->execute();
                    $sid = 0;  // Topping ID value: tid
                    while($row = mysqli_fetch_array($result)) {
                        $sid = $row["sid"];
                    }
                    
                    /*
                    $sql="INSERT INTO Order (uemail, tid, sid, eid, cheese, quantity, deliver, cost, orderStatus)
                    VALUES
                    ('$email','$tid', '$sid', '$eid', '$cheese', '$quantity', '$deliver', '$cost', '$order_status')";
                    */
                    
                    $sql=$db->prepare("INSERT INTO Orders (uemail, tid, sid, eid, cheese, quantity, deliver, cost, orderStatus)
                    VALUES
                    ('$email','$tid', '$sid', '$eid', '$cheese', '$quantity', '$deliver', '$cost', '$order_status')");
                    $sql->execute();

                    // echo "'$email','$tid', '$sid', '$eid', '$cheese', '$quantity', '$deliver', '$cost', '$order_status'";
                    
                    
                    //if (!mysqli_query($con,$sql)) {
                     //   die('Error: ' . mysqli_error($con));
                   // }
                    // echo "1 record added"; // Output to user
                    mysqli_close($con);
                        
                    }

                
                
            ?>

            <!-- |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||-->

            <div style="padding:5%;">
                
                <h2 style="text-align: center;">Order Form</h2>
                <hr>
                
                <form method="post" style="padding:2%;border: 2px solid;border-radius:25px;">

                    <h2>Location:</h2>

                    <div class="pizza-cheese">
                    <input type="radio" id="delivery" name="location" value="delivery" onclick="displayLocationFunction()" checked>
                    <label for="delivery">Delivery</label>
                    <input type="radio" id="pickup" name="location" value="pickup" onclick="displayLocationFunction()">
                    <label for="pickup">Pickup</label>
                    <select class="pickup-method" name="pickup-method" id="pickup-method" style="display:none;">
                        <option value="address1">26 Smoky Hollow Drive, Pomona, CA 91768</option>
                        <option value="address2">274 Plumb Branch Ave., Duluth, GA 30096</option>
                        <option value="address3">21 Bald Hill St., Rossville, GA 30741</option>
                    </select>
                    </div>

                    <!-- placeholder values-->
                    <!--
                    <input type="radio" id="address1" name="location" value="address1" checked>
                    <label for="address1">26 Smoky Hollow Drive, Pomona, CA 91768</label>
                    <input type="radio" id="address2" name="location" value="address2">
                    <label for="address2">274 Plumb Branch Ave., Duluth, GA 30096</label>
                    <input type="radio" id="address3" name="location" value="address3">
                    <label for="address3">21 Bald Hill St., Rossville, GA 30741</label>
                    -->

                    <hr>

                    <h2>Pizza Size:</h2>

                    <input type="radio" id="small" name="pizza-size" value="small" checked>
                    <label for="small">Small</label>
                    <input type="radio" id="medium" name="pizza-size" value="medium">
                    <label for="medium">Medium</label>
                    <input type="radio" id="large" name="pizza-size" value="large">
                    <label for="large">Large</label>
                    
                    <hr>

                    <h2>Cheese:</h2>
                    <div class="pizza-cheese">
                    <input type="checkbox" id="cheese" name="cheese" onclick="displayFunction('pizza-cheese')">
                    <label for="cheese">Cheese</label>
                    <select class="pizza-cheese" name="pizza-cheese" id="pizza-cheese" style="display:none;">
                        <option value="light">Light</option>
                        <option value="regular">Regular</option>
                        <option value="extra">Extra</option>
                    </select>
                    </div>

                    <hr>

                    <h2>Topppings:</h2>                 
                    <p>Please select one topping</p>

                    <div class="pizza-topping">
                        <input type="radio" id="pepperoni" value="pepperoni" name="topping" checked>
                        <label for="pepperoni">Pepperoni</label>
                        <input type="radio" id="chicken" value="chicken" name="topping">
                        <label for="chicken">Chicken</label>
                        <input type="radio" id="ham" value="ham" name="topping">
                        <label for="ham">Ham</label>
                        <input type="radio" id="beef" value="beef" name="topping">
                        <label for="beef">Beef</label>
                        <input type="radio" id="cheddar-cheese" value="cheddar cheese" name="topping">
                        <label for="cheddar-cheese">Cheddar Cheese</label>
                        <input type="radio" id="pineapple" value="pineapple" name="topping">
                        <label for="pineapple">Pineapple</label>
                        <input type="radio" id="onions" value="onions" name="topping">
                        <label for="onions">Onions</label>
                        <input type="radio" id="spinach" value="spinach" name="topping">
                        <label for="spinach">Spinach</label>

                        <select class="quantity" name="quantity" id="quantity">
                            <option value="light">Light</option>
                            <option value="regular">Regular</option>
                            <option value="extra">Extra</option>
                        </select>

                    </div>
                    
                    <hr>

                    <p>Use points: <?php echo $user['upoints']; ?></p> <!-- Use function to fetch sign in user points-->
                    Your points are automatically applied and will be deducted after submitting your order.
                   <?php $currentPrice = 10;
                   if ($user['upoints'] >=100){
                       $currentPrice -= 10;
                   }
                   ?>

                    <p>You pay: $<?php echo $currentPrice; ?>.00</p> <!-- Use button function to subtract from price and take away all points from user-->
                    

                    <input type="submit" value="Order" class="btn btn-secondary">    
                </form>
            </div>

			<!-- Footer -->
			<?php include("footer.php"); ?>

		</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>