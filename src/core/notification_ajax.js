import {createCookie, getCookie, delete_cookie} from "./cookie_utils.js";

function create_notification(username, message){
    let notification = {
        username: username,
        message: message
    }
    console.log("notification stringify: "+JSON.stringify(notification));
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
                console.log(likes);
                console.log(comments);
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
                        let notification = create_notification(newFollower.Username, "ora ti segue.");
                        notificationList.push(notification);
                        newNotification = true;
                    }
                }
                if(newNotification){
                    console.log("new notification : "+notificationList);
                    createCookie("notification", JSON.stringify(notificationList), 1);
                    $("#notification_icon_container").load(location.href +" #notification_icon_container");
                }
                likes = likesCommentsFollowers.likes;
                comments = likesCommentsFollowers.comments;
            }
        }
    };
    xmlhttp.open("GET", "../core/notification.php", true);
    xmlhttp.send();
}, 500);


document.getElementById("notification_icon").addEventListener("click", function(){
    delete_cookie("notification", "/");
});

document.getElementById("notifications").addEventListener('hidden.bs.modal', function () {
    $("#notification_icon_container").load(location.href +" #notification_icon_container");
});