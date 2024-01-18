<?php
    require_once("../data_source.php");
    require_once("../auth/check_auth.php");
    require("./upload_photo.php");

    checkAuth();

    $user = $_SESSION["user"];
    
  
    # This function returns true if the variable exists and is not NULL
    if (isset($_POST["imageProfile"]) ){
        $imgProfileFile = $_FILES["imageProfile"]["name"];
        var_dump($imgProfileFile);
        # I check if i can upload the image 
        $uploadResponse = upload_photo($imgProfileFile);
        if ($uploadResponse == 1) {
            $urlimg = $_POST["imageProfile"];
            $dbh->modifyProfile($user["Email"], "", "", $urlimg, "", "");
            # header("Refresh: 0");
        } else {
            header('Location: /NowMusic/src/profile/profile_page.php?error=1');
        }
    }

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