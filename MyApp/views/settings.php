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
        <div class="v2_6">
        <input type="text" name="input_username" value="<?php $username;?>" required>
        </div>
        <p class="v2_7">User Name</p>
    </div>
    <!-- password -->
    <div class="v2_19">
        <div class="v2_8">
        <input type="password" name="input_password" value="<?php $password;?>" required>
        </div>
        <p class="v2_9">Password</p>
    </div>
    <!-- signin -->
    <div class="v2_16">
        <div class="v2_17">
        <input type="submit" name="submit" value="submit">
        </div>
        <p class="v2_18">Register</p>
    </div>
</div>
</form>

<?php
if (isset($_POST["submit"])) {
    $input_username = $_POST["input_username"];
}

?>

<?php include("../templates/footer.php"); ?>