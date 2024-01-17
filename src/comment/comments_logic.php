<?php

    require_once("../data_source.php");
    $email = $_SESSION['user']['Email'];

    $allPostById = $dbh->getCommentsById(1);

?>