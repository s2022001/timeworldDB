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
<div class="v8_197">
    <div class="v8_148">
        <div class="v8_151"></div>
        <div class="v8_190"></div>
    </div>
    <div class="v8_368"></div>
    <div class="v12_383">
        <div class="v8_198"></div>
        <span class="v8_374">Wish list</span>
        <span class="v8_375">Memory</span>
        <span class="v8_206">Diary</span>
    </div>
    <div class="v8_199">
        <div class="v8_200"></div>
        <div class="v8_201"></div>
    </div>
    <div class="v12_390">
        <div class="v12_391"></div>
        <div class="v12_392"></div>
        <span class="v12_393">作成</span>
    </div>
    <div class="v30_89">
        <div class="v30_90">
            <div class="v30_91"></div>
            <div class="name"></div>
            <div class="name"></div>
            <div class="v30_94"></div>
            <span class="v30_95">Jun.10, 2022</span>
            <span class="v30_96">新大久保</span>
            <span class="v30_97">辛いものいっぱいかと思ったけどそうではなさそう…？</span>
            <div class="v30_98"></div>
            <span class="v30_99">Image</span>
        </div>
        <div class="v30_100">
            <div class="v30_101"></div>
            <div class="name"></div>
            <div class="name"></div>
            <div class="v30_104"></div>
            <span class="v30_105">Jun.04, 2022</span>
            <span class="v30_106">越谷レイクタウン</span>
            <span class="v30_107">VSパークに遊びに行った〜</span>
            <div class="v30_108"></div>
            <span class="v30_109">Image</span>
        </div>
        <div class="v30_110">
            <div class="v30_111"></div>
            <div class="name"></div>
            <div class="name"></div>
            <div class="v30_114"></div>
            <span class="v30_115">Jun.04, 2022</span>
            <span class="v30_116">越谷レイクタウン</span>
            <span class="v30_117">卵と私に初潜入！美味しかった〜！</span
            ><div class="v30_118"></div>
            <span class="v30_119">Image</span>
        </div>
        <div class="v30_120">
            <div class="v30_121"></div>
            <div class="name"></div>
            <div class="name"></div>
            <div class="v30_124"></div>
            <span class="v30_125">May.30, 2022</span>
            <span class="v30_126">南大沢</span>
            <span class="v30_127">やることやって南大沢へ！</span>
            <div class="v30_128"></div>
            <span class="v30_129">Image</span>
        </div>
        <div class="v30_130">
            <div class="v30_131"></div>
            <div class="name"></div>
            <div class="name"></div>
            <div class="v30_134"></div>
            <span class="v30_135">Jun.10, 2022</span>
            <span class="v30_136">新大久保</span>
            <span class="v30_137">辛いものいっぱいかと思ったけどそうではなさそう…？</span>
            <div class="v30_138"></div>
            <span class="v30_139">Image</span>
        </div>
        <div class="v30_140">
            <div class="v30_141"></div>
            <div class="name"></div>
            <div class="name"></div>
            <div class="v30_144"></div>
            <span class="v30_145">Jun.04, 2022</span>
            <span class="v30_146">越谷レイクタウン</span>
            <span class="v30_147">VSパークに遊びに行った〜</span>
            <div class="v30_148"></div>
            <span class="v30_149">Image</span>
        </div>
        <div class="v30_150">
            <div class="v30_151"></div>
            <div class="name"></div>
            <div class="name"></div>
            <div class="v30_154"></div>
            <span class="v30_155">Jun.04, 2022</span>
            <span class="v30_156">越谷レイクタウン</span>
            <span class="v30_157">卵と私に初潜入！美味しかった〜！</span>
            <div class="v30_158"></div>
            <span class="v30_159">Image</span>
        </div>
        <div class="v30_160">
            <div class="v30_161"></div>
            <div class="name"></div>
            <div class="name"></div>
            <div class="v30_164"></div>
            <span class="v30_165">May.30, 2022</span>
            <span class="v30_166">南大沢</span>
            <span class="v30_167">やることやって南大沢へ！</span>
            <div class="v30_168"></div>
            <span class="v30_169">Image</span>
        </div>
    </div>
    <div class="v39_174">
        <div class="v39_176"></div>
        <span class="v39_177">検索する</span>
        <div class="v39_179"></div>
    </div>
</div>

<?php


?>

<?php include("../templates/footer.php"); ?>