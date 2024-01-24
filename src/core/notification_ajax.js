import {createCookie, getCookie, delete_cookie} from "./cookie_utils.js";

function create_notification(username, message){
    let notification = {
        username: username,
        message: message
    }
    //console.log("notification stringify: "+JSON.stringify(notification));
    return JSON.stringify(notification);
}

let likes=null, comments=null, followers=null;
let notificationList = [];
let currentNotifications = getCookie("notification");
if(currentNotifications===undefined){
    console.log("cookie undefined");
    createCookie("notification", JSON.stringify(notificationList), 1);
} else {
    notificationList = JSON.parse(decodeURIComponent(currentNotifications));
    console.log("notification list: "+notificationList);
}

setInterval(function() {
    let xmlhttp, likesCommentsFollowers;
    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            likesCommentsFollowers = JSON.parse(this.responseText);
            if(likes == null || comments == null){
                likes = likesCommentsFollowers.likes;
                comments = likesCommentsFollowers.comments;
                followers = likesCommentsFollowers.followers;
                //console.log(likes);
                //console.log(comments);
            } else {
                let newNotification = false;
                if(likesCommentsFollowers.likes.length > likes.length){
                    let newLikes = likesCommentsFollowers.likes.slice(likes.length);
                    for(let i=0; i<newLikes.length; i++){
                        let newLike = newLikes[i];
                        let notification = create_notification(newLike.Username, "ha messo mi piace al tuo post.");
                        notificationList.push(notification);
                        newNotification = true;
                    }
                }
                if(likesCommentsFollowers.comments.length > comments.length){
                    let newComments = likesCommentsFollowers.comments.slice(comments.length);
                    for(let i=0; i<newComments.length; i++){
                        let newComment = newComments[i];
                        let notification = create_notification(newComment.Username, 'ha commentato: "' + newComment.comment +'"');
                        notificationList.push(notification);
                        newNotification = true;
                    }
                }
                if(likesCommentsFollowers.followers.length > followers.length){
                    let newFollowers = likesCommentsFollowers.followers.slice(followers.length);
                    for(let i=0; i<newFollowers.length; i++){
                        let newFollower = newFollowers[i];
                        console.log(newFollower);
                        let notification = create_notification(newFollower.Username, "ora ti segue.");
                        notificationList.push(notification);
                        newNotification = true;
                    }
                }
                likes = likesCommentsFollowers.likes;
                comments = likesCommentsFollowers.comments;
                followers = likesCommentsFollowers.followers;
                if(newNotification){
                    console.log("new notification : "+notificationList);
                    createCookie("notification", JSON.stringify(notificationList), 1);
                    let elem_notification = document.getElementById("notification_count");
                    //console.log(elem_notification);
                    
                    if (parseInt(elem_notification.innerHTML) > 0) {
                        elem_notification.innerHTML = notificationList.length;
                        
                        let modal = document.getElementsByClassName("modal-body");
                        modal.innerHTML =  `<p>prova</p>`;
                        //console.log(modal);
                    } else {
                        elem_notification.removeAttribute("hidden");
                        elem_notification.innerHTML = notificationList.length;
                        
                        // essenzialmente manca il fatto di aggiornare direttamente qui
                        // con il foreach messo nella modale, per fare apparire
                        // in modo dinamico le nuove notifiche
                        let modal = document.getElementsByClassName("modal-body");
                        modal.innerHTML =  `<p>prova</p>`;
                        //console.log(modal);
                    }
                }
            }
        }
    };
    xmlhttp.open("GET", "../core/notification.php", true);
    xmlhttp.send();
}, 100);


document.getElementById("notification_icon").addEventListener("click", function(){
    delete_cookie("notification", "/");

    let modal = document.getElementById("body");
    modal.innerHTML = "";
    for (let i = 0; i < notificationList.length; i++) {
        let elemNotification = JSON.parse(notificationList[i]);
        let username = elemNotification.username;
        let message = elemNotification.message; 
        let notification = `
        <div class="card card-notification">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-1 col-1 center-block">
                        <img class="nav-item my-2 mx-1" src="../../assets/images/user_icon.png" width="27" height="27" alt="user-image"/>
                    </div>
                    <div class="col-md-11 col-11 py-1">
                        <p class="h5"> ${username}</p>
                        <p>${message}</p>
                    </div>
                </div>
            </div>
        </div>`;
        modal.innerHTML += notification;
    }
    
    console.log(modal);
});

document.getElementById("notifications").addEventListener('hidden.bs.modal', function () {
    let elem_notification = document.getElementById("notification_count");
    elem_notification.setAttribute("hidden", "hidden");
    elem_notification.innerHTML = 0;

    notificationList = [];
});