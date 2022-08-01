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

<form action="<?php $thisfilename;?>" method="POST" enctype="multipart/form-data">
<div class="v12_400">
    <div class="v12_402">
        <div class="v12_403"></div>
        <div class="v12_404"></div>
    </div>
    <div class="v12_405">
        <div class="v12_406"></div>
        <span class="v12_407">Wish list</span>
        <span class="v12_408">Memory</span>
        <span class="v12_409">Diary</span>
    </div>
    <div class="v12_418">
        <div class="v12_419"></div>
        <span class="v13_427">年</span>
        <div class="v13_428"></div>
        <span class="v13_429">月</span>
        <div class="v13_430"></div>
        <span class="v13_431">日</span>
        <span class="v12_420">Date</span>
        <input type="datetime-local" name="input_date" required>
    </div>
    <div class="v13_424">
        <div class="v13_425"></div>
        <span class="v13_426">Location</span>
        <input type="text" name="input_location">
        <span class="v13_426">SpotName</span>
        <input type="text" name="input_spotname">

    </div>
    <span class="v13_435">ファイルを追加</span>
    <span class="v15_2">＋</span>
    <div class="v13_432">
        
        <input type="file" class="v13_433" name="input_picture" required>
        
        <span class="v13_434">Picture</span>
    </div>
    <div class="v12_421">
        <div class="v12_422"></div>
        <span class="v12_423">Text</span>
        <textarea name="input_content" ></textarea>
    </div>
    <div class="v15_3">
        <input type="submit" class="v15_5" name="submit">
        <span class="v15_6">記録</span>
    </div>
</div>
</form>

<?php

if (isset($_POST["submit"])) {
    $input_date = $_POST["input_date"];
    $register_at = str_replace("T", " ", $input_date);
    $spot_name = $_POST["input_spotname"];
    $content = $_POST["input_content"];
    $location = $_POST["input_location"];

    // file upload
    $fname = time() ."_". getmypid() . "." .pathinfo($_FILES["input_picture"]["name"], PATHINFO_EXTENSION);
    $fpath = $config["upload_dir"] . $fname;

    if ($_FILES["input_picture"]["size"] == 0){
        echo "File Not Set";
    } else {
        $result = move_uploaded_file($_FILES["input_picture"]["tmp_name"], $fpath);

        if($result===true){
            echo "Complete Upload";
        } else {
            echo "Faild Upload".$_FILES["input_picture"]["error"];
        }
    }

    $data = "('${register_at}', '${spot_name}', '${content}', ${location}, '${fname}', ${user_id})";

    insertdata("diary",$data);

    header("Location: home.php");
    exit();
}

?>

<?php include("../templates/footer.php"); ?>