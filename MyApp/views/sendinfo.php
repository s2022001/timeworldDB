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
    <form action="<?php $thisfilename;?>" method="POST">

        <div class="category col-md-6">
        
        <select class="frame" name="input_infotype" required>
            <option value="function">機能について</option>
            <option value="design">デザインについて</option>
            <option value="future">今後の展望について</option>
            <option value="bug">バグについて</option>
            <option value="others">その他</option>
        </select>
        <p class="column">改善点・要望の種類を入力してください</p>
        </div>

        <div class="text">
            <p class="column">改善点・要望について具体的にお聞かせください</p>
            <textarea name="input_content" class="text_frame" required></textarea> 
        </div>

        <div class="create">
            <p class="create_txt">送信</p>
            <input type="submit" class="create_btn" name="submit">
        </div>

    </form>
</main>


<?php

if (isset($_POST["submit"])) {
    $info_type = $_POST["input_infotype"];
    $content = $_POST["input_content"];
    
    $data = "(${user_id}, '${info_type}', '${content}')";

    insertdata("info",$data);
    header("Location: home.php");
    exit();
}

?>

<?php include("../templates/footer.php"); ?>