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

	<body class="is-preload">
		<div id="page-wrapper">

			<!-- Header -->
            <?php include("header.php"); ?>



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