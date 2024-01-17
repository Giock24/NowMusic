<?php
 require_once("../data_source.php");
 require_once("../auth/check_auth.php");
 checkAuth();
 $user = $_SESSION["user"];

 if(isset($_POST["user_profile"])){
    $user = $_POST["user_profile"];
 }    

 $allmypost = $dbh->getPosts($user["Email"]);
 
?>