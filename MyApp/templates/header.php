<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../static/css/login.css" rel="stylesheet">
    <link href="../static/css/calendar.css" rel="stylesheet">
    <link href="../static/css/map.css" rel="stylesheet">
    <link href="../static/css/add.css" rel="stylesheet">
    <link href="../static/css/create.css" rel="stylesheet">
    <link href="../static/css/header.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <h1>Templates!</h1>
    <form action="../templates/header.php" method="POST">
        <input type="submit" name="pop">
    </form>

<?php 
if (isset($_POST["pop"])) {
    session_start();
    $_SESSION = array();
    session_destroy();
    header("Location: ../views/login.php");
    exit();
}
?>


