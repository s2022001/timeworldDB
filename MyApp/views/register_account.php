<!-- import other file -->
<?php
require("../models/dataaccess.php");
require("../config.php");

// $thisfilename = basename(__FILE__);
?>

<!-- confirm session -->


<?php include("../templates/header.php"); ?>

<form method="POST" action="<?php $thisfilename; ?>">
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

if ($user==="No exists such user") {

    $data = "('${username}', '${pass}')";
    insertdata("users",$data);

    header("Location: login.php");
    exit();

} else {
    echo "check user :".$user;
}

?>



<?php include("../templates/footer.php"); ?>

