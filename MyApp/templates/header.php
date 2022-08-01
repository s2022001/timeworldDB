<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Alice&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="../static/css/login.css" rel="stylesheet">
    <link href="../static/css/calendar.css" rel="stylesheet">
    <link href="../static/css/map.css" rel="stylesheet">
    <link href="../static/css/add.css" rel="stylesheet">
    <link href="../static/css/create.css" rel="stylesheet">
    <link href="../static/css/header.css" rel="stylesheet">
    <link href="../static/css/wishlists.css" rel="stylesheet">
    <link href="../static/css/register.css" rel="stylesheet">
    <title>Document</title>
</head>


<body>
    <header>
        <div class="nav-img">
            <nav class="navbar navbar-expand navbar-light fixed-top" >
                <a class="navbar-brand nav-title" href="../views/home.php">Diary</a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link nav-col" href="../views/home.php">Memory</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-col" href="../views/wishlists.php">Wishlist</a>
                        </li>
                        <li class="nav-item">
                            <form action="../templates/header.php" method="POST">
                                <input type="submit" name="pop" value="Log Out">
                            </form>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>



<?php 
if (isset($_POST["pop"])) {
    session_start();
    $_SESSION = array();
    session_destroy();
    header("Location: ../views/login.php");
    exit();
}
?>


