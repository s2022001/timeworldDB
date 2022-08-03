<!-- import other file -->
<?php

session_start();
require("../models/dataaccess.php");
require("../config.php");

$thisfilename = basename(__FILE__);
?>

<!-- confirm session -->
<?php
$user_id = $_SESSION["user_id"];

// session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}
?>

<?php
$user_result = selectdata("users",$user_id);
for ($i = 0; $i < pg_num_rows($user_result); $i++){
    $rows = pg_fetch_array($user_result,NULL,PGSQL_ASSOC);
    $username = $rows["user_name"];
    $password = $rows["password"];
}
?>


<?php include("../templates/header.php"); ?>

<!-- here is content -->

<form method="POST" action="<?php $thisfilename; ?>">
<div class="contents">
    <p class="v2_4">Diary</p>
    <p class="subtitle">Change Your Info</p>
    <!-- username -->
    <div class="v2_20">
        <input type="text" class="v2_6" name="input_username" value="<?php $username;?>" required>
        <p class="v2_7">User Name</p>
    </div>
    <!-- password -->
    <div class="v2_19">
        <input type="password" class="v2_8" name="input_password" value="<?php $password;?>" required>
        <p class="v2_9">Password</p>
    </div>
    <!-- signin -->
    <div class="v2_16">
        <input type="submit" class="v2_17" name="submit">
        <p class="v2_18">Change</p>
    </div>
</div>
</form>

<?php
if (isset($_POST["submit"])) {
    $input_username = $_POST["input_username"];
    $input_password = $_POST["input_password"];

    $user = checkuser($input_username,$input_password);


    if ($user==="No exists such user") {
        

        $sql = "UPDATE users SET user_name='${input_username}', password='${input_password}' WHERE user_id=${user_id};";
        updatedata($sql);

        header("Location: home.php");
        exit();

    } else {
        echo "check user :".$user;
    }
}

?>

<?php include("../templates/footer.php"); ?>