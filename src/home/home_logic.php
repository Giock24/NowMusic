<?php

    require_once("../data_source.php");
    $email = $_SESSION['user']['Email'];

    $allpost = $dbh->getPosts();
    //$allpost[0]["numcommenti"] = 100;
    $all_likes = array();
    foreach ($allpost as $post) {
        array_push($all_likes, $dbh->youPutLike($email, $post["Id_Post"]));
    }

    //$isYourLike = $dbh->youPutLike($email, $actualIdPost);
?>