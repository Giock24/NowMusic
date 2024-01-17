<?php
 require_once("../data_source.php");
 require_once("../auth/check_auth.php");
 checkAuth();
 $user = $_SESSION["user"];
 $isFollowed = false;

 if(isset($_GET["user_profile_email"])){
   $user = $dbh->getProfile($_GET["user_profile_email"]);
   $isFollowed = count($dbh->isFollow($_SESSION["user"]["Email"],$user["Email"])) > 0;
 }     

 $allmypost = $dbh->getPosts($user["Email"]);
 
?>