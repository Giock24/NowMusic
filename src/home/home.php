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
    <?php
        require_once("../auth/check_auth.php");
        checkAuth();
    ?>
    <div class="container-fluid p-0 overflow-x-hidden h-100">
        <?php 
            require("../core/nav/home_nav.php");
        ?>
        <div class="row pt-2 justify-content-center">
            <main class="col-md-11 col-11"> <!-- DIV di tutte i post -->
                <?php include 'home_logic.php';?>
                <?php $index = 0; ?>
                <?php foreach ($homePost as $post) : ?>
                    <!-- set Id Post for likes that you give -->         
                    <article id="<?php echo "post_{$post['Id_Post']}"; ?>" class="card container-fluid"> <!-- POST UNICO -->
                        <div class="row">
                            <section class="card-body p-0 col-md-8 col-11"> <!-- Parte centrale -->
                                <div class="navbar nav-user-like p-2 flex-row align-content-center"> <!-- Contenitore di tutto la parte centrale -->
                                    <div class="nav nav-pills"> <!---- FOTO E  NOME -->
                                        <a class="img-profile" href=<?php echo "../profile/profile_page.php?user_profile_email={$post["Email"]}"?> alt=<?php "go to the profile of {$post["Email"]}"?>>
                                            <?php if($post["UrlImmagine"] != "") :?>
                                                <img class="nav-item my-2 mx-1" src="../<?php echo UPLOAD_DIR.$post["UrlImmagine"];?>" width="27" height="27" alt="user-image"/>
                                            <?php else : ?>
                                                <img class="nav-item my-2 mx-1" src="../../assets/images/user_icon.png" width="27" height="27" alt="user-image"/>
                                            <?php endif; ?>
                                        </a>
                                        <a href=<?php echo "../profile/profile_page.php?user_profile_email={$post["Email"]}"?> alt=<?php "go to the profile of {$post["Email"]}"?>>
                                            <p class="h5 my-2 mx-2"><?php echo $post["Username"]; ?></p>    
                                        </a>
                                    </div>
                                    <div class="nav nav-pills"> <!--- LIKE E COMMENT -->
                                        <div class="comments">
                                            <a class="nav-item my-1 mx-1" href="../comment/comments.php?id_post=<?php echo $post['Id_Post']; ?>" alt="visualize comment">
                                                <span><em class="uil uil-comment-dots"><small class="comment-count"><?php echo $post["numcommenti"]; ?></small></em></span>
                                            </a>
                                        </div>
                                        <div class="likes">
                                            <a class="nav-item my-1 mx-1" href="#">
                                                <span>
                                                    <?php if($all_my_likes[$index] == 0) :?>
                                                        <em class="like uil uil-heart-break" data="<?php echo $post['Id_Post']; ?>">
                                                            <small class="likes-count"><?php echo $post["numlikes"]; ?></small>
                                                        </em>
                                                    <?php else :?>
                                                        <em class="like uil uil-heart" data="<?php echo $post['Id_Post']; ?>">
                                                            <small class="likes-count"><?php echo $post["numlikes"]; ?></small>
                                                        </em>
                                                    <?php endif; ?>
                                                    <?php $index++; ?>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="song p-2"> <!-- Canzone in mezzo  -->
                                    <iframe src="https://open.spotify.com/embed/track/<?php echo $post["Spotify_Id"]; ?>?utm_source=generator&theme=0" height="152" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
                                </div>
                                <div class="card-footer p-3">
                                    <div class="descriptions">
                                        <p class="card-text"><?php echo $post["Testo"]; ?></p>
                                    </div>
                                    <div class="tags">
                                        <?php foreach($post["all_tags"] as $tag) : ?>
                                            <p class="card-text tag"><?php echo $tag; ?></p>
                                        <?php endforeach; ?>
                                    </div>
                                    <small class="text-muted-white"><?php echo $post["Timestamp"];?> Last Update</small>
                                </div>
                            </section>
                            <div class="update col-md-4 col-12 p-2"> <!-- Parte in basso -->
                                <?php if($post["Url"] != "") :?>
                                    <img class="card-img-bottom center-block" src="../<?php echo UPLOAD_DIR.$post["Url"];?>" alt="post-image"/>
                                <?php else : ?>
                                    <img class="card-img-bottom center-block" src="../../assets/images/default_music_icon.png" alt="post-image"/>
                                <?php endif;?>
                            </div>
                        </div>
                    </article>
                <?php endforeach; ?>
            </main>
        </div>
        <footer class="fixed-bottom m-3">
            <div class="btn-circle">
                <a href="../post_creation/post_add_song.php" title="add-post"><em class="bi bi-plus"></em></a>
            </div>
        </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!-- lo script è stato messo sotto di modo che non ci sia il bug dell'array vuoto -->
    <!-- dato dagli elementi che si creano con il foreach -->
    <script src="./js/dynamic-likes.js"></script>
</body>
</html>
