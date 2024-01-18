<?php
    require_once("../data_source.php");
    session_start();
    $user = $_SESSION["user"];

    if (isset($_POST["biografia"]) || isset($_POST["username"]) 
        || isset($_POST["gender"]) || isset($_POST["birthdaydate"])) {
            $bio = $_POST["biografia"];
            $username = $_POST["username"];
            $date = $_POST["birthdaydate"];
            $gender = $_POST["gender"];
            $genderCode = NULL;
            if($gender=="Other"){
                $genderCode = 0;
            }
            if($gender=="Male"){
                $genderCode = 1;
            }
            if($gender=="Female"){
                $genderCode = 2;
            };
            var_dump($gender);
            $dbh->modifyProfile($user["Email"],$bio, $username, "", $date, $genderCode);
    }
    
    
    $_SESSION["user"] = $dbh->login($user["Email"], $user["Password"])[0];
    header('Location: /NowMusic/src/profile/profile_page.php');

?>