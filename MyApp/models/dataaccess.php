<?php
// import other file
require("../config.php");


// connectio postgres
$connect = "host=".$config["host"]." "."dbname=".$config["dbname"]." "."user=".$config["user"]." "."password=".$config["password"];

$dbconn = pg_connect("$connect") or die("Could not Connect:".pg_last_error());


function insertdata($tablename,$data){
    // $query="INSERT INTO dialy VALUES".$data.";";
    if ($tablename === "dialy") {
        $columns = "(spot_name, content, lat, lon, filename)";
    } elseif ($tablename === "wishlists") {
        $columns = "()";
    } elseif ($tablename === "users") {
        $columns = "(user_name, password)";
    } else {
        return "tablename Error";
    }
    $query = "INSERT INTO ${tablename} ${columns} VALUES ${data};";
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

function checkuser($username,$password){
    // $query = "SELECT * FROM users WHERE username=".$username." AND password=".$password.";";
    $query = "SELECT * FROM users WHERE username='${username}' AND password='${password}';";
    // $query = "SELECT * FROM users WHERE username="."'" . $username . "'"." AND password="."'" . $password . "';"; 
    $result = pg_query("$query") or die("Query Failed:".pg_last_error());
    
    $len_row = count($result);

    if ($len_row === 0) {
        return "No exists such user";
    } elseif ($len_row >= 2) {
        return "Many user exists";
    } elseif ($len_row === 1) {
        for ($i = 0; $i < pg_num_rows($result); $i++){
            $rows = pg_fetch_array($result,NULL,PGSQL_ASSOC);
            $user_id = $rows["user_id"];
        }
        return $user_id;
    } else {
        return "Query Faild : ".$query;
    }
}

?>