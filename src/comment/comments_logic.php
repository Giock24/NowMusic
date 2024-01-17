<?php

    require_once("../data_source.php");
    $email = $_SESSION['user']['Email'];
    if (isset($_GET['id_post'])) {
        // Return the value of parameter
        //var_dump($_GET['id_post']);
        $allPostById = $dbh->getCommentsById($_GET['id_post']);
        if (isset($_POST['your-comment'])) {
            $dbh->addNewComment($_POST['your-comment'], $email, $_GET['id_post']);
            header("Refresh:0");
        }

    }

?>