<?php
 require_once("../data_source.php");
 require_once("../auth/check_auth.php");
 checkAuth();
 $user = $_SESSION["user"];

 $TemplateParams["Posts"] = $dbh->getPosts($user["Email"]);
 print_r($TemplateParams["Posts"])

?>