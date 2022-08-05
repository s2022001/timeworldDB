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


//マーカーに表示したい対象の緯度経度とポップアップする名称を設定
// var markerList = [
//     { pos: [35.8645472, 139.6048663], name: "セブンイレブン浦和埼玉大学店" },
//     { pos: [35.8689857, 139.6086909], name: "セブンイレブンさいたま大久保店" },
//     { pos: [35.871305, 139.6128431], name: "ファミリーマート浦和上大久保店" },
//     { pos: [35.8665389, 139.6133905], name: "ミニストップさいたま上大久保店" },
//     { pos: [35.8650306, 139.6070633], name: "ローソン埼玉大学店" }
// ];
function markerlists(lat, lon, date, spot, cap){
    markerlists.loc = [lat, lon];
    markerlists.date = date;
    markerlists.spot = spot;
    markerlists.cap = cap;

    console.log(markerlists);
}

function init() {
    var map = L.map('mapcontainer');
    L.tileLayer('https://cyberjapandata.gsi.go.jp/xyz/std/{z}/{x}/{y}.png', {
        attribution: "<a href='https://maps.gsi.go.jp/development/ichiran.html' target='_blank'>地理院タイル</a>"
    }).addTo(map);
    //マーカー全体が入るボックスを作る
    var bound = L.latLngBounds(markerList[0].pos, markerList[0].pos);
    //markerListの設定でマーカーを追加
    for (var num in markerList) {
        var mk = markerList[num];
        var popup = L.popup().setContent(mk.name);
        L.marker(mk.pos, { title: mk.name }).bindPopup(popup).addTo(map);
        //マーカー全体が入るボックスを広げる
        bound.extend(mk.pos);
    }
    //マーカー全体が入るように地図範囲を設定する
    map.fitBounds(bound);
}


function dblocation(json) {
    var map = L.map('mapcontainer');
    L.tileLayer('https://cyberjapandata.gsi.go.jp/xyz/std/{z}/{x}/{y}.png', {
        attribution: "<a href='https://maps.gsi.go.jp/development/ichiran.html' target='_blank'>地理院タイル</a>"
    }).addTo(map);
    //マーカー全体が入るボックスを作る
    var bound = L.latLngBounds(markerList[0].pos, markerList[0].pos);
    //markerListの設定でマーカーを追加
    for (var num in json) {
        var mk = markerList[num];
        var popup = L.popup().setContent(mk.name);
        L.marker(mk.pos, { title: mk.name }).bindPopup(popup).addTo(map);
        //マーカー全体が入るボックスを広げる
        bound.extend(mk.pos);
    }
    //マーカー全体が入るように地図範囲を設定する
    map.fitBounds(bound);
}




function extractlocation(map_type) {
    var map = L.map('mapcontainer', { zoomControl: false });
    var map_type = map_type;

    map.setView([35,135], 15);
    L.tileLayer('https://c.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: "<a href='https://www.openstreetmap.org/copyright' target='_blank'>OpenStreetMap</a> contributors, "
    }).addTo(map);
    //クリックイベント
    map.on('click', function(e) {
        //クリック位置経緯度取得
        lat = e.latlng.lat;
        lng = e.latlng.lng;
        //経緯度表示
        let ans = window.confirm(map_type + "lat: " + lat + ", lng: " + lng);
        // confirm Yes
        if (ans) {
            var data = {
                "lat":lat,
                "lon":lng
            };
            fetch("../../views/create_wishlist.php", {
                method: "POST",
                headers: {'Content-Type': 'application/json'},
                body: JSON.stringify(data)
            })
            .then(response => response.json())
            .then(res => {console.log(res);})
            location.href = "create_diary.php";
        }
    } );
}