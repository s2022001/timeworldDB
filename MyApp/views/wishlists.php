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

<div class="v8_291">
    <div class="v8_303">
        <div class="v8_304"></div>
        <div class="v8_371"></div>
    </div>
    <div class="v8_306">
        <div class="v8_307"></div>
        <div class="name"></div>
        <div class="name"></div>
        <span class="v8_311">清里バーガー</span>
        <span class="v8_312">foof</span>
        <span class="v8_351">https://www.makiba-res.com/</span>
        <div class="v8_360"></div>
        <div class="v8_359"></div>
    </div>
    <div class="v8_316">
        <div class="v8_317"></div>
        <div class="name"></div>
        <div class="name"></div>
        <span class="v8_321">赤福の店舗</span>
        <span class="v8_322">food</span>
        <span class="v8_355">https://www.akafuku.co.jp/</span>
        <div class="v8_362"></div>
        <div class="v8_366"></div>
    </div>
    <div class="v8_326">
        <div class="v8_361"></div>
        <div class="v8_327"></div>
        <div class="name"></div>
        <div class="name"></div>
        <span class="v8_331">モスプレミアム</span>
        <span class="v8_332">food</span>
        <span class="v8_356">https://www.mospremium.jp/index.html</span>
        <div class="v8_365"></div>
    </div>
    <div class="v8_336">
        <div class="v8_364"></div>
        <div class="v8_358"></div>
        <div class="v8_337"></div>
        <div class="name"></div>
        <div class="name"></div>
        <span class="v8_341">グラニースミス</span>
        <span class="v8_342">food</span>
        <span class="v8_357">https://www.grannysmith-pie.com/</span>
    </div>
    <div class="v8_293">
        <div class="v8_294"></div>
        <div class="v8_295"></div>
    </div>
    <div class="v12_384">
        <div class="v8_292"></div>
        <span class="v8_377">Memory</span>
        <span class="v15_41">Wish list</span>
        <span class="v8_300">Diary</span>
    </div>
    <div class="v12_394">
        <div class="v12_396"></div>
        <span class="v12_397">追加</span>
        <div class="v12_399"></div>
    </div>
</div>

<?php


?>

<?php include("../templates/footer.php"); ?>