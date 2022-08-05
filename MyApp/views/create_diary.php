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
$_SESSION["map_type"] = "CREATEDIARY";
?>

<?php include("../templates/header.php"); ?>

<!-- here is content -->

<form action="<?php $thisfilename;?>" method="POST" enctype="multipart/form-data">
<main>
    <div class="date">
        <p class="column">Date</p>
        <div class="date_frame" style="left: 0px;"></div>
        <p class="date_txt" style="left: 137px;">年</p>
        <div class="date_frame" style="left: 180px;"></div>
        <p class="date_txt" style="left: 317px;">月</p>
        <div class="date_frame" style="left: 360px;"></div>
        <p class="date_txt" style="left: 497px;">日</p>
        <input type="datetime-local" name="input_date">
    </div>

    <div class="location">
        <p class="column">Location</p>
        <br>
        <a href="insertlocation.php">地図入力はこちら（調整中）</a>
        <input type="text" class="location_frame" id="diarylocation" name="input_location">
    </div>


    <div class="text">
        <p class="column">Text</p>
        <textarea name="input_content" class="text_frame"></textarea> 
    </div>

    <div class="picture">
        <p class="column">Picture</p>
        <input type="file" class="picture_frame" name="input_picture">
    </div>

    <div class="create">
        <p class="create_txt">記録</p>
        <input type="submit" class="create_btn" name="submit">
    </div>
</main>
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