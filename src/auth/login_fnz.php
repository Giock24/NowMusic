<?php
    require_once("../data_source.php");

    $email = $_POST["email"];
    $password = $_POST["password"];

    $user = $dbh->login($email, $password);

    //check if user is not an empty array
    if (count($user) == 0) {
        //header('Location: /NowMusic/src/auth/login.php?error=1');
    } else {
        session_start();
        $_SESSION["user"] = $user[0];
        //header('Location: /NowMusic/src/home/home.php');
    }
?>