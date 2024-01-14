<?php
  function checkAuth() {
    session_start();
    if(!array_key_exists('user',$_SESSION)){
        header('Location: /NowMusic/src/auth/login.php');
    }
  }
?>