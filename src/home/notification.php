<?php
    require_once("../data_source.php");
    session_start();
    $email = $_SESSION['user']['Email'];

    $likesAndComments['likes'] = $dbh->getLikesToMyPosts($email);
    $likesAndComments['comments'] = $dbh->getCommentsToMyPosts($email);

    $json = json_encode($likesAndComments);
    echo $json;
?>