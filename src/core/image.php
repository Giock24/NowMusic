<?php
    require_once("../data_source.php");
    $email = $_SESSION['user']['Email'];

    $user = $dbh->getInfoUser($email);
    //echo $user;
?>