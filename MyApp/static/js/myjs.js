function map(lat, lon, date, spot, cap) {
    var map = L.map('mapcontainer', { zoomControl: false });
    var loc = [lat, lon];
    var date = date;
    var spot = spot;
    var cap = cap;
    map.setView(loc, 15);
    L.tileLayer('https://c.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: "<a href='https://www.openstreetmap.org/copyright' target='_blank'>OpenStreetMap</a> contributors, "
    }).addTo(map);
    //ポップアップする文字（HTML可、ここでは画像を表示）
    var sucontents = date + "<br>" + spot + "<br>" + cap;
    //ポップアップオブジェクトを作成
    var popup = L.popup({ maxWidth: 550 }).setContent(sucontents);
    // var date = "2022/07/31";
    // var popup2 = L.popup().setContent(date + "<br>" + spot);
    //マーカーにポップアップを紐付けする。同時にbindTooltipでツールチップも追加
    L.marker(loc).bindPopup(popup).bindTooltip(spot).addTo(map);
    // L.marker([35.8561, 139.6098]).bindPopup(popup2).bindTooltip("桜区役所").addTo(map);
}