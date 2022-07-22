<?php

// require("../models/dataaccess.php");
require("../config.php");

?>

<?php


function save_picture($user_id){
    $fname = "akakaka.jpg";
    $result = move_uploaded_file($_FILES["upload_image"]["tmp_name"],$config["upload_dir"]+$fname);

    if ($result){
        $message = "complete upload";
    } else {
        $message = "error ".$_FILES["upload_image"]["error"];
    }

    return $message;
}

?>