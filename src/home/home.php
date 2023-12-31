<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>NowMusic - Home</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"/>
    <link rel="stylesheet" href="./home.css"/>
    <link rel="stylesheet" href="../../css/style.css"/>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css"/>
</head>
<body>
    <div class="container-fluid p-0 overflow-x-hidden h-100">
        <?php 
            require("../core/nav/home_nav.php");
        ?>

        <div class="row pt-2 justify-content-center">
            <main class="col-md-4 col-11"> <!-- DIV di tutte i post -->
                <?php include 'home_logic.php';?>
                <?php foreach ($allpost as $post) : ?>           
                    <article class="card p-2"> <!-- POST UNICO -->
                        <div class="song"> <!-- Canzone in alto  -->
                            <iframe src="https://open.spotify.com/embed/track/<?php echo $post["Spotify_Id"]; ?>?utm_source=generator&theme=0" height="152" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
                        </div>
                        <section class="card-body px-3"> <!-- Parte centrale -->
                            <div class="navbar flex-row align-content-center"> <!-- Contenitore di tutto la parte centrale -->
                                <div class="nav nav-pills"> <!---- FOTO E  NOME -->
                                    <img class="nav-item my-2 mx-1" src="../../assets/images/user_icon.png" width="27" height="27" alt="user-image"/>
                                    <p class="h5 my-2 mx-2"><?php echo $post["Username"]; ?></p>
                                </div>
                                <div class="nav nav-pills"> <!--- LIKE E COMMENT -->
                                    <div class="comments">
                                        <a class="nav-item my-1 mx-1" href="#">
                                            <span><em class="uil uil-comment-dots"><small class="comment-count"><?php echo $post["numcommenti"]; ?></small></em></span>
                                        </a>
                                    </div>
                                    <div class="likes">
                                        <a class="nav-item my-1 mx-1" href="#">
                                            <span><em class="uil uil-heart"><small class="likes-count"><?php echo $post["numlikes"]; ?></small></em></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="descriptions">
                                <p class="card-text"><?php echo $post["Testo"]; ?></p>
                            </div>
                            <div class="tags">
                                <?php foreach($post["all_tags"] as $tag) : ?>
                                    <p class="card-text"><?php echo $tag; ?></p>
                                <?php endforeach; ?>
                            </div>
                        </section>
                        <div class="update"> <!-- Parte in basso -->
                            <div class="card-footer border-top border-light">
                                <small class="text-muted-white"><?php echo $post["Timestamp"];?> Last Update</small>
                            </div>
                            <img class="card-img-bottom" src="../<?php echo UPLOAD_DIR.$post["Url"];?>" alt="immagine-post">
                        </div>
                    </article>
                <?php endforeach; ?>
                <article class="card p-2"> <!-- POST UNICO -->
                    <div class="song"> <!-- Canzone in alto  -->
                        <iframe src="https://open.spotify.com/embed/track/0o9zmvc5f3EFApU52PPIyW?utm_source=generator&theme=0" height="152" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
                    </div>
                    <section class="card-body px-3"> <!-- Parte centrale -->
                        <div class="navbar flex-row align-content-center"> <!-- Contenitore di tutto la parte centrale -->
                            <div class="nav nav-pills"> <!---- FOTO E  NOME -->
                                <img class="nav-item my-2 mx-1" src="../../assets/images/user_icon.png" width="27" height="27" alt="user-image"/>
                                <p class="h5 my-2 mx-2">Username</p>
                            </div>
                            <div class="nav nav-pills"> <!--- LIKE E COMMENT -->
                                <div class="comments">
                                    <a class="nav-item my-1 mx-1" href="#">
                                        <span><em class="uil uil-comment-dots"><small class="comment-count">1 K</small></em></span>
                                    </a>
                                </div>
                                <div class="likes">
                                    <a class="nav-item my-1 mx-1" href="#">
                                        <span><em class="uil uil-heart"><small class="likes-count">500 K</small></em></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="descriptions">
                            <p class="card-text">This track is awesome, I suggest you to listen!!!</p>
                        </div>
                        <div class="tags">
                            <p class="card-text">#NowMusic #chill #lovemusic</p>
                        </div>
                    </section>
                    <div class="update"> <!-- Parte in basso -->
                        <div class="card-footer border-top border-light">
                            <small class="text-muted-white">Last updated 1 min ago</small>
                        </div>
                        <img class="card-img-bottom" src="../../assets/images/post_image.png" alt="immagine-post">
                    </div>
                </article>
                
            </main>
        </div>
        <footer class="fixed-bottom m-3">
            <div class="btn-circle">
                <a href="../post_creation/post_add_song.php" title="add-post"><em class="bi bi-plus"></em></a>
            </div>
        </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
