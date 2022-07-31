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

<?php include("../templates/header.php"); ?>

<!-- here is content -->

<div class="v12_401">
    <div class="v12_410">
        <div class="v12_411"></div>
        <div class="v12_412"></div>
    </div>
    <div class="v12_413">
        <div class="v12_414"></div>
        <span class="v12_415">Wish list</span>
        <span class="v12_416">Memory</span>
        <span class="v12_417">Diary</span>
    </div>
    <div class="v15_18">
        <div class="v15_19"></div>
        <span class="v15_20">Category</span>
    </div>
    <div class="v15_35">
        <div class="v15_36"></div>
        <span class="v15_37">URL</span>
    </div>
    <div class="v15_32">
        <div class="v15_33"></div>
        <span class="v15_34">Location</span>
    </div>
    <div class="v15_29">
        <div class="v15_30"></div>
        <span class="v15_31">追加</span>
    </div>
</div>

<?php


?>

<?php include("../templates/footer.php"); ?>