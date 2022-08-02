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

<main>
      <div class="v8_291 col-md-12">
        <!-- map -->
        <div class="map col-md-6">
          <div class="map_frame"></div>
        </div>
        <div class="wishlists col-md-6">
        <?php

if (isset($_POST["search"])) {
    $search_result = searchdata("wishlists",$_POST["input_search"],$user_id);
    echo $search_result;
    $num_px = 0;
    for ($i = 0; $i < pg_num_rows($search_result); $i++){
        $rows = pg_fetch_array($search_result,NULL,PGSQL_ASSOC);
        echo '<div class="wish" style="top: ${num_px}px;">';
        echo '<div class="frame-select"></div>';
        echo '<p class="wish_loc">'.$rows["spot_name"].'</p>';
        echo '<p class="wish_category">'.$rows["category"].'</p>';
        echo '<p class="wish_url">'.$rows["url"].'</p>';
        echo '</div>';

        $num_px += 15;
    }
} else {
    $wishlist_row = selectdata("wishlists",$user_id);
    $num_px = 0;
    for ($i = 0; $i < pg_num_rows($wishlist_row); $i++){
        $rows = pg_fetch_array($wishlist_row,NULL,PGSQL_ASSOC);
        $wishlist_id = $rows["diary_id"];

        echo '<div class="wish" style="top: ${num_px}px;">';
        echo '<div class="frame-select"></div>';
        echo '<p class="wish_loc">'.$rows["spot_name"].'</p>';
        echo '<p class="wish_category">'.$rows["category"].'</p>';
        echo '<p class="wish_url">'.$rows["url"].'</p>';
        echo '</div>';

        $num_px += 15;
    }
}
?>
          <div class="wish" style="top: 0px;">
            <div class="frame_select"></div>
            <span class="wish_loc">清里バーガー</span>
            <span class="wish_category">foof</span>
            <span class="wish_url">https://www.makiba-res.com/</span>
          </div>
          <div class="wish" style="top: 15px;">
            <div class="frame_normal"></div>
            <span class="wish_loc">赤福の店舗</span>
            <span class="wish_category">food</span>
            <span class="wish_url">https://www.akafuku.co.jp/</span>
          </div>
          <div class="wish" style="top: 30px;">
            <div class="frame_normal"></div>
            <span class="wish_loc">モスプレミアム</span>
            <span class="wish_category">food</span>
            <span class="wish_url">https://www.mospremium.jp/index.html</span>
          </div>
          <div class="wish" style="top: 45px;">
            <div class="frame_normal"></div>
            <span class="wish_loc">グラニースミス</span>
            <span class="wish_category">food</span>
            <span class="wish_url">https://www.grannysmith-pie.com/</span>
          </div>
        </div>
        <!-- 作成 -->
        <div class="add">
          
          <a href="create_wishlist.php"><input class="add_btn" type="button"></a>
          
          <p class="add_txt">追加</p>
          <p class="create_icon"><img src="../static/icon/create_icon.png"></p>
        </div>
        <!-- 検索 -->
        <form action="<?php $thisfilename;?>" method="POST">
        <div class="search">
          
          <input type="text" class="search_frame" name="input_search">
          
          <p class="search_txt">検索する</p>
          <input type="submit" name="search">
        </div>
        </form>
      </div>
</main>

<?php

// if (isset($_POST["search"])) {
//     $search_result = searchdata("wishlists",$_POST["input_search"],$user_id);
//     echo $search_result;
//     $num_px = 0;
//     for ($i = 0; $i < pg_num_rows($search_result); $i++){
//         $rows = pg_fetch_array($search_result,NULL,PGSQL_ASSOC);
//         echo '<div class="wish" style="top: ${num_px}px;">';
//         echo '<div class="frame-select"></div>';
//         echo '<p class="wish_loc">'.$rows["spot_name"].'</p>';
//         echo '<p class="wish_category">'.$rows["category"].'</p>';
//         echo '<p class="wish_url">'.$rows["url"].'</p>';
//         echo '</div>';

//         $num_px += 15;
//     }
// } else {
//     $wishlist_row = selectdata("wishlists",$user_id);
//     $num_px = 0;
//     for ($i = 0; $i < pg_num_rows($wishlist_row); $i++){
//         $rows = pg_fetch_array($wishlist_row,NULL,PGSQL_ASSOC);
//         $wishlist_id = $rows["diary_id"];

//         echo '<div class="wish" style="top: ${num_px}px;">';
//         echo '<div class="frame-select"></div>';
//         echo '<p class="wish_loc">'.$rows["spot_name"].'</p>';
//         echo '<p class="wish_category">'.$rows["category"].'</p>';
//         echo '<p class="wish_url">'.$rows["url"].'</p>';
//         echo '</div>';

//         $num_px += 15;
//     }
// }
?>

<?php include("../templates/footer.php"); ?>