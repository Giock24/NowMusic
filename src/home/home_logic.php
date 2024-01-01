<?php

    require_once("../data_source.php");

    $allpost = $dbh->getAllPosts();
    /*
    $allusername = array();

    $i = 0;
    foreach ($allpost as $post) :
        $allusername[$i] = $dbh->getInfoUser($post["Email"])["Username"];
        $i++;
    endforeach;
    */

?>