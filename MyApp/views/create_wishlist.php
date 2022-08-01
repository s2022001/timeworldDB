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
        <!-- <div class="spot_frame"></div> -->
        <input type="text" class="spot_frame" name="input_spotname" required>
        <p class="column">Spot Name</p>
      </div>
      <div class="location col-md-6">
        
        <input type="text" class="loc_frame" name="input_location" required>
        
        <span class="loc_txt">Location</span>
      </div>
      <div class="category col-md-6">
        
        <select class="category_frame" name="input_category">
            <option value="food">Food</option>
            <option value="amusement">Amusement</option>
            <option value="sightseeing">Sightseeing</option>
            <option value="refreshed">Refreshed</option>
            <option value="shopping">Shopping</option>
        </select>
        <span class="category_txt">Category</span>
      </div>
      <div class="url col-md-6">
        
        <input type="text" class="url_frame" name="input_url" required>
        
        <span class="url_txt">URL</span>
      </div>
      
      <div class="add col-md-6">
        <input type="submit" class="add_btn" name="submit">
        <span class="add_txt">追加</span>
      </div>
</body>
</form>
<?php

if (isset($_POST["submit"])) {
    $spot_name = $_POST["input_spotname"];
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