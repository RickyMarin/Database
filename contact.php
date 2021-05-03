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

<?php include("header.php"); ?>
<?php include("library.php"); ?>
<?php
if(($_SERVER["REQUEST_METHOD"] == "POST"))
{
    $uemail = $_POST['email'];
    echo $uemail;
    $rid = rand(0, 10000);
    $rnote = $_POST['note'];
    $result = $db->prepare("INSERT INTO Request (rid, uemail, rnote) VALUES (0, test, test)");
    $result->execute();
    echo "Hi";
}
?>
<body class="is-preload">
<div id="page-wrapper">

    <!-- Header -->



    <section class="box special">
        <header class="major">
            <h2>Tell us about your experience!</h2>
        </header>

        <?php
        session_start();
        if(!isset($_SESSION['logged_in'])){
            header("Location:SignUp.php");
        }
        ?>

        <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" >
            <label for="email">Email:</label><br>
            <input type="text" id="email" name="email"><br>
            <label for="note">Note:</label><br>
            <textarea id="note" name="note" rows="8" cols="25">
Help us improve Hoo's Pizza!
                        </textarea>
            <input type="submit" name = "Submit" value="Submit" style="margin:15px;">
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

<?php
function button_select()
{



}

?>

</body>
</html>
