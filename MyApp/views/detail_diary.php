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

<h1>index!!!!</h1>

<?php

$diary_id = $_POST["diary_id"];

$diary_data = searchonedata($diary_id);

for ($i = 0; $i < pg_num_rows($diary_data); $i++){
    $rows = pg_fetch_array($diary_data,NULL,PGSQL_ASSOC);
    $img_path = $config["upload_dir"].$rows["filename"];
    echo $img_path;
    echo '<h1>'.$rows["spot_name"].'</h1>';
    echo "<p>".$rows["content"]."</p>";
    echo '<img src='.$img_path.' width=50% height=100px></img>';
}
?>

<?php include("../templates/footer.php"); ?>