
<?php
    if(isset($_COOKIE["notification"]) && count(json_decode($_COOKIE["notification"], true))) {
        $_POST["notifications"] = json_decode($_COOKIE["notification"], true);
    }
?>

<nav class="navbar px-2 navbar-dark bg-dark sticky-top">
    <div class="col-7 align-items-center">
        <?php if($navParams["showarrow"] === false) : ?>
            <a class="navbar-brand" href="../home/home.php" title ="go to home page">NowMusic</a>
            <img class="nav-item" src="../../assets/images/NowMusic-Logo.png" alt="logo image" width="45" height="45"/>
        <?php else : ?>
            <a class="navbar-brand col-7 align-items-center" href=<?php echo $navParams["backArrowHref"] ?>  title="go back">
                <em class="bi bi-arrow-left-short" style="font-size:32px" alt="go back icon"></em>
            </a>
        <?php endif; ?>
    </div>
    <div class="nav nav-pills">
        <?php if($navParams["showlogout"] === false) : ?>
            <div id="notification_icon_container" class="notifications" style="position: relative; padding-left:10px">
                <?php if(isset($_POST["notifications"])) : ?>
                    <span class='badge' id='notification_count' style="position: absolute; top: 0; left: 0; height: 24px; width: 24px; border-radius:25px; background:#C318FA; border: 1px solid #000000;">
                        <?php echo count($_POST["notifications"]); ?>
                    </span>
                <?php else: ?>
                    <span class='badge' id='notification_count' hidden="true" style="position: absolute; top: 0; left: 0; height: 24px; width: 24px; border-radius:25px; background:#C318FA; border: 1px solid #000000;">
                        0
                    </span>
                <?php endif; ?>
                <button id="notification_icon" type="button" class="nav-item py-1 notification-button" data-bs-target="#notifications" data-bs-toggle="modal">
                    <img src="../../assets/images/circle-notifications.png" alt="notifications image"/>
                </button>
            </div>
            <div class="account-user">
                <a class="nav-item m-2" href="../profile/profile_page.php" title="go to login page">
                    <?php if($_SESSION['user']["UrlImmagine"] != "") :?>
                        <img class="nav-item" src=<?php echo "../upload/{$_SESSION['user']['UrlImmagine']}"?> height="38" width="37" alt="user-image"/>
                    <?php else : ?>
                        <img class="nav-item" src="../../assets/images/user_icon.png" height="38" width="37" alt="user-image"/>
                    <?php endif; ?>
                </a>
            </div>
        <?php else : ?>
            <div class="nav nav-pills logout ">
                <a href="../auth/login.php" class="nav-item" title="go to login page"><span><em class="uil uil-sign-out-alt"></em></span></a>
            </div>
        <?php endif; ?>
    </div>
</nav>
<!-- Full screen modal -->
<div class="modal fade" id="notifications" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="notificationsLabel">Notification</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body" id="body">
                                <?php if(isset($_POST["notifications"])) : ?>
                                    <?php foreach($_POST["notifications"] as $notification) : 
                                        $notificationJson = json_decode($notification);
                                        $username = $notificationJson->username;
                                        $message = $notificationJson->message; 
                                    ?>
                                        <div class="card card-notification">
                                            <div class="card-body">
                                                <div class="row align-items-center">
                                                    <div class="col-md-1 col-1 center-block">
                                                        <img class="nav-item my-2 mx-1" src="../../assets/images/user_icon.png" width="27" height="27" alt="user-image"/>
                                                    </div>
                                                    <div class="col-md-11 col-11 py-1">
                                                        <p class="h5"><?php echo $username ?></p>
                                                        <p><?php echo $message; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                            <div class="modal-footer">
                            
                            </div>
                        </div>
    </div>
</div>
<script type="module" src="../core/notification_ajax.js"></script>
