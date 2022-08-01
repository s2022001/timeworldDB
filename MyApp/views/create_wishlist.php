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
<form action="<?php $thisfilename;?>" method="POST">
<body class="col-md-10">
    　<div class="spotname col-md-6">
        <div class="spot_frame"></div>
        <p class="column">Spot Name</p>
      </div>
      <div class="location col-md-6">
        <div class="loc_frame">
            <input type="text" name="input_location" required>
        </div>
        <span class="loc_txt">Location</span>
      </div>
      <div class="category col-md-6">
        <div class="category_frame">
            <input type="text" name="input_category" required>
        </div>
        <span class="category_txt">Category</span>
      </div>
      <div class="url col-md-6">
        <div class="url_frame">
            <input type="text" name="input_url" required>
        </div>
        <span class="url_txt">URL</span>
      </div>
      
      <div class="add col-md-6">
        <div class="add_btn">
            <input type="submit" name="submit">
        </div>
        <span class="add_txt">追加</span>
      </div>
</body>
</form>
<?php

if (isset($_POST["submit"])) {
    $spot_name = "TEST";
    $location = $_POST["input_location"];
    $category = $_POST["input_category"];
    $url = $_POST["input_url"];

    $data = "('${spot_name}', ${location}, '${category}', '${url}', '${user_id}')";

    insertdata("wishlists", $data);
    echo "PASS!!";

    header("Location: home.php");
    exit();
}

?>

<?php include("../templates/footer.php"); ?>