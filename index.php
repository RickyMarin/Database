<!DOCTYPE HTML>
<!--
	Alpha by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Hoo's Pizza</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="landing is-preload">
		<div id="page-wrapper">

			<!-- Header -->
            <?php
            session_start();
            if(isset($_SESSION['logged_in'])){
                include("LoggedInHeader.php");
            }
            else{
                include("header.php");
            }?>


            <!-- Banner -->
				<section id="banner">
					<h2>Hoo's Pizza</h2>
					<p>When you want some pizza, you order some pizza</p>
					<ul class="actions special">
						<li><a href="SignUp.php" class="button primary">Sign Up</a></li>
                        <li><a href="Login.php" class="button primary">Log In</a></li>


                    </ul>
				</section>

			<!-- Main -->
				<section id="main" class="container">

                <section class="box special">
                    <header class="major">
                        <h2>Introducing a new way
                            <br />
                            to order some pizza</h2>
                        <p>Hoo's Pizza let's you order the pizza you've always wanted, but never got.</p>
                    </header>
                    <!--<span class="image featured"><img src="images/pic01.jpg" alt="" /></span>-->
                </section>



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