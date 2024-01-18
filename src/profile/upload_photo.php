<?php
  require_once("../data_source.php");
  session_start();
  $user = $_SESSION["user"];

  $file = $_FILES["imageProfile"];

  $target_dir = "../upload/";
  $target_file = $target_dir . basename($file["name"]);
  $uploadOk = 1; # 1->OK
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


  // Check if image file is a actual image or fake image
  if(isset($_POST["submit"])) {  # ?.....
    $check = getimagesize($file["tmp_name"]);
    if($check !== false) {
      $uploadOk = 1;
    } else {
      $uploadOk = 0;
    }
  }

  // Check file size
  if ($file["size"] > 500000) {
    $uploadOk = 0;
  }

  // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
      $uploadOk = 0;
  }

  // Check if $uploadOk is set to 0 by an error  
  if ($uploadOk = 0){
    header('Location: /NowMusic/src/profile/profile_page.php?error=1');
  } else if(!file_exists($target_file)) {
    move_uploaded_file($file["tmp_name"], $target_file);
  } 

  # This function returns true if the variable exists and is not NULL
  $imgProfileFile = $file["name"];
  $dbh->modifyProfile($user["Email"], "", "", $imgProfileFile, "", "");
  $_SESSION["user"] = $dbh->login($user["Email"], $user["Password"])[0];
  header('Location: /NowMusic/src/profile/profile_page.php');
?>