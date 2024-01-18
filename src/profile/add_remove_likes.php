<?php

    require_once("../data_source.php");
    session_start();
    $email = $_SESSION['user']['Email'];

    if ( isset($_POST["like_idpost"]) && ($dbh->youPutLike($email, $_POST["like_idpost"]) == 0) ) {
        //echo $_POST["like_idpost"];
        $dbh->addNewLike($email, $_POST["like_idpost"]);
        echo "Messo Like";
    } else if ( isset($_POST["like_idpost"]) && ($dbh->youPutLike($email, $_POST["like_idpost"]) != 0) ) {
        echo "Like TOLTO";
        $dbh->removeLike($email, $_POST["like_idpost"]);
    }
?>