<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Profile-Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../../css/form.css"/>
    <link rel="stylesheet" href="./profile_page.css">
    <link rel="stylesheet" href="../../css/style.css"/>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <?php
        require_once("./profile_page_logic.php");
    ?>
    <?php if(isset($_GET["error"]) && $_GET["error"]==1) : ?>
                <script>
                    alert("Fail download Image !");
                </script>
    <?php endif; ?>
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
                            <img src=<?php 
                                if($user["UrlImmagine"] == null){
                                    echo "../../assets/images/user_icon.png";
                                }else{
                                    echo "../upload/{$user['UrlImmagine']}";
                                }
                                    
                            ?> alt="Profile Image">
                        </div>
                        <div class="edge-info">
                            <p class="text-center"><strong><?php echo($user["Username"])?></strong></p>
                            <p class="text-center"><strong><?php echo $followers ?></strong> Followers <strong><?php echo count($allmypost) ?> </strong>Post</p>
                        </div>
                        <div class="bio">
                            <ul>
                                <li>Email: <?php echo($user["Email"])?><li>
                                <li>Data di Nascita: <?php
                                    if($user["DateOfBirth"] == null){
                                        echo("Not specified");
                                    }else{
                                        $date = date_create($user["DateOfBirth"]);
                                        echo date_format($date,"d/m/Y");
                                    }
                                ?> </li>
                                <li>Genere: <?php 
                                    if($user["Gender"] == 0){
                                        echo "Other";
                                    }else{
                                        if($user["Gender"] ==1 ){
                                            echo "Male";
                                        } else {
                                            echo "Female";
                                        }
                                    }
                                ?></li>
                                <li>Bio: <?php echo($user["Biografia"])?></li>
                            </ul>
                        </div>
                        <?php if($user["Email"] == $_SESSION["user"]["Email"]) : ?>
                            <button type="button" class="btn btn-secondary mt-2 mb-5 py-1 btn-sm" data-bs-target="#modify_profile" data-bs-toggle="modal" style="max-width:50%">
                                <span class="profile"><emclass="fa-solid fa-user-gear"></i><h3>Edit Profile</h3></span>
                            </button>
                        <?php else : ?>
                            <button type="button" class="follow_unfollow btn btn-secondary mt-2 mb-5 py-1 btn-sm" style="max-width:50%" data=<?php echo $user["Email"] ?>>
                                <span class="profile">
                                    <?php if($isFollowed) : ?>
                                        <h3>Unfollow</h3>
                                    <?php else : ?>
                                        <h3>Follow</h3>
                                    <?php endif; ?>
                                </span>
                            </button>
                        <?php endif; ?>
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
                                                    <form action="upload_photo.php" method="post" enctype="multipart/form-data">
                                                        <img class="js-image img-fluid rounded" src="../../assets/images/user_icon.png" style="width: 180px; height:180px;object-fit: cover;" alt="profile_user_image"/>
                                                        <div class="mb-3">
                                                            <label for="imageProfile" class="form-label">Click below to select an image</label>
                                                            <input onchange="display_image(this.files[0])" class="form-control" type="file" id="imageProfile" name="imageProfile" accept="image/*">
                                                        </div>
                                                        <div class="row pb-2 px-3">
                                                            <label class="submit" for="change_image" hidden>Change photo</label>
                                                            <input id="change_image" type="submit" class="btn" value="Change photo"/>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="col-md-8">
                                                    <form class="row" action="change_profile_data.php" method="post">
                                                    <table class="table table-strped">
                                                        <tr><th colspan="2">User Details:</th></tr>
                                                        <tr><th><emclass="fa-solid fa-user"></em>Username</th>
                                                            <td>
                                                                <label class="submit" for="username" hidden>username</label>
                                                                <input id="username" type="text" class="form-control" name="username" placeholder="Username">
                                                            </td>
                                                        </tr>
                                                        <tr><th><emclass="fa-solid fa-venus"></em>Gender</th>
                                                            <td>
                                                                <label class="submit" for="gender" hidden>gender</label>
                                                                <select id="gender" class="form-select form-select mb-3" name="gender" arial-label="form-select-lg example" >
                                                                    <option selected value="">--Select Gender--</option>
                                                                    <option value="Male">Male</option>
                                                                    <option value="Female">Female</option>
                                                                    <option value="Other">Other</option>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr><th><emclass="fa-solid fa-cake-candles"></em>Data di Nascita</th>
                                                            <td>
                                                                <label class="birthdaydate" for="gender" hidden>gender</label>
                                                                <input id="birthdaydate" type="date" class="form-control" name="birthdaydate" >
                                                            </td>
                                                        </tr>
                                                        <tr><th><emclass="fa-regular fa-pen-to-square"></em>Biografia</th>
                                                            <td>
                                                                <div class="form-group">
                                                                    <label for="biografia" hidden>Bio</label>
                                                                    <textarea class="form-control" id="biografia" name="biografia" rows="3" placeholder="Enter Text here.."></textarea>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <div class="p-2">
                                                        <label class="submit" for="save_profile_change" hidden>Save</label>
                                                        <input id="save_profile_change" type="submit" class="btn" value="save" style="width:100%"/>
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
                <?php $index = 0; ?>
                <?php foreach($allmypost as $post) :?>
                <div class="my-posts p-2">
                    <article class="card p-2 container-fluid"> <!-- POST UNICO -->
                        <div class="row">
                            <section class="card-body px-3 col-md-8 col-11"> <!-- Parte centrale -->
                                <div class="navbar flex-row align-content-center"> <!-- Contenitore di tutto la parte centrale -->
                                    <div class="nav nav-pills"> <!---- FOTO E  NOME -->
                                        <div class="img-profile2">
                                            <?php if($post["UrlImmagine"] != "") :?>
                                                <img class="nav-item my-2 mx-1" src="../<?php echo UPLOAD_DIR.$post["UrlImmagine"];?>" width="27" height="27" alt="user-image"/>
                                            <?php else : ?>
                                                <img class="nav-item my-2 mx-1" src="../../assets/images/user_icon.png" width="27" height="27" alt="user-image"/>
                                            <?php endif; ?>
                                        </div>
                                        <p class="h5 my-2 mx-2"><?php echo $post["Username"] ?></p>
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
                                <?php if($post["Url"] != "") :?>
                                    <img class="card-img-bottom center-block" src="../<?php echo UPLOAD_DIR.$post["Url"];?>" alt="post-image"/>
                                <?php else : ?>
                                    <img class="card-img-bottom center-block" src="../../assets/images/default_music_icon.png" alt="post-image"/>
                                <?php endif;?>
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
    <script src="./profile_page_logic.js"></script>
    <script src="./dynamic-likes-profile.js"></script>
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