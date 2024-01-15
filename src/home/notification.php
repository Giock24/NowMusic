<?php
    require_once("../data_source.php");

    echo json_encode($dbh->getAllHashtags());
?>