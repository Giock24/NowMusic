<?php
if($_FILES["fileToUpload"]["name"]==""){
    session_start();
    $_SESSION['image_path'] = "";
    header("Location: /NowMusic/src/post_creation/post_add_content.php");
    exit();
}

$target_dir = "../upload/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    $uploadOk = 1;
  } else {
    $uploadOk = 0;
  }
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  header('Location: /NowMusic/src/post_creation/post_add_image.php?error=1');
// if everything is ok, try to upload file
} else {
  if (file_exists($target_file) || move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    //echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
    session_start();
    $_SESSION['image_path'] = basename($target_file);
    header("Location: /NowMusic/src/post_creation/post_add_content.php");
  } else {
    header('Location: /NowMusic/src/post_creation/post_add_image.php?error=1');
  }
}
?>