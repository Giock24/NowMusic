<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>NowMusic - Comment</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"/>
    <link rel="stylesheet" href="../../css/style.css"/>
    <link rel="stylesheet" href="./comment.css"/>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css"/>
</head>
<body>
    <?php
        require_once("../auth/check_auth.php");
        checkAuth();
    ?>
    <div class="container-fluid p-0 overflow-x-hidden h-100">
        <?php 
            require("../core/nav/home_nav.php");
        ?>
        <div class="row justify-content-center">
            <main class="col-md-12 col-12"> <!-- DIV di tutte i post -->
                <?php include 'comments_logic.php';?>
                <?php $index = 0; ?>
                <h1 class="text-center">Comments</h1>
                <div class="row comment container-fluid"> <!-- COMMENTO UNICO -->
                    <div class="img-picture col-md-1 col-2">
                        <img class="nav-item my-2 mx-1" src="../../assets/images/user_icon.png" width="50" height="50" alt="user-image"/>
                    </div>
                    <div class="user-comment col-md-11 col-10">
                        <p class="h5 my-2 mx-2">Username</p>
                        <p class="card-text">Questo è un bel commento</p>
                    </div>
                </div>
            </main>
        </div>
        <footer class="fixed-bottom container-fluid justify-content-center">
            <div class="row write-comment align-items-center">
                <div class="img-picture col-md-1 col-2">
                    <img class="nav-item my-2 mx-1" src="../../assets/images/user_icon.png" width="50" height="50" alt="user-image"/>
                </div>
                <div class="input-comment col-md-11 col-10">
                    <form action="#" method="post" class="row container-fluid">
                        <div class="col-md-10 col-10">
                            <label class="form-label" for="your-comment" hidden>Commento</label>
                            <input class="form-control" id="your-comment" name="your-comment" type="text" placeholder="Add a new comment..."/>
                        </div>
                        <div class="col-md-2 col-2">
                            <label class="submit" for="publish" hidden>Pubblica</label>
                            <input id="publish" type="submit" class="btn" value="Publish"/>
                        </div>
                    </form>
                </div>
            </div>
        </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!-- lo script è stato messo sotto di modo che non ci sia il bug dell'array vuoto -->
    <!-- dato dagli elementi che si creano con il foreach -->
</body>
</html>
