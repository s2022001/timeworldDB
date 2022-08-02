<!-- import other file -->
<?php
require("../models/dataaccess.php");
require("../config.php");

// $thisfilename = basename(__FILE__);
?>

<!-- confirm session -->


<?php include("../templates/header.php"); ?>

<form method="POST" action="<?php $thisfilename;?>">
    <div class="contents">
        <a class="v2_4">Diary</a>
        <!-- username -->
        <div class="v2_20">
            
            <input type="text" class="v2_6" name="input_username" required>        
            
            <a class="v2_7">User Name</a>
        </div>
        <!-- password -->
        <div class="v2_19">
            
            <input type="password" class="v2_8" name="input_password" required>
            
            <a class="v2_9">Password</a>
        </div>
        <!-- signin -->
        <div class="v2_14">
            
            <input type="submit" class="v2_10" name="login" value="submit">
            
            <a class="v2_13">Log In</a>
        </div>
        <!-- signup -->
        <div class="v2_16">
            <div class="v2_17"></div>
            <a class="v2_18">Register</a>
            <input type="submit" name="pg_ra">
        </div>
    </div>
</form>

<?php
// page move register_account
if (isset($_POST["pg_ra"])) {
    header("Location: register_account.php");
    exit();
// login
} elseif (isset($_POST["login"])) {
    $username = $_POST["input_username"];
    $pass = $_POST["input_password"];

    $user = checkuser($username,$pass);
    // $user=11;

    if (is_numeric($user)===true) {
        session_start();

        $_SESSION["user_id"] = $user;
        echo $_SESSION["user_id"];

        header("Location: home.php");
        exit();

    } else {
        echo "check user :".$user;
    }
}
// request.method == "POST"
// $username = $_POST["input_username"];
// $pass = $_POST["input_password"];

// $user = checkuser($username,$pass);
// // $user=11;

// if (is_numeric($user)===true) {
//     session_start();

//     $_SESSION["user_id"] = $user;
//     echo $_SESSION["user_id"];

//     header("Location: index.php");
//     exit();

// } else {
//     echo "check user :".$user;
// }

?>



<?php include("../templates/footer.php"); ?>

