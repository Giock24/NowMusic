<?php
    require_once("../data_source.php");
    require_once("../auth/check_auth.php");
    checkAuth();

    $user = $_SESSION["user"];
    if (isset($_POST["biografia"])) {
        $bio = $_POST["biografia"];
        //var_dump($bio);
        $dbh->modifyProfile($bio,$user["Email"]);
    }


    $_SESSION["user"] = $dbh->login($user["Email"], $user["Password"])[0];
    header("Location: /NowMusic/src/profile/profile_page.php");

?>