DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS diary;
DROP TABLE IF EXISTS wishlists;
DROP TABLE IF EXISTS diary_diary_id_seq;
DROP TABLE IF EXISTS wishlists;
DROP TABLE IF EXISTS info;


CREATE TABLE users (
    user_id SERIAL PRIMARY KEY,
    user_name TEXT,
    password TEXT
);

CREATE TABLE diary (
    diary_id SERIAL PRIMARY KEY,
    register_at TIMESTAMP DEFAULT NOW(),
    spot_name TEXT,
    content TEXT,
    lat FLOAT,
    lon FLOAT,
    location GEOGRAPHY(Point, 4326),
    filename TEXT,
    user_id INTEGER

);


CREATE TABLE wishlists (
	id             SERIAL PRIMARY KEY,
	register_date  timestamp default NOW(),
	spot_name      text,
	lat            float,
	lon            float,
	category       text,
	url            text,
	flag           boolean default False,
	user_id        INTEGER
);


CREATE TABLE info (
    id SERIAL PRIMARY KEY,
    register_at TIMESTAMP default NOW(),
    user_id INTEGER,
    info_type TEXT,
    content TEXT
);


CREATE OR REPLACE FUNCTION insert_location() RETURNS trigger AS $$
-- DECLARE
--     last_id INT =: (SELECT last_value FROM diary_diary_id_seq);

BEGIN
    -- UPDATE diary SET location = ST_GeomFromText('POINT(NEW.lon NEW.lat)',4326) WHERE diary_id=((SELECT last_value FROM diary_diary_id_seq)-1);
    UPDATE diary SET location = ST_GeomFromText('POINT('|| NEW.lon ||' ' || NEW.lat ||')',4326) WHERE diary_id=(SELECT last_value FROM diary_diary_id_seq);
    RETURN NEW;

END;
$$
LANGUAGE plpgsql;


CREATE TRIGGER insert_trigger AFTER INSERT ON diary FOR EACH ROW
EXECUTE FUNCTION insert_location();

INSERT INTO users (user_name, password) VALUES ('TreasureHorce', 'as730819');

