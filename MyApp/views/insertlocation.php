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

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>map</title>
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.0/dist/leaflet.css" />
        <script src="https://unpkg.com/leaflet@1.3.0/dist/leaflet.js"></script>
        <script src="../static/js/myjs.js"></script>
    </head>
    
<?php
session_start();

if ($_SESSION["map_type"] === "ALL_DIARY") {
    $lat = 35.677660131140485;

} elseif ($_SESSION["map_type"] === "ALL_WISHLISTS") {
    $lat = 35.677660131140485;

}
$map_type = $_SESSION["map_type"];

?>
    <body onload="extractlocation('<?php echo $map_type;?>')">
        <div id="mapcontainer" style="position:absolute;top:0;left:0;right:0;bottom:0;"></div>
    </body>
</html>