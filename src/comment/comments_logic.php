<?php
    echo $_GET['yourComment'];
    require_once("../data_source.php");
    $email = $_SESSION['user']['Email'];
    if (isset($_GET['id_post'])) {
        // Return the value of parameter
        //var_dump($_GET['id_post']);
        if (isset($_GET['yourComment'])) {
            $dbh->addNewComment($_GET['yourComment'], $email, $_GET['id_post']);
            //header("Refresh:0");
        }
        $allPostById = $dbh->getCommentsById($_GET['id_post']);
    }

?>