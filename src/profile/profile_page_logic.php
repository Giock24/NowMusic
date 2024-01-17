<?php
 require_once("../data_source.php");
 require_once("../auth/check_auth.php");
 checkAuth();
 $user = $_SESSION["user"];

 if(isset($_GET["user_profile_email"])){
   $user = $dbh->getProfile($_GET["user_profile_email"]);
 }    

 $allmypost = $dbh->getPosts($user["Email"]);
 
?>