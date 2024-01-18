<?php
    require_once("../data_source.php");

    $sign_up_username = $_POST["username"];
    $sign_up_password = $_POST["password"];
    $sign_up_email = $_POST["email"];

    echo $sign_up_username;
    echo $_POST["repeat_password"];
    if($sign_up_password != $_POST["repeat_password"]) {
        header('Location: /NowMusic/src/auth/sign_up.php?error=1');
    } else {
        try {
            $crypted_password = $_POST["crypt_password"];
            $dbh->addNewUser($sign_up_username, $crypted_password, $sign_up_email);
            $user = $dbh->login($sign_up_email, $crypted_password);
            session_start();
            $_SESSION["user"] = $user[0];
            header('Location: /NowMusic/src/home/home.php');
        } catch (Exception $e) {
            header('Location: /NowMusic/src/auth/sign_up.php?error=2');
        }
    }
?>