<?php
 require_once("../data_source.php");
 require_once("../auth/check_auth.php");
 checkAuth();
 $user = $_SESSION["user"];

 $allmypost = $dbh->getPosts($user["Email"]);
 #print_r($allmypost);

?>