INSERT INTO diary (register_at,spot_name,content,lat,lon,filename,user_id) VALUES ('2022-06-29 12:00:00','銀座','マックで新しいご飯バーガーを食べた',35.67177529368152, 139.7646087823085,'01.jpg',1);
INSERT INTO diary (register_at,spot_name,content,lat,lon,filename,user_id) VALUES ('2022-06-20 12:00:00','サンシャイン水族館','水族館とクアアイナ行ってきた〜',35.729086254803846, 139.71950502340962,'02.jpg',1);
INSERT INTO diary (register_at,spot_name,content,lat,lon,filename,user_id) VALUES ('2022-06-19 12:00:00','横浜プラネタリウム','プラネタリウムの後に芝生カフェにも行った',35.4623611614929, 139.6245594813346,'03.jpg',1);
INSERT INTO diary (register_at,spot_name,content,lat,lon,filename,user_id) VALUES ('2022-06-18 12:00:00','東京国際フォーラム','日本酒！！！',35.67683874790371, 139.76374246785147,'04.jpg',1);
INSERT INTO diary (register_at,spot_name,content,lat,lon,filename,user_id) VALUES ('2022-06-12 12:00:00','日本科学未来館','日本科学未来館とお台場巡り〜',35.6266422545817, 139.7779085953217,'05.jpg',1);
INSERT INTO diary (register_at,spot_name,content,lat,lon,filename,user_id) VALUES ('2022-06-10 12:00:00','新大久保','辛いものいっぱいかと思ったけどそうではなさそう…？',35.701451802414105, 139.70144348498658,'06.jpg',1);
INSERT INTO diary (register_at,spot_name,content,lat,lon,filename,user_id) VALUES ('2022-06-04 12:00:00','越谷レイクタウン','VSパークに遊びに行った〜',35.883454866840765, 139.8279051738833,'07.jpg',1);
INSERT INTO diary (register_at,spot_name,content,lat,lon,filename,user_id) VALUES ('2022-05-30 12:00:00','南大沢','やることやって南大沢へ！',35.614143982672594, 139.37979248639132,'08.jpg',1);
INSERT INTO diary (register_at,spot_name,content,lat,lon,filename,user_id) VALUES ('2022-05-27 12:00:00','豊洲のジョナサン','マンゴーパフェ…',35.65369052160454, 139.79631383572084,'09.jpg',1);
INSERT INTO diary (register_at,spot_name,content,lat,lon,filename,user_id) VALUES ('2022-05-21 12:00:00','豊洲','初バイトからの五等分の映画！',35.65369052160454, 139.79631383572084,'10.jpg',1);
INSERT INTO diary (register_at,spot_name,content,lat,lon,filename,user_id) VALUES ('2022-05-15 12:00:00','渋谷','つるとんたんとヤギアイス',35.65810613615447, 139.7015475769958,'11.jpg',1);
INSERT INTO diary (register_at,spot_name,content,lat,lon,filename,user_id) VALUES ('2022-05-08 12:00:00','足利フラワーパーク','めっっっっっちゃ綺麗だった！！',36.31441543270088, 139.51994709486206,'12.jpg',1);
INSERT INTO diary (register_at,spot_name,content,lat,lon,filename,user_id) VALUES ('2022-05-06 12:00:00','お台場','肉！フェス！',35.623709617587345, 139.77384736871372,'13.jpg',1);
INSERT INTO diary (register_at,spot_name,content,lat,lon,filename,user_id) VALUES ('2022-05-04 12:00:00','上野公園','キラキラ！',35.71595000595525, 139.77395700457816,'14.jpg',1);
INSERT INTO diary (register_at,spot_name,content,lat,lon,filename,user_id) VALUES ('2022-04-28 12:00:00','東京スカイツリー','景色綺麗だったし，何よりつけ麺が美味しかった…w',35.7101323730464, 139.81078622737692,'15.jpg',1);
INSERT INTO diary (register_at,spot_name,content,lat,lon,filename,user_id) VALUES ('2022-05-08 12:00:00','豊洲','スタバのバナナナバナナ！',35.6548537210904, 139.79461609021072,'16.jpg',1);
INSERT INTO diary (register_at,spot_name,content,lat,lon,filename,user_id) VALUES ('2022-04-12 12:00:00','日光','旅行二日目！日光観光〜！',36.729537575877245, 139.6753224381494,'17.jpg',1);
INSERT INTO diary (register_at,spot_name,content,lat,lon,filename,user_id) VALUES ('2022-04-11 12:00:00','鬼怒川','やっと旅行だ〜！',36.82116722607032, 139.70832297973902,'18.jpg',1);
INSERT INTO diary (register_at,spot_name,content,lat,lon,filename,user_id) VALUES ('2022-04-04 12:00:00','池袋','お疲れ様会に…なったかな…？',35.72946862068036, 139.71005628660873,'19.jpg',1);
INSERT INTO diary (register_at,spot_name,content,lat,lon,filename,user_id) VALUES ('2022-03-31 12:00:00','浅草','浅草散策！！でっかいチキンが…w',35.71532174474916, 139.7969474027237,'20.jpg',1);
INSERT INTO diary (register_at,spot_name,content,lat,lon,filename,user_id) VALUES ('2022-03-30 12:00:00','石神井公園','え…思ったより広かった…w',35.739063912982374, 139.59901604360647,'21.jpg',1);
INSERT INTO diary (register_at,spot_name,content,lat,lon,filename,user_id) VALUES ('2022-03-28 12:00:00','有楽町','初ネックレス！！！',35.67440523110847, 139.7639594843977,'22.jpg',1);
INSERT INTO diary (register_at,spot_name,content,lat,lon,filename,user_id) VALUES ('2022-03-23 12:00:00','渋谷スカイ','一年ぶりのスカイ〜！',35.65900016516481, 139.70224261203083,'23.jpg',1);
INSERT INTO diary (register_at,spot_name,content,lat,lon,filename,user_id) VALUES ('2022-03-22 12:00:00','ミライザカ','今日はたっぷり飲んだw',35.732201593220516, 139.7093809678537,'24.jpg',1);
INSERT INTO diary (register_at,spot_name,content,lat,lon,filename,user_id) VALUES ('2022-03-21 12:00:00','銀座','おーめっちゃ変わってる〜！',35.672526480348644, 139.76580601507348,'25.jpg',1);
INSERT INTO diary (register_at,spot_name,content,lat,lon,filename,user_id) VALUES ('2022-03-16 12:00:00','有楽町コミカミノルタ','随分久しぶりのプラネタリウムだなぁ…',35.6738822989914, 139.76256473571766,'26.jpg',1);
INSERT INTO diary (register_at,spot_name,content,lat,lon,filename,user_id) VALUES ('2022-03-10 12:00:00','昭和記念公園','めっちゃ喉かなピクニック〜',35.70258873063381, 139.406762486922,'27.jpg',1);
INSERT INTO diary (register_at,spot_name,content,lat,lon,filename,user_id) VALUES ('2022-03-04 12:00:00','みなとみらい','いちごフェス！！！寒い！！w',35.452643613012604, 139.64285599879423,'28.jpg',1);
INSERT INTO diary (register_at,spot_name,content,lat,lon,filename,user_id) VALUES ('2022-02-28 12:00:00','池袋','デニーズでパフェを食べる',35.72874377995713, 139.71174456005267,'29.jpg',1);
INSERT INTO diary (register_at,spot_name,content,lat,lon,filename,user_id) VALUES ('2022-02-23 12:00:00','アメ横','ケバブを目指して上野へ！w',35.70912380458803, 139.77469039272077,'30.jpg',1);


