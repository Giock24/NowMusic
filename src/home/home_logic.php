<?php

    require_once("../data_source.php");
    $email = $_SESSION['user']['Email'];

    $allpost = $dbh->getPosts();

    $all_my_likes = array();
    foreach ($allpost as $post) {
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