<?php
    require_once("../data_source.php");

    session_start();
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
    $postId = $dbh->addNewPost($song, $description,  $post_img,  $imagePath, 'giock.consoli@gmail.com');

    echo $postId;

    // add hashtags to post
    if($postId != null){
        $allHashtags = $dbh->getAllHashtags();
        foreach ($hashtags as $hashtag) {
            if(!in_array($hashtag, $allHashtags,true)){
                echo "creo hashtag";
                $dbh->crateHashtag($hashtag);
            }
            $dbh->addHashtagToPost($postId, $hashtag);
        }
        header('Location: /NowMusic/src/home/home.php');
    } else {
        header('Location: /NowMusic/src/home/home.php?error=1');
    }
?>