<!-- import other file -->
<?php
require("../models/dataaccess.php");
require("../config.php");

// $thisfilename = basename(__FILE__);
?>

<!-- confirm session -->


<?php include("../templates/header.php"); ?>

<form method="POST" action="login.php">
    <input type="text" name="input_username" required>
    <input type="password" name="input_password" required>
    <input type="number" name="n">
    <input type="submit" value="submit">
</form>



<?php
// request.method == "POST"
$n = $_POST["n"];
$username = $_POST["input_username"];
$pass = $_POST["input_password"];

echo $username;

if (isset($username)===true) {
    session_start();

    $_SESSION["username"] = $username;
    echo $_SESSION["username"];

    header("Location: index.php");
    exit();
} else {
    echo "OUT!!!";
}

?>



<?php include("../templates/footer.php"); ?>

