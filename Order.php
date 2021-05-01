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
    </script>

	<body class="is-preload">
		<div id="page-wrapper">

			<!-- Header -->
            <?php include("header.php"); ?>

            <div style="padding:7%;">
                <form method="post" style="padding:2%;border: 2px solid;border-radius:25px;">

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
                    <p>Choose Meats:</p>

                    <div class="pizza-topping">
                    <input type="checkbox" id="pepperoni" name="pepperoni" onclick="displayFunction('pepperoni-topping')">
                    <label for="pepperoni">Pepperoni</label>
                    <select class="pepperoni-topping" name="pepperoni-topping" id="pepperoni-topping" style="display:none;">
                        <option value="light">Light</option>
                        <option value="regular">Regular</option>
                        <option value="extra">Extra</option>
                    </select>
                    </div>

                    <div class="pizza-topping">
                    <input type="checkbox" id="chicken" name="chicken" onclick="displayFunction('chicken-topping')">
                    <label for="chicken">Chicken</label>
                    <select class="chicken-topping" name="chicken-topping" id="chicken-topping" style="display:none;">
                        <option value="light">Light</option>
                        <option value="regular">Regular</option>
                        <option value="extra">Extra</option>
                    </select>
                    </div>

                    <div class="pizza-topping">
                    <input type="checkbox" id="ham" name="ham" onclick="displayFunction('ham-topping')">
                    <label for="ham">Ham</label>
                    <select class="ham-topping" name="ham-topping" id="ham-topping" style="display:none;">
                        <option value="light">Light</option>
                        <option value="regular">Regular</option>
                        <option value="extra">Extra</option>
                    </select>
                    </div>

                    <div class="pizza-topping">
                    <input type="checkbox" id="beef" name="beef" onclick="displayFunction('beef-topping')">
                    <label for="beef">Beef</label>
                    <select class="beef-topping" name="beef-topping" id="beef-topping" style="display:none;">
                        <option value="light">Light</option>
                        <option value="regular">Regular</option>
                        <option value="extra">Extra</option>
                    </select>
                    </div>

                    <p>Choose Nonmeats:</p>

                    <div class="pizza-topping">
                    <input type="checkbox" id="cheddar-cheese" name="cheddar-cheese" onclick="displayFunction('cheddar-cheese-topping')">
                    <label for="cheddar-cheese">Cheddar Cheese</label>
                    <select class="cheddar-cheese-topping" name="cheddar-cheese-topping" id="cheddar-cheese-topping" style="display:none;">
                        <option value="light">Light</option>
                        <option value="regular">Regular</option>
                        <option value="extra">Extra</option>
                    </select>
                    </div>

                    <div class="pizza-topping">
                    <input type="checkbox" id="pineapple" name="pineapple" onclick="displayFunction('pineapple-topping')">
                    <label for="pineapple">Pineapple</label>
                    <select class="pineapple-topping" name="pineapple-topping" id="pineapple-topping" style="display:none;">
                        <option value="light">Light</option>
                        <option value="regular">Regular</option>
                        <option value="extra">Extra</option>
                    </select>
                    </div>

                    <div class="pizza-topping">
                    <input type="checkbox" id="onions" name="onions" onclick="displayFunction('onions-topping')">
                    <label for="onions">Onions</label>
                    <select class="onions-topping" name="onions-topping" id="onions-topping" style="display:none;">
                        <option value="light">Light</option>
                        <option value="regular">Regular</option>
                        <option value="extra">Extra</option>
                    </select>
                    </div>

                    <div class="pizza-topping">
                    <input type="checkbox" id="spinach" name="spinach" onclick="displayFunction('spinach-topping')">
                    <label for="spinach">Spinach</label>
                    <select class="spinach-topping" name="spinach-topping" id="spinach-topping" style="display:none;">
                        <option value="light">Light</option>
                        <option value="regular">Regular</option>
                        <option value="extra">Extra</option>
                    </select>
                    </div>
                    
                    <hr>

                    <input type="submit" value="Order" class="btn btn-secondary">    
                </form>
            </div>
            

            <!--
            <div class="pizza-topping">
                <input type="checkbox" id="ham" name="ham" onclick="displayFunction('ham-topping')">
                <label for="ham">Ham</label>
                <select class="ham-topping" name="ham-topping" id="ham-topping" style="display:none;">
                    <option value="light">Light</option>
                    <option value="regular">Regular</option>
                    <option value="extra">Extra</option>
                </select>
            </div>
            -->


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