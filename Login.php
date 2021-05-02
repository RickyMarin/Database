<!DOCTYPE HTML>
<!--
	Alpha by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
<head>
    <title>Login Page </title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="assets/css/main.css" />
</head>
<?php include("library.php"); ?>
<?php
function makeSafe($value)
{
    $value = htmlspecialchars($value);
    return $value;
}
if(isset($_SESSION['logged_in'])){
    header("Location:Order.php");
}

$msg = '';

// Always start this first
session_start();
if ( ! empty( $_POST ) ) {
 if ( isset( $_POST['email'] ) && isset( $_POST['password'] ) ) {
 // Getting submitted user data from database

 $stmt = $db->prepare("SELECT * FROM Users WHERE uemail = ?");
 $stmt->execute([$_POST['email']]);
 $user = $stmt->fetch();

 // Verify user password and set $_SESSION
 if ( password_verify( $_POST['password'], $user['upass'] ) ) {
 $_SESSION['email'] = $user['uemail'];
     header("Location:Order.php");
     $_SESSION['logged_in'] = true;
 }
 else{
echo $user->upass;
     echo "Invalid password. Please try again";
 }
 }
}


?>
<body class="is-preload">
<div id="page-wrapper">

    <!-- Header -->
    <?php include("header.php"); ?>

    <section id="main" class="container medium">
        <header>
            <h2>Login Here!</h2>
            <p>Enjoy Pizza and Earn Rewards!</p>
        </header>
        <?php if (!empty($msg)) {
            echo "<center><h2>$msg</h2></center>";
        } ?>
        <div class="box">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="row gtr-50 gtr-uniform">
                    <div class="col-12">
                        <input type="text" name="email" id="email" value="" placeholder="Email" />
                    </div>
                    <div class="col-12">
                        <input type="password" name="password" id="password" value="" placeholder="Password" />
                    </div>
                    <div class="col-12">
                        <ul class="actions special">
                            <li><input type="submit" value="Login" /></li>
                        </ul>
                    </div>
                </div>
            </form>
        </div>
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