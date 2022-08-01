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

<body class="col-md-10">
      <div class="location col-md-6">
        <div class="loc_frame"></div>
        <span class="loc_txt">Location</span>
      </div>
      <div class="category col-md-6">
        <div class="category_frame"></div>
        <span class="category_txt">Category</span>
      </div>
      <div class="url col-md-6">
        <div class="url_frame"></div>
        <span class="url_txt">URL</span>
      </div>
      
      <div class="add col-md-6">
        <div class="add_btn"></div>
        <span class="add_txt">追加</span>
      </div>
</body>

<?php


?>

<?php include("../templates/footer.php"); ?>