INSERT INTO wishlists (spot_name, lat, lon, category, url, user_id)
VALUES('清里バーガー', 35.93607361922552, 138.40770423606307, 'food', 'https://www.makiba-res.com/', 1);
INSERT INTO wishlists (spot_name, lat, lon, category, url, user_id)
VALUES('赤福の店舗', 34.76266149606924, 136.61968853807184, 'food', 'https://www.akafuku.co.jp/', 1);
INSERT INTO wishlists (spot_name, lat, lon, category, url, user_id)
VALUES('モスプレミアム', 35.45212141285213, 139.6325293725925, 'food', 'https://www.mospremium.jp/index.html', 1);
INSERT INTO wishlists (spot_name, lat, lon, category, url, user_id)
VALUES('グラニースミス', 35.469303267550906, 139.62251665450935, 'food', 'https://www.grannysmith-pie.com/', 1);
INSERT INTO wishlists (spot_name, lat, lon, category, url, user_id)
VALUES('うなぎ　徳', 35.67162595341985, 139.70036846869624, 'food', 'https://www.unagiya.co.jp/', 1);

INSERT INTO wishlists (spot_name, lat, lon, category, url, user_id)
VALUES('鴨 to 葱', 35.709303010108194, 139.77533172412416, 'food', 'https://twitter.com/tokamonegy', 1);
INSERT INTO wishlists (spot_name, lat, lon, category, url, user_id)
VALUES('松戸富田製麺', 35.68048215277521, 139.76535116274053, 'food', 'http://www.tomita-cocoro.jp/', 1);
INSERT INTO wishlists (spot_name, lat, lon, category, url, user_id)
VALUES('鳥そばかぐら屋', 35.701853287525495, 139.75362860877817, 'food', 'https://www.instagram.com/kaguraya_honten', 1);
INSERT INTO wishlists (spot_name, lat, lon, category, url, user_id)
VALUES('やきとり宮川', 35.660327841537836, 139.79482643766292, 'food', 'https://yakitori-miyagawa.jp/toyosu/?utm_source=google&utm_medium=map&utm_campaign=top', 1);
INSERT INTO wishlists (spot_name, lat, lon, category, url, user_id)
VALUES('グリル満点星', 35.69928452995869, 139.76203019922121, 'food', 'https://marubiru.manten-boshi.com/?utm_source=google&utm_medium=map', 1);

