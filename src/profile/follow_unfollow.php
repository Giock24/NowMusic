<?php
    require_once("../data_source.php");
    session_start();
    $email = $_SESSION['user']['Email'];
    $email_seguito = $_POST["follow_email"];

    if (isset($_POST["follow_email"]) && $dbh->isFollow($email, $_POST["follow_email"])){
        $dbh->removeFollow($email, $_POST["follow_email"]);
    } else if ( isset($_POST["follow_email"])) {
        $dbh->addNewFollow($email, $_POST["follow_email"]);
    }
?>