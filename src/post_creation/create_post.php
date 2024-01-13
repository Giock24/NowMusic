<?php
    require_once("../data_source.php");

    session_start();
    $song = $_SESSION['song_id'];
    $imagePath = $_SESSION['image_path'];
    $description = $_POST['description'];
    $hashtags = $_POST['hashtags'];

    print_r($hashtags);
    print_r($description);
    print_r($imagePath);
    print_r($song);
?>