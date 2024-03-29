<?php
    require_once("../data_source.php");

    session_start();
    $user = $_SESSION['user'];
    $song = $_SESSION['song_id'];
    $imagePath = $_SESSION['image_path'];
    $description = "";
    $hashtags = [];

    if(array_key_exists('description',$_POST)){
        $description = $_POST['description'];
    }
    if(array_key_exists('hashtags',$_POST)){
        $hashtags = $_POST['hashtags'];
    }

    $post_img = $imagePath != "" ? 1 : 0;
    $postId = $dbh->addNewPost($song, $description,  $post_img,  $imagePath, $user['Email']);

    // add hashtags to post
    if($postId != null){
        $allHashtags = $dbh->getAllHashtags();
        foreach ($hashtags as $hashtag) {
            if(!in_array($hashtag, $allHashtags,true)){
                $dbh->crateHashtag($hashtag);
            }
            $dbh->addHashtagToPost($postId, $hashtag);
        }
        header('Location: /NowMusic/src/home/home.php');
    } else {
        header('Location: /NowMusic/src/post_creation/post_add_content.php?error=1');
    }
?>