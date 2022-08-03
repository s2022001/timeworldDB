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
        <div class="v2_21 col-md-12">
            <div class="map">
                <!-- mapの枠 -->
                <div class="v8_151"></div>
            </div>


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
        // echo "<input type='submit' value='詳細'>";
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
        // echo "<input type='submit' value='詳細'>";
        echo '</div>';
        echo "</button>";

        echo "</form>";


        $num_px += 15;
    }
}

?>
        </div>
<?php


?>

<?php include("../templates/footer.php"); ?>