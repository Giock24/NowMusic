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
</head>
<body>
    <div class="container-fluid p-0 overflow-hidden h-100">
        <nav class="navbar px-2 navbar-dark bg-dark">
            <div class="col-7 align-items-center">
                <a class="navbar-brand" href="#">NowMusic</a>
                <img class="nav-item" src="../../assets/images/NowMusic-Logo.png" alt="logo image" width="45" height="45"/>
            </div>
            <div>
                <a class="nav-item" href="#">
                    <img src="../../assets/images/circle-notifications.png" alt="notifications image"/>
                </a>
                <a class="nav-item m-2" href="#">
                    <img src="../../assets/images/user_icon.png" alt="user image"/>
                </a>
            </div>
        </nav>
        <?php
            include '../../php/call_api.php';
            //echo CallAPI("GET", "https://api.sampleapis.com/beers/ale");
        ?>
        <div class="row justify-content-center mt-4 h-100">
            <div class="col-10 col-md-4">
                <div class="text-center pb-5">
                    <h1>Create Your Post</h1>
                </div>
                <form class="mb-5" action="#">
                    <div class="row pb-2 px-3">
                        <label class="form-label" for="SearchSong" hidden>Search</label>
                        <input class="form-control" id="SearchSong" type="search" placeholder="Search a song"/>
                    </div>
                </form>
                <article class="mb-3">
                    <iframe style="border-radius:12px" src="https://open.spotify.com/embed/track/0GWNtMohuYUEHVZ40tcnHF?utm_source=generator&theme=0" width="100%" height="152" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>    
                    <button type="button" class="align-content-center">
                        Add to Post
                        <i class="bi bi-plus"></i>
                    </button>
                </article>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>