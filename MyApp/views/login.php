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
    <input type="submit" value="submit">
</form>



<?php
// request.method == "POST"
$username = $_POST["input_username"];
$pass = $_POST["input_password"];

$user = checkuser($username,$pass);
// $user=11;

if (is_numeric($user)===true) {
    session_start();

    $_SESSION["user_id"] = $user;
    echo $_SESSION["user_id"];

    header("Location: index.php");
    exit();

} else {
    echo "check user :".$user;
}

?>



<?php include("../templates/footer.php"); ?>

