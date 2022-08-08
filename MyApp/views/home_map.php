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
if (isset($_SESSION["map_type"])) {
    unset($_SESSION["map_type"]);
}
$_SESSION["map_type"] = "ALL_DIARY";
?>

<?php include("../templates/header.php"); ?>
<?php echo $user_id; ?>

        <!-- here is content -->
        <div class="v2_21 col-md-12">
            <div class="map col-md-6">
                <iframe src="map.php" class="map_frame"　style="top: 0px; position: absolute;"></iframe>
            </div>

            <div>
                <a href="home_map.php"><button type="button"></a>
            </div>
            <!-- スクロール -->
            <div class="memorys" style="top: 0px; position: absolute;">

            <!-- 作成 -->
            <!-- <form action="<?php $thisfilename ;?>" method="POST">
                <div class="create">
                    
                    <a href="create_diary.php"><input type="button" class="create_btn"></a>
                    <p class="create_txt">作成</p>
                    <p class="create_icon"><img src="../static/icon/create_icon.png"></p> -->
                    
                    <!-- <input type="submit" name="create"> -->
                    
                <!-- </div> -->

                

                <!-- 検索 -->
                <!-- <div class="v39_173"> -->
                    <!-- <div class="v39_170"></div> -->
                    <!-- <input type="submit" name="search">
                    <input type="text" class="v39_170" name="input_search">
                    <p class="v39_172">検索する</p>
                    
                    
                </div>
            </form> -->

<?php
if (isset($_POST["search"])) {
    $search_result = searchdata("diary",$_POST["input_search"],$user_id);
    echo $search_result;
    $num_px = 300;
    for ($i = 0; $i < pg_num_rows($search_result); $i++){
        $rows = pg_fetch_array($search_result,NULL,PGSQL_ASSOC);
        $diary_id = $rows["diary_id"];

        echo "<form action='detail_diary.php' method='POST' name='show_detail'>";
        echo "<button type='submit' class='frame-normal flex-md-row mb-4 shadow-sm h-md-250'>";
        echo '<div class="card-body d-flex flex-column align-items-start">';
        echo '<h3 class="md-0"><p class="text-dark">'.$rows["register_at"].'</p></h3>';
        echo '<p class="mb-1 text-muted">'.$rows["spot_name"].'</p>';
        echo '<p class="mcard-text mb-auto">'.$rows["content"].'</p>';
        echo "<input type='hidden' name='diary_id' value='${diary_id}'>";
        echo '</div>';
        echo "</button>";

        echo "</form>";
    }
} else {
    $diary_row = selectdata("diary",$user_id);
    $num_px = 0;
    for ($i = 0; $i < pg_num_rows($diary_row); $i++){
        $rows = pg_fetch_array($diary_row,NULL,PGSQL_ASSOC);
        $diary_id = $rows["diary_id"];

        echo "<form action='detail_diary.php' method='POST' name='show_detail'>";
        echo "<button type='submit' class='frame-normal flex-md-row mb-4 shadow-sm h-md-250'>";
        echo '<div class="card-body d-flex flex-column align-items-start">';
        echo '<h3 class="md-0"><p class="text-dark">'.$rows["register_at"].'</p></h3>';
        echo '<p class="mb-1 text-muted">'.$rows["spot_name"].'</p>';
        echo '<p class="mcard-text mb-auto">'.$rows["content"].'</p>';
        echo "<input type='hidden' name='diary_id' value='${diary_id}'>";
        echo '</div>';
        echo "</button>";

        echo "</form>";


        $num_px += 15;
    }
}


?>

<?php include("../templates/footer.php"); ?>