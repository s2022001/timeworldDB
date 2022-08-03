<!-- <!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Step6.マーカーをクリックしてポップアップ表示とツールチップ表示|Lefletの基本|埼玉大学谷謙二研究室</title>
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.0/dist/leaflet.css" />
        <script src="https://unpkg.com/leaflet@1.3.0/dist/leaflet.js"></script>
        <script>
            function init() {
                var map = L.map('mapcontainer', { zoomControl: false });
                var mpoint = [35.8627, 139.6072];
                map.setView(mpoint, 15);
                L.tileLayer('https://cyberjapandata.gsi.go.jp/xyz/std/{z}/{x}/{y}.png', {
                    attribution: "<a href='https://maps.gsi.go.jp/development/ichiran.html' target='_blank'>地理院タイル</a>"
                }).addTo(map);
                //ポップアップする文字（HTML可、ここでは画像を表示）
                var sucontents = "埼玉大学です<br><img src='su.jpg' width='500' height='375'>"
                //ポップアップオブジェクトを作成
                var popup1 = L.popup({ maxWidth: 550 }).setContent(sucontents);
                var popup2 = L.popup().setContent("桜区役所です");
                //マーカーにポップアップを紐付けする。同時にbindTooltipでツールチップも追加
                L.marker(mpoint, { draggable: true }).bindPopup(popup1).bindTooltip("埼玉大学").addTo(map);
                L.marker([35.8561, 139.6098]).bindPopup(popup2).bindTooltip("桜区役所").addTo(map);
            }
        </script>
    </head>
    <body onload="init()">
        <div id="mapcontainer" style="position:absolute;top:0;left:0;right:0;bottom:0;"></div>
    </body>
</html> -->

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Step6.マーカーをクリックしてポップアップ表示とツールチップ表示|Lefletの基本|埼玉大学谷謙二研究室</title>
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.0/dist/leaflet.css" />
        <script src="https://unpkg.com/leaflet@1.3.0/dist/leaflet.js"></script>
        <script>
            function map(loc, date, spot) {
                var map = L.map('mapcontainer', { zoomControl: false });
                var loc = loc;
                var date = date;
                var spot = spot;
                map.setView(loc, 15);
                L.tileLayer('https://c.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: "<a href='https://www.openstreetmap.org/copyright' target='_blank'>OpenStreetMap</a> contributors, "
                }).addTo(map);
                //ポップアップする文字（HTML可、ここでは画像を表示）
                var sucontents = date + "<br>" + spot;
                //ポップアップオブジェクトを作成
                var popup1 = L.popup({ maxWidth: 550 }).setContent(sucontents);
                var date = "2022/07/31";
                var popup2 = L.popup().setContent(date + "<br>" + spot);
                //マーカーにポップアップを紐付けする。同時にbindTooltipでツールチップも追加
                L.marker(loc).bindPopup(popup1).bindTooltip(spot).addTo(map);
                L.marker([35.8561, 139.6098]).bindPopup(popup2).bindTooltip("桜区役所").addTo(map);
            }
        </script>
    </head>
    
<?php
$lat = 35.8625;
$lon = 139.6073;
$date = '2022/08/02';
$loc = '埼玉大学';

?>
    <body onload="map(<?php '['.$lat.', '.$lon.'], '.$date.', '.$loc ?>)">
        <div id="mapcontainer" style="position:absolute;top:0;left:0;right:0;bottom:0;"></div>
    </body>
</html>