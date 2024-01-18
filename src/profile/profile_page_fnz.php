<?php
    require_once("../data_source.php");
    require_once("../auth/check_auth.php");

    checkAuth();

    $user = $_SESSION["user"];
    

    if (isset($_POST["biografia"]) || isset($_POST["username"]) 
        || isset($_POST["gender"]) || isset($_POST["birthdaydate"])) {
            $bio = $_POST["biografia"];
            $username = $_POST["username"];
            $date = $_POST["birthdaydate"];
            $gender = $_POST["gender"];
            $dbh->modifyProfile($user["Email"],$bio, $username, "", $date, $gender);
    }
    
    
    $_SESSION["user"] = $dbh->login($user["Email"], $user["Password"])[0];

?>