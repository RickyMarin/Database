 <!DOCTYPE HTML>
<!--
	Alpha by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
<head>
    <title>Contact</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="assets/css/main.css" />
</head>
<body class="is-preload">
<div id="page-wrapper">

    <!-- Header -->
    <?php include("header.php"); ?>

    <section class="box special">
                    <header class="major">
                        <h2>Tell us about your experience!</h2>
                    </header>

                    <form action="/action_page.php">
                        <label for="email">Email:</label><br>
                        <input type="text" id="email" name="email"><br>
                        <label for="note">Note:</label><br>
                        <textarea id="note" name="note" rows="8" cols="25">
Help us improve Hoo's Pizza!
                        </textarea>
                        <input type="submit" value="Submit" style="margin:15px;">
                    </form> 
                    <!--<span class="image featured"><img src="images/pic01.jpg" alt="" /></span>-->
                </section>

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
