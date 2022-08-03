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