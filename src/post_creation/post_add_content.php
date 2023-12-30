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
    <link rel="stylesheet" href="../../css/form.css"/>
    <link rel="stylesheet" href="./post_creation.css">
</head>
<body>
    <div class="container-fluid p-0 overflow-hidden h-100">
        <div class="d-flex flex-column h-100">
            <div  class="flex-grow-0">
                <?php
                    $navParams["backArrowHref"] = "post_add_image.php";
                    require("../core/nav/back_nav.php");
                ?>
            </div>
            <div class="flex-fill row justify-content-center mt-4 ">
                <div class="col-10 col-md-4 d-flex flex-column">
                    <div class="text-center pb-5">
                        <h1>Create Your Post</h1>
                    </div>
                    <form action="#" class="flex-fill d-flex flex-column">
                        <div class="form-group mb-4">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="hashtag">Hashtag</label>
                            <div class="row g-3 mb-2">
                                <div class="col-md-8">
                                    <input class="form-control" id="hashtag" type="password" placeholder="#NowMusic" style="line-height: 2em;"/>
                                </div>
                                <div class="col-md-4">
                                    <button type="button">Add
                                        <i class="bi bi-plus"></i>
                                    </button>
                                </div>
                            </div>
                            <label>Added Hashtags:</label>
                            <p id="added-hashtags">#NowMusic</p>
                        </div>
                        <div class="row h-100 pb-4">
                            <button type="submit" class="btn btn-primary" style="align-self: flex-end">Next</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>