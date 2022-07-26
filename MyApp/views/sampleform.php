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

<h1>index!!!!</h1>

<form action="<?php $thisfilename; ?>" method="POST">
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" name="input_textarea" rows="3"></textarea>
    </div>
    <div class="mb-3">
        <input type="text" name="input_text" >
    </div>
    <input type="submit" class="btn btn-primary" value="submit">
</form>

<?php
$textarea = $_POST["input_textarea"];
$text = $_POST["input_text"];

$data = "('${text}', '${textarea}', 35.68143466437733, 139.66829369575765, 'aaaa.jpg')";

echo "data:",$data;

$insert = insertdata("dialy", $data);
echo $insert;

?>

<?php include("../templates/footer.php"); ?>