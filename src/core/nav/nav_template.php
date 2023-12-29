
<nav class="navbar px-2 navbar-dark bg-dark">
    <div class="col-7 align-items-center">
        <?php if($navParams["showarrow"] === false) : ?>
            <a class="navbar-brand" href="../home/home.php">NowMusic</a>
            <img class="nav-item" src="../../assets/images/NowMusic-Logo.png" alt="logo image" width="45" height="45"/>
        <?php else : ?>
            <a class="navbar-brand col-7 align-items-center" href="../home/home.php">
                <i class="bi bi-arrow-left-short"></i>
            </a>
        <?php endif; ?>
    </div>
    <div class="nav nav-pills">
        <?php if($navParams["showlogout"] === false) : ?>
            <div class="notifications">
            <button type="button" class="nav-item py-1 notification-button" data-bs-target="#notifications" data-bs-toggle="modal">
                <img src="../../assets/images/circle-notifications.png" alt="notifications image"/>
            </button>
            <!-- Full screen modal -->
            <div class="modal fade" id="notifications" aria-hidden="true" tabindex="-1">
                <div class="modal-dialog modal-xl modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="notificationsLabel">Notification</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="card card-notification">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-md-1 col-1 center-block">
                                            <img class="nav-item my-2 mx-1" src="../../assets/images/user_icon.png" width="27" height="27" alt="user-image"/>
                                        </div>
                                        <div class="col-md-11 col-11 py-1">
                                            <p class="h5">gianluca.consoli</p>
                                            <p>ha messo mi piace al tuo post.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-notification">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-md-1 col-1 center-block">
                                            <img class="nav-item my-2 mx-1" src="../../assets/images/user_icon.png" width="27" height="27" alt="user-image"/>
                                        </div>
                                        <div class="col-md-11 col-11 py-1">
                                            <p class="h5">riccardo.garde</p>
                                            <p>ha commentato: "Bella questa canzone"</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                        
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <div class="account-user">
            <a class="nav-item m-2" href="../profile/profile_page.php">
                <img src="../../assets/images/user_icon.png" alt="user-image" height="38" width="37"/>
            </a>
            </div>
        <?php else : ?>
            <div class="nav nav-pills logout ">
                <a href="#" class="nav-item"><span><em class="uil uil-sign-out-alt"></em></span></a>
            </div>
        <?php endif; ?>
    </div>
</nav>