INSERT INTO wishlists (spot_name, lat, lon, category, url, user_id)
VALUES('焼肉店ほどり', 35.63326857888975, 139.6373265257976, 'food', 'http://hodori.jp/', 1);
INSERT INTO wishlists (spot_name, lat, lon, category, url, user_id)
VALUES('大勝軒', 35.740186155252, 139.7197235141241, 'food', 'http://www.tai-sho-ken.com/', 1);
INSERT INTO wishlists (spot_name, lat, lon, category, url, user_id)
VALUES('サマーランド', 35.71851614106109, 139.27428622412776, 'amusement', 'https://www.summerland.co.jp/', 1);
INSERT INTO wishlists (spot_name, lat, lon, category, url, user_id)
VALUES('淡路島の玉ねぎ', 34.36143107393348, 134.81207174821014, 'sightseeing', 'https://www.awajishima-kanko.jp/', 1);
INSERT INTO wishlists (spot_name, lat, lon, category, url, user_id)
VALUES('太宰府天満宮', 33.522442715262414, 130.5348238619142, 'sightseeing', 'http://www.dazaifutenmangu.or.jp/', 1);

INSERT INTO wishlists (spot_name, lat, lon, category, url, user_id)
VALUES('ナガシマスパーランド', 35.03070106112266, 136.73020453920157, 'amusement', 'https://www.nagashima-onsen.co.jp/spaland/index.html/', 1);
INSERT INTO wishlists (spot_name, lat, lon, category, url, user_id)
VALUES('有馬温泉', 34.80002264306036, 135.24625525950498, 'refreshed', 'http://www.arima-onsen.com/', 1);
INSERT INTO wishlists (spot_name, lat, lon, category, url, user_id)
VALUES('ネスタリゾート神戸', 34.81659509831666, 135.05896506637438, 'amusement', 'https://nesta.co.jp/', 1);
INSERT INTO wishlists (spot_name, lat, lon, category, url, user_id)
VALUES('草津温泉', 36.623340338790435, 138.5967357810405, 'refreshed', 'https://www.kusatsu-onsen.ne.jp/', 1);
INSERT INTO wishlists (spot_name, lat, lon, category, url, user_id)
VALUES('USJ', 34.66664178746014, 135.43238107768866, 'amusement', 'https://www.usj.co.jp/', 1);

INSERT INTO wishlists (spot_name, lat, lon, category, url, user_id)
VALUES('ディズニー', 35.632802386097566, 139.88304585372137, 'amusement', 'https://www.tokyodisneyresort.jp/', 1);
INSERT INTO wishlists (spot_name, lat, lon, category, url, user_id)
VALUES('ハウステンボス', 34.484392841542665, 129.83737465039943, 'amusement', 'https://www.huistenbosch.co.jp/', 1);
INSERT INTO wishlists (spot_name, lat, lon, category, url, user_id)
VALUES('小樽　青の洞窟', 43.23978181668246, 140.92891947327666, 'sightseeing', 'https://otaru.gr.jp/guidemap/otaru-blue-cave', 1);
INSERT INTO wishlists (spot_name, lat, lon, category, url, user_id)
VALUES('御殿場アウトレット', 35.307256145303924, 138.9620397194646, 'shopping', 'https://www.premiumoutlets.co.jp/gotemba/', 1);
INSERT INTO wishlists (spot_name, lat, lon, category, url, user_id)
VALUES('東京湯楽城', 35.74497895164627, 140.3440853627659, 'refreshed', 'https://chi-hotelsresorts.com/yurakujo/', 1);

INSERT INTO wishlists (spot_name, lat, lon, category, url, user_id)
VALUES('ハワイ　キラウエア火山', 19.409965421198773, -155.28372259483703, 'sightseeing', 'https://www.his-j.com/theme/world-heritage/north-america/america/hawaii-volcanoes/', 1);
INSERT INTO wishlists (spot_name, lat, lon, category, url, user_id)
VALUES('川越氷川神社', 35.92825912754346, 139.48824637203134, 'sightseeing', 'http://www.kawagoehikawa.jp/', 1);
INSERT INTO wishlists (spot_name, lat, lon, category, url, user_id)
VALUES('新江ノ島水族館', 35.31091501231653, 139.4796854546535, 'sightseeing', 'https://www.enosui.com/', 1);
INSERT INTO wishlists (spot_name, lat, lon, category, url, user_id)
VALUES('今治　タオル美術館', 33.9700251153376, 133.03273816605218, 'sightseeing', 'http://www.towelmuseum.com/', 1);
INSERT INTO wishlists (spot_name, lat, lon, category, url, user_id)
VALUES('鎌倉　鳩サブレ本店', 35.32124992465169, 139.55267964865587, 'food', '35.321425002587496, 139.5526367333128', 1);