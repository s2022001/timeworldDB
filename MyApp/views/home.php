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
<?php echo $user_id; ?>

        <!-- here is content -->
        <div class="v2_21 col-md-12">
            <!-- カレンダー -->
            <div class="v2_85 col-md-6">
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
            <div class="memorys">
<?php

// $diary_row = selectdata("diary",$user_id);
// $num_px = 0;
// for ($i = 0; $i < pg_num_rows($diary_row); $i++){
//     $rows = pg_fetch_array($diary_row,NULL,PGSQL_ASSOC);
//     $diary_id = $rows["diary_id"];

//     echo "<form action='detail_diary.php' method='POST' name='show_detail'>";
//     echo "<button type='submit' class='frame-select'>";
//     echo '<div class="memory" style="top: ${num_px}px;">';
//     echo '<div class="frame-select"></div>';
//     echo '<p class="memory-date">'.$rows["register_at"].'</p>';
//     echo '<p class="memory-loc">'.$rows["spot_name"].'</p>';
//     echo '<p class="memory-cap">'.$rows["content"].'</p>';

    
//     echo "<input type='hidden' name='diary_id' value='${diary_id}'>";
//     // echo "<input type='submit' value='詳細'>";
//     echo '</div>';
//     echo "</button>";

//     echo "</form>";


//     $num_px += 15;
// }


?>
<?php

$diary_row = selectdata("diary",$user_id);
$num_px = 0;
for ($i = 0; $i < pg_num_rows($diary_row); $i++){
    $rows = pg_fetch_array($diary_row,NULL,PGSQL_ASSOC);
    $diary_id = $rows["diary_id"];

    echo "<form action='detail_diary.php' method='POST' name='show_detail'>";
    echo '<div class="frame-normal flex-md-row mb-4 shadow-sm h-md-250">';
    echo "<button type='submit'>";
    echo '<div class="card-body d-flex flex-column align-items-start">';
    echo '<h3 class="md-0"><p class="text-dark">'.$rows["register_at"].'</p></h3>';
    echo '<p class="mb-1 text-muted">'.$rows["spot_name"].'</p>';
    echo '<p class="mcard-text mb-auto">'.$rows["content"].'</p>';

    
    echo "<input type='hidden' name='diary_id' value='${diary_id}'>";
    // echo "<input type='submit' value='詳細'>";
    echo '</div></div>';
    echo "</button>";

    echo "</form><br>";


    $num_px += 15;
}


?>
                <div class="col-md-6">
                    <div class="card flex-md-row mb-4 shadow-sm h-md-250">
                        <div class="card-body d-flex flex-column align-items-start">
                            <h3 class="mb-0">
                                <p class="text-dark">2022/08/02</p>
                            </h3>
                            <div class="mb-1 text-muted">場所</div>
                            <p class="card-text mb-auto">キャプション</p>
                        </div>
                    </div>
                </div>
                <div class="memory" style="top: 0px;">
                    <div class="frame-select"></div>
                    <p class="memory-date">Jun.10, 2022</p>
                    <p class="memory-loc">新大久保</p>
                    <p class="memory-cap">辛いものいっぱいかと思ったけどそうではなさそう…？</p>
                </div>
                <div class="memory" style="top: 15px;">
                    <div class="frame-normal"></div>
                    <p class="memory-date">Jun.04, 2022</p>
                    <p class="memory-loc">越谷レイクタウン</p>
                    <p class="memory-cap">VSパークに遊びに行った〜</p>
                </div>
                <div class="memory" style="top: 30px;">
                    <div class="frame-normal"></div>
                    <p class="memory-date">Jun.04, 2022</p>
                    <p class="memory-loc">越谷レイクタウン</p>
                    <p class="memory-cap">卵と私に初潜入！美味しかった〜！</p>
                </div>
                <div class="memory" style="top: 45px;">
                    <div class="frame-normal"></div>
                    <p class="memory-date">May.30, 2022</p>
                    <p class="memory-loc">南大沢</p>
                    <p class="memory-cap">やることやって南大沢へ！</p>
                </div>
                <div class="memory" style="top: 60px;">
                    <div class="frame-normal"></div>
                    <p class="memory-date">Jun.10, 2022</p>
                    <p class="memory-loc">新大久保</p>
                    <p class="memory-cap">辛いものいっぱいかと思ったけどそうではなさそう…？</p>
                </div>
                <div class="memory" style="top: 75px;">
                    <div class="frame-normal"></div>
                    <p class="memory-date">Jun.04, 2022</p>
                    <p class="memory-loc">越谷レイクタウン</p>
                    <p class="memory-cap">VSパークに遊びに行った〜</p>
                </div>
                <div class="memory" style="top: 90px;">
                    <div class="frame-normal"></div>
                    <p class="memory-date">Jun.04, 2022</p>
                    <p class="memory-loc">越谷レイクタウン</p>
                    <p class="memory-cap">卵と私に初潜入！美味しかった〜！</p>
                </div>
                <div class="memory" style="top: 105px;">
                    <div class="frame-normal"></div>
                    <p class="memory-date">May.30, 2022</p>
                    <p class="memory-loc">南大沢</p>
                    <p class="memory-cap">やることやって南大沢へ！</p>
                </div>
            </div>



            <!-- 作成 -->
            <form action="<?php $thisfilename ;?>" method="POST">
                <div class="create">
                    
                    <a href="create_diary.php"><input type="button" class="create_btn"></a>
                    <p class="create_txt">作成</p>
                    <p class="create_icon"><img src="../static/icon/create_icon.png"></p>
                    
                    <!-- <input type="submit" name="create"> -->
                    
                </div>

                

                <!-- 検索 -->
                <div class="v39_173">
                    <!-- <div class="v39_170"></div> -->
                    <input type="submit" name="search">
                    <input type="text" class="v39_170" name="input_search">
                    <p class="v39_172">検索する</p>
                    
                    
                </div>
            </form>
        </div>

<?php

if (isset($_POST["create"])) {
    // header("Location: create.php");
    // exit();
    // header("Location: create_diary.php");
    // exit();
    echo "CREATE!!!!";
} elseif (isset($_POST["search"])) {
    // search
    $search_result = searchdata("diary",$_POST["input_search"],$user_id);
    echo $search_result;
    $num_px = 300;
    for ($i = 0; $i < pg_num_rows($search_result); $i++){
        $rows = pg_fetch_array($search_result,NULL,PGSQL_ASSOC);
        echo $rows["content"];
        echo $rows["spot_name"];
        echo "<br>";
        // echo "RESULT!!!!!";
        // echo '<div class="memory" style="top: ${num_px}px;">';
        // echo '<div class="frame-select"></div>';
        // echo '<p class="memory-date">'.$rows["register_at"].'</p>';
        // echo '<p class="memory-loc">'.$rows["spot_name"].'</p>';
        // echo '<p class="memory-cap">'.$rows["content"].'</p>';
        // echo '</div>';

        $num_px += 15;
    }
}


?>

<?php include("../templates/footer.php"); ?>