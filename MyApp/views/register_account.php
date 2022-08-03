<!-- import other file -->
<?php
require("../models/dataaccess.php");
require("../config.php");

// $thisfilename = basename(__FILE__);
?>

<!-- confirm session -->


<?php include("../templates/header.php"); ?>


    
    
    

<form method="POST" action="<?php $thisfilename; ?>">
<div class="contents">
    <p class="v2_4">Diary</p>
    <p class="subtitle">Register</p>
    <!-- username -->
    <div class="v2_20">
        <input type="text" class="v2_6" name="input_username" required>
        <p class="v2_7">User Name</p>
    </div>
    <!-- password -->
    <div class="v2_19">
        <input type="password" class="v2_8" name="input_password" required>
        <p class="v2_9">Password</p>
    </div>
    <!-- signin -->
    <div class="v2_16">
        <input type="submit" class="v2_17" value="submit">
        <p class="v2_18">Register</p>
    </div>
</div>
</form>


<?php
// request.method == "POST"
$username = $_POST["input_username"];
$pass = $_POST["input_password"];

$user = checkuser($username,$pass);


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

