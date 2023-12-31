<?php
    require_once("../data_source.php");

    $email = $_POST["email"];
    $password = $_POST["password"];

    $user = $dbh->login($email, $password);

    header('Location: /NowMusic/src/home/home.php');
?>