<?php
    require_once("../data_source.php");

    $sign_up_username = $_POST["username"];
    $sign_up_password = $_POST["password"];
    $sign_up_email = $_POST["email"];

    $dbh->addNewUser($sign_up_username, $sign_up_password, $sign_up_email);

    
?>