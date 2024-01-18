<?php
    require_once("../data_source.php");
    require_once("../auth/check_auth.php");
    require("./upload_photo.php");

    checkAuth();

    $user = $_SESSION["user"];

    if (isset($_POST["imageProfile"])) {
        
    }

    if ( isset($_POST["biografia"]) || isset($_POST["username"]) 
        || isset($_POST["gender"]) || isset($_POST["birthdaydate"]) || isset($_POST["imageProfile"]) ) {
        $bio = $_POST["biografia"];
        $username = $_POST["username"];
        $urlimg = $_POST["imageProfile"];
        $date = $_POST["birthdaydate"];
        $gender = $_POST["gender"];
        //var_dump($bio);
        $dbh->modifyProfile($user["Email"],$bio, $username, $urlimg, $date, $gender);
    }


    $_SESSION["user"] = $dbh->login($user["Email"], $user["Password"])[0];
    header("Location: /NowMusic/src/profile/profile_page.php");

?>