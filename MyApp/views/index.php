<!-- import other file -->
<?php
require("../models/dataaccess.php");
require("../config.php");
?>

<!-- confirm session -->
<?php
// session_start();
// if (!isset($_SESSION["user_name"])) {
//     header("Location: login.php");
//     exit();
// }
?>

<?php include("../templates/header.php"); ?>

<h1>index!!!!</h1>

<?php

echo $_SESSION["username"];
?>

<?php include("../templates/footer.php"); ?>