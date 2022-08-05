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

if (isset($_SESSION["map_type"])) {
  unset($_SESSION["map_type"]);
}
$_SESSION["map_type"] = "CREATEWISHLIST";
?>



<?php include("../templates/header.php"); ?>


<!-- here is content -->
<form action="<?php $thisfilename;?>" method="POST">
  <body class="col-md-10">
    <div class="spotname col-md-6">
      <!-- <div class="spot_frame"></div> -->
      <input type="text" class="frame" name="input_spotname" required>
      <p class="column">Spot Name</p>
    </div>
    <div class="location col-md-6" style="top: 130px; left: 0px; width: 355px;">
      
      <input type="text" class="frame" id="wishlistlocation" name="input_location" required>
      
      <p class="column">Location</p>
      <br>
      <a href="insertlocation.php">地図入力はこちら（調整中）</a>

      <?php
      // if (isset($_POST[""]))
      ?>

    </div>
    <div class="category col-md-6">
      
      <select class="frame" name="input_category">
        <option value="food">Food</option>
        <option value="amusement">Amusement</option>
        <option value="sightseeing">Sightseeing</option>
        <option value="refreshed">Refreshed</option>
        <option value="shopping">Shopping</option>
      </select>
      <p class="column">Category</p>
    </div>
    <div class="url col-md-6">
      
      <input type="text" class="frame" name="input_url" required>
      
      <p class="column">URL</p>
    </div>
    
    <div class="wadd col-md-6">
      <input type="submit" class="wadd_btn" name="submit" value="追加">
      <!-- <p class="wadd_txt">追加</p> -->
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