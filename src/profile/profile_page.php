<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Profile-Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./profile_page.css">
    <link rel="stylesheet" href="../../css/style.css"/>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
</head>
<body>
    <div class="container-fluid overflow-x-hidden p-0 h-100">
        <div class="d-flex flex-column h-100">
            <div  class="bg-danger flex-grow-0">
                <?php 
                    require("../core/nav/profile_nav.php");
                ?>
            </div>   
            <div class="page-content row">
                <div class="info-user col-md-4 col-12"> 
                    <div class="row pt-2 justify-content-center" >
                        <div class="img-profile">
                            <img src="../../assets/images/user_icon.png" class="rounded mx-auto d-block" alt="Profile Image">
                        </div>
                        <div class="edge-info">
                            <p class="text-center"><strong>Username</strong></p>
                            <p class="text-center"><strong>100k</strong> Followers <strong>1</strong>Post</p>
                        </div>
                        <div class="bio">
                            <ul>
                                <li>Bio: </li>
                                <li>Mario Rossi</li>
                                <li>Data di Nascita --/--/---- </li>
                                <li>Ingegneria e Scinze Informatiche - Cesena </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="posts col-md-7 col-12">
                <h1>YOUR POSTS</h1>
                <div class="my-posts">
                    <article class="card p-2"> <!-- POST UNICO -->
                        <div class="row container-fluid">
                            <section class="card-body px-3 col-md-8 col-11"> <!-- Parte centrale -->
                                <div class="navbar flex-row align-content-center"> <!-- Contenitore di tutto la parte centrale -->
                                    <div class="nav nav-pills"> <!---- FOTO E  NOME -->
                                        <img class="nav-item my-2 mx-1" src="../../assets/images/user_icon.png" width="27" height="27" alt="user-image"/>
                                        <p class="h5 my-2 mx-2">username</p>
                                    </div>
                                    <div class="nav nav-pills"> <!--- LIKE E COMMENT -->
                                        <div class="comments">
                                            <a class="nav-item my-1 mx-1" href="#">
                                                <span><em class="uil uil-comment-dots"><small class="comment-count">12</small></em></span>
                                            </a>
                                        </div>
                                        <div class="likes">
                                            <a class="nav-item my-1 mx-1" href="#">
                                                <span><em class="uil uil-heart"><small class="likes-count">120</small></em></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <iframe src="https://open.spotify.com/embed/track/1rDgAHDX95RmylxjgVW9tN?utm_source=generator&theme=0" height="152" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
                                <div class="descriptions">
                                    <p class="card-text">This track is awesome, I suggest you to listen!!!</p>
                                </div>
                                <div class="tags">
                                    <p class="card-text">#NowMusic #chill #lovemusic</p>
                                </div>
                            </section>
                            <div class="update col-md-4 col-11"> <!-- Parte in basso -->
                                <img class="card-img-bottom" src="../../assets/images/post_image.png" alt="immagine-post">
                            </div>
                        </div>
                    </article>
                    <!--
                    <article class="single-post">
                        <div class="username-post">
                            <div class="img-profile">
                                <img src="../../assets/images/user_icon.png" alt="img-profile">
                            </div>
                            <div class="name-user">
                                <p>Username</p>
                            </div>
                        </div>
                        <div class="img-post">
                            <img src="../../assets/images/post_image.png" alt="post Image">
                        </div>
                        <section class="info-post">

                        </section>
                    </article>
                    -->
                </div>
            </div>
        </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>