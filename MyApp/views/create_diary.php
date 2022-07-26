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

<div class="v12_400">
    <div class="v12_402">
        <div class="v12_403"></div>
        <div class="v12_404"></div>
    </div>
    <div class="v12_405">
        <div class="v12_406"></div>
        <span class="v12_407">Wish list</span>
        <span class="v12_408">Memory</span>
        <span class="v12_409">Diary</span>
    </div>
    <div class="v12_418">
        <div class="v12_419"></div>
        <span class="v13_427">年</span>
        <div class="v13_428"></div>
        <span class="v13_429">月</span>
        <div class="v13_430"></div>
        <span class="v13_431">日</span>
        <span class="v12_420">Date</span>
    </div>
    <div class="v13_424">
        <div class="v13_425"></div>
        <span class="v13_426">Location</span>
    </div>
    <span class="v13_435">ファイルを追加</span>
    <span class="v15_2">＋</span>
    <div class="v13_432">
        <div class="v13_433"></div>
        <span class="v13_434">Picture</span>
    </div>
    <div class="v12_421">
        <div class="v12_422"></div>
        <span class="v12_423">Text</span>
    </div>
    <div class="v15_3">
        <div class="v15_5"></div>
        <span class="v15_6">記録</span>
    </div>
</div>

<?php


?>

<?php include("../templates/footer.php"); ?>