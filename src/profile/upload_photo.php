<?php

function upload_photo($file) {

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
    return false;
  } else if(!file_exists($target_file)) {
      return move_uploaded_file($file["tmp_name"], $target_file);
    }
    return true; 

}

?>