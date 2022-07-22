<?php
// import other file
require("../config.php");


// connectio postgres
$connect = "host=".$config["host"]." "."dbname=".$config["dbname"]." "."user=".$config["user"]." "."password=".$config["password"];

$dbconn = pg_connect("$connect") or die("Could not Connect:".pg_last_error());


function insertdata($data){
    $query="INSERT INTO dialy VALUES".$data.";";
    $result = pg_query("$query") or die("Query Failed:".pg_last_error());
}

function selectdata($tablename, $id=null){
    if ($id != null){
        $query = "SELECT * FROM ".$tablename." WHERE id=".$id;
    } else {
        $query = "SELECT * FROM ".$tablename.";";
    }
    $result = pg_query("$query") or die("Query Failed:".pg_last_error());

    return $result;
}

function deletedata($tablename, $id){
    $query = "DELETE FROM ".$tablename." WHERE id=".$id;
    $result = pg_query("$query") or die("Query Failed:".pg_last_error());
}


?>