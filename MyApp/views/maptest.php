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
$lat = 35.8625;
$lon = 139.6073;
$date = '2022/08/03';
$spot = '埼玉大学';

?>
    <body onload="map(<?php echo $lat; ?>, <?php echo $lon; ?>, '<?php echo $date; ?>', '<?php echo $spot; ?>')">
        <div id="mapcontainer" style="position:absolute;top:0;left:0;right:0;bottom:0;"></div>
    </body>
</html>