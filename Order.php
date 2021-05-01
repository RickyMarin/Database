<!DOCTYPE HTML>
<!--
	Alpha by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
        <link rel="icon" href="images/favicon.ico" type="image/ico">
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

            <div style="padding:2%;">
            <h2>Topppings:</h2>
                <form method="post">
                    <p>Choose Meats:</p>

                    <!--
                    <label for="light">Light</label>
                    <input type="radio" id="regular" name="quantity" value="regular">
                    <label for="regular">Regular</label>
                    <input type="radio" id="extra" name="quantity" value="extra">
                    <label for="extra">Extra</label>
                    -->

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
                    <input type="checkbox" id="cheese" name="cheese" onclick="displayFunction('cheese-topping')">
                    <label for="cheese">Cheese</label>
                    <select class="cheese-topping" name="cheese-topping" id="cheese-topping" style="display:none;">
                        <option value="light">Light</option>
                        <option value="regular">Regular</option>
                        <option value="extra">Extra</option>
                    </select>
                    </div>

                    <div class="pizza-topping">
                    <input type="checkbox" id="pineapple" name="pineapple" onclick="displayFunction('pineapple-topping')">
                    <label for="cheese">Pineapple</label>
                    <select class="pineapple-topping" name="pineapple-topping" id="pineapple-topping" style="display:none;">
                        <option value="light">Light</option>
                        <option value="regular">Regular</option>
                        <option value="extra">Extra</option>
                    </select>
                    </div>

                    <input type="submit" value="Save" class="btn btn-secondary">    
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