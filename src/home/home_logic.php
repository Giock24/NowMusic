<?php

    require_once("../data_source.php");
    $email = $_SESSION['user']['Email'];

    $homePost = array();
    $followedPost = $dbh->getPosts($email,true);
    $homePost = array_merge($homePost, $followedPost);

    $allpost = $dbh->getPosts();
    //remove from allpost the post that are in homePost
    foreach ($homePost as $post) {
        $index = array_search($post, $allpost);
        unset($allpost[$index]);
    }
    //merge the two array
    $homePost = array_merge($homePost, $allpost);

    $all_my_likes = array();
    foreach ($homePost as $post) {
        array_push($all_my_likes, $dbh->youPutLike($email, $post["Id_Post"]));
    }

    /*
    function updateMyPost($index){
        global $dbh, $email, $allpost;
        $post = $allpost[$index];
        //$all_my_likes[$index] = $dbh->youPutLike($email, $post["Id_Post"]);
        echo $dbh->youPutLike($email, $post["Id_Post"]);
    }
    */
?>