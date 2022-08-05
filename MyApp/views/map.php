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
        <!-- <script src="../static/js/myjs.js"></script> -->
    </head>

    <body>
        <div id="mapcontainer" style="position:absolute;top:0;left:0;right:0;bottom:0;"></div>
    <script type="text/javascript">

        var map = L.map('mapcontainer', { zoomControl: false });
        map.setView([35,135], 5);
        L.tileLayer('https://c.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: "<a href='https://www.openstreetmap.org/copyright' target='_blank'>OpenStreetMap</a> contributors, "
        }).addTo(map);

    
    
<?php
session_start();

if ($_SESSION["map_type"] === "ALL_DIARY") {
    $diary_row = selectdata("diary",$user_id);
    $num_px = 0;
    for ($i = 0; $i < pg_num_rows($diary_row); $i++){
        $rows = pg_fetch_array($diary_row,NULL,PGSQL_ASSOC);
        $diary_id = $rows["diary_id"];

        $popupcontent = $rows["spot_name"];
        $popup = "L.popup({ maxWidth: 550 }).setContent('$popupcontent')";
        echo 'L.marker(['.$rows["lat"].', '.$rows["lon"].']).bindPopup('.$popup.').addTo(map); ';

        // echo "<form action='detail_diary.php' method='POST' name='show_detail'>";
        // echo "<button type='submit' class='frame-normal flex-md-row mb-4 shadow-sm h-md-250'>";
        // echo '<div class="card-body d-flex flex-column align-items-start">';
        // echo '<h3 class="md-0"><p class="text-dark">'.$rows["register_at"].'</p></h3>';
        // echo '<p class="mb-1 text-muted">'.$rows["spot_name"].'</p>';
        // echo '<p class="mcard-text mb-auto">'.$rows["content"].'</p>';
        // echo "<input type='hidden' name='diary_id' value='${diary_id}'>";
        // echo '</div>';
        // echo "</button>";

        // echo "</form>";


        $num_px += 15;
    }
} elseif ($_SESSION["map_type"] === "ALL_WISHLISTS") {
    $wishlist_row = selectdata("wishlists",$user_id);
    $num_px = 0;
    for ($i = 0; $i < pg_num_rows($wishlist_row); $i++){
        $rows = pg_fetch_array($wishlist_row,NULL,PGSQL_ASSOC);
        
        $popupcontent = $rows["spot_name"];
        $popup = "L.popup({ maxWidth: 550 }).setContent('$popupcontent')";
        echo 'L.marker(['.$rows["lat"].', '.$rows["lon"].']).bindPopup('.$popup.').addTo(map); ';
    }
    // $jsondata = json_encode($mapmarker);
    // echo '<script>', 'dblocation(', $jsondata, ')', '</script>';

}

?>

    </script>
    </body>


</html>