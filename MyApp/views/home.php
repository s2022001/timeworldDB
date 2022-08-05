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
            <!-- カレンダー -->
            <div class="col-md-12">
                <!-- <div class="v2_83"></div>
                <div class="v2_84"></div> -->
                <div class="top_line"></div>
                <div class="container-calendar">
                    <h4 id="monthAndYear"></h4>
                    <div class="button-container-calendar">
                        <button id="previous" onclick="previous()">‹</button>
                        <button id="next" onclick="next()">›</button>
                    </div>
                    
                    <table class="table-calendar" id="calendar" data-lang="ja">
                        <thead id="thead-month"></thead>
                        <tbody id="calendar-body"></tbody>
                    </table>
                    <br>
                    <div class="footer-container-calendar">
                        <label for="month"></label>
                        <select id="month" onchange="jump()">
                            <option value=0>January</option>
                            <option value=1>February</option>
                            <option value=2>March</option>
                            <option value=3>April</option>
                            <option value=4>May</option>
                            <option value=5>June</option>
                            <option value=6>July</option>
                            <option value=7>August</option>
                            <option value=8>September</option>
                            <option value=9>October</option>
                            <option value=10>November</option>
                            <option value=11>December</option>
                        </select>
                        <select id="year" onchange="jump()"></select>
                    </div>
                </div>
                <div class="under_line"></div>
                <!-- mapへ -->
                <div class="v8_367"></div>
            </div>

            <!-- スクロール -->
            <div class="memorys" style="top: 70px; position: absolute;">

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
        echo '<div class="memory d-flex flex-column align-items-start">';
        echo '<h3 class="md-0"><p class="memory-date">'.$rows["register_at"].'</p></h3>';
        echo '<p class="mb-1 memory-loc">'.$rows["spot_name"].'</p>';
        echo '<p class="memory-cap mb-auto">'.$rows["content"].'</p>';
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

            </div>

            <!-- 作成 -->
            <form action="<?php $thisfilename ;?>" method="POST">
                <div class="hcreate">
                    
                    <a href="create_diary.php"><input type="button" class="hcreate_btn"></a>
                    <p class="hcreate_txt">作成</p>
                    <p class="hcreate_icon"><img src="../static/icon/create_icon.png"></p>
                    
                    <input type="submit" name="create">
                    
                </div>

                

                <!-- 検索 -->
                <div class="hsearch">
                    <div>
                        <input type="submit" name="search">
                        <p class="hsearch_icon"><img src="../static/icon/search.png"></p>
                    </div>
                    <input type="text" class="hsearch_frame" name="input_search">
                    <p class="hsearch_txt">検索する</p>
                    
                    
                </div>
            </form>

<?php include("../templates/footer.php"); ?>