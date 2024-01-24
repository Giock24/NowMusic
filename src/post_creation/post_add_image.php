<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>NowMusic - Post Creation</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/form.css">
    <link rel="stylesheet" href="./post_creation.css">
    <script src="./js/add_image.js"></script>
</head>
<body>
    <?php
        require_once("../auth/check_auth.php");
        checkAuth();
        if(isset($_POST["song_id"])){
            $_SESSION['song_id'] = $_POST["song_id"];
        }
    ?>
    <div class="container-fluid p-0 overflow-x-hidden h-100">
        <div class="d-flex flex-column h-100">
            <div  class="flex-grow-0">
                <?php
                    $navParams["backArrowHref"] = "post_add_song.php";
                    require("../core/nav/back_nav.php");
                ?>
            </div>
            <div class="flex-fill row justify-content-center mt-4">
                <div class="col-10 col-md-4 d-flex flex-column">
                    <div class="text-center pb-5">
                        <h1>Create Your Post</h1>
                    </div>
                    <form  action="upload_photo.php" method="post" class="flex-fill add-image" enctype="multipart/form-data">
                        <label for="song_id" hidden>Song Id</label>
                        <input id="song_id" type="hidden" name="song_id" value="<?php echo $_SESSION['song_id'] ?>"/>
                        <div class="input-group">
                            <img id="image-previous" src="../../assets/images/no_image.jpg" alt="previous of the image you want to upload"/>
                            <label for="fileToUpload" class="input-group" hidden>Upload a photo</label>
                            <input type="file" name="fileToUpload" id="fileToUpload" class="form-control"  accept="image/*" onchange="loadFile(event)">
                        </div>
                        <div class="row mt-3 mb-4">
                            <label class="submit" for="next" hidden>Next</label>
                            <input id="next" type="submit" class="btn" value="Next"/>
                        </div>
                    </form>
                </div>
            </div>
            <?php if(isset($_GET["error"]) && $_GET["error"]==1) : ?>
                <script>
                    alert("Sorry, there was an error uploading your file.");
                </script>
            <?php endif; ?>
        </div>
       
       
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>