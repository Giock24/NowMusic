<?php
    require_once("../data_source.php");
    session_start();
    $email = $_SESSION['user']['Email'];

    $likesCommentsFollowers['likes'] = $dbh->getLikesToMyPosts($email);
    $likesCommentsFollowers['comments'] = $dbh->getCommentsToMyPosts($email);
    $likesCommentsFollowers['followers'] = $dbh->getFollowers($email);

    $json = json_encode($likesCommentsFollowers);
    echo $json;
?>