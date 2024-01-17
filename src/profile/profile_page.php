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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <?php
        require_once("profile_page_logic.php")
    ?>
    <div class="container-fluid overflow-x-hidden p-0 h-100">
        <div class="d-flex flex-column h-100">
            <div  class="flex-grow-0">
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
                                <li><?php echo($user["Username"])?></li>
                                <li>Email: <?php echo($user["Email"])?><li>
                                <li>Data di Nascita --/--/---- </li>
                                <li>Ingegneria e Scinze Informatiche - Cesena </li>
                            </ul>
                        </div>
                        <button type="button" class="btn btn-secondary py-1 btn-sm" data-bs-target="#modify_profile" data-bs-toggle="modal">
                            <span class="profile"><i class="fa-solid fa-user-gear"></i><h3>Modifica profilo</h3></span>
                        </button>
                        <!--modal -->
                        
                        <div class="modal fade" id="modify_profile" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-xl modal-dialog-scrollable">
                                <!-- Conteuto della modale -->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="notificationsLabel">Edit Profile </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <!-- Body della modale  -->
                                    <div class="modal-body row col-lg-8 border rounded mx-auto mt-5 p-2 shadow-lg">
                                            <div class="col-md-4 text center">
                                                <img class="js-image img-fluid rounded" src="../../assets/images/user_icon.png" style="width: 180px; height:180px;object-fit: cover;" alt="profile_user_image"/>
                                                    <div class="mb-3">
                                                        <label for="formFile" class="form-label">Click below to select an image</label>
                                                        <input onchange="display_image(this.files[0])" class="form-control" type="file" id="formFile">
                                                    </div>
                                            </div>
                                            <div class="col-md-8">
                                                <form method="post">
                                                    <table class="table table-strped">
                                                        <tr><th colspan="2">User Details:</th></tr>
                                                        <tr><th><i class="fa-regular fa-envelope"></i> Email</th>
                                                            <td>
                                                            <input type="text" class="form-control" name="email"    placeholder="Email">                                        
                                                            </td>
                                                        </tr>
                                                        <tr><th><i class="fa-solid fa-user"></i> Username</th>
                                                            <td>
                                                                <input type="text" class="form-control" name="username"     placeholder="Username">
                                                            </td>
                                                        </tr>
                                                        <tr><th><i class="fa-solid fa-venus"></i> Gender</th>
                                                            <td>
                                                                <select class="form-select form-select mb-3"    arial-label="form-select-lg       example" >
                                                                <option selected value="">--Select Gender--</option>
                                                                <option value="Male">Male</option>
                                                                <option value="Female">Female</option>
                                                                <option value="Other">Other</option>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr><th><i class="fa-solid fa-cake-candles"></i> Data di Nascita</th>
                                                            <td>
                                                                <input type="date" class="form-control" name="birthday date" >
                                                            </td>
                                                        </tr>
                                                        <tr><th><i class="fa-regular fa-pen-to-square"></i> Biografia</th>
                                                            <td>
                                                                <textarea name="biografia" id="biografia" cols="40" rows="4"> Enter Text here..</textarea>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <div class="p-2">
                                                        <button class="btn btn-primary float-end">Save</button>
                                                    </div>
                                                </form>    
                                            </div>
                                    </div>
                                    <div class="modal-footer ">
                            
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="posts col-md-8 col-12">
                <h1 class="text-center">YOUR POSTS</h1>
                <?php foreach($allmypost as $post) :?>
                <div class="my-posts p-2">
                    <article class="card p-2 container-fluid"> <!-- POST UNICO -->
                        <div class="row">
                            <section class="card-body px-3 col-md-8 col-11"> <!-- Parte centrale -->
                                <div class="navbar flex-row align-content-center"> <!-- Contenitore di tutto la parte centrale -->
                                    <div class="nav nav-pills"> <!---- FOTO E  NOME -->
                                        <img class="nav-item my-2 mx-1" src="../../assets/images/user_icon.png" width="27" height="27" alt="user-image"/>
                                        <p class="h5 my-2 mx-2"><?php echo $post["Username"] ?></p>
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
                                <iframe src="https://open.spotify.com/embed/track/<?php echo $post["Spotify_Id"]; ?>" height="152" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
                                <div class="descriptions">
                                    <p class="card-text"><?php echo $post["Testo"] ?></p>
                                </div>
                                <div class="tags">
                                    <?php foreach($post["all_tags"] as $tag) : ?>
                                        <p class="card-text"><?php echo $tag; ?></p>
                                    <?php endforeach; ?>
                                </div>
                            </section>
                            <div class="update col-md-4 col-12"> <!-- Parte in basso -->
                                <img class="card-img-bottom center-block" src="../upload/<?php echo $post["Url"] ?>" alt="immagine-post">
                            </div>
                        </div>
                    </article>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>

<script>
    console.log(URL);
    function display_image(file)
    {
        var img = document.querySelector(".js-image");
        img.src = URL.createObjectURL(file);
    }
</script>