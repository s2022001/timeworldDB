<!-- import other file -->
<?php
require("../models/dataaccess.php");
require("../config.php");
require("./views.php");
?>



<?php include("../templates/header.php"); ?>

<h1>index!!!!</h1>

<?php

// $connect = "host=".$config["host"]." "."dbname=".$config["dbname"]." "."user=".$config["user"]." "."password=".$config["password"];

// $dbconn = pg_connect("$connect") or die("Could not Connect:".pg_last_error());


// function select_all($tablename){
//     $query = "SELECT * FROM ".$tablename.";";
//     $result = pg_query($query) or 
//     die("Query Failed:".pg_last_error());

//     return $result;
// }


$result = selectdata("dialy");

for ($i = 0; $i < pg_num_rows($result); $i++){
    $rows = pg_fetch_array($result,NULL,PGSQL_ASSOC);
    echo "register_at:".$rows["register_at"];
    echo "spot_name:".$rows["spot_name"];
    echo "gps:".$rows["lat"].$rows["lon"];
}

?>

<form action="test.php" method="POST" enctype="multipart/form-data">
<input type="file" name="upload_image">
<input type="submit" value="Upload"> 
</form>

<?php

$fname = time() ."_". getmypid() . "." .pathinfo($_FILES["upload_image"]["name"], PATHINFO_EXTENSION);
$fpath = $config["upload_dir"] . $fname;
echo "<br><br>".$fpath."<br>";

if ($_FILES["upload_image"]["size"] == 0){
    echo "File Not Set";
} else {
    $result = move_uploaded_file($_FILES["upload_image"]["tmp_name"], $fpath);

    if($result===true){
        echo "Complete Upload";
    } else {
        echo "Faild Upload".$_FILES["upload_image"]["error"];
    }
}
?>

<?php include("../templates/footer.php"); ?>