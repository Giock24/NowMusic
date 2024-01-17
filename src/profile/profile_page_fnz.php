<?php
    require_once("../data_source.php");
    require_once("../auth/check_auth.php");
    checkAuth();

    $bio = $_POST["biografia"];
    $user = $_SESSION["user"];

    $dbh->modifyProfile($bio,$user["Email"]);

    session_start();
    $_SESSION["user"] = $user;
    header('Location: /NowMusic/src/profile/profile_page.php');

?>