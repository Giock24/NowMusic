import {createCookie, getCookie, delete_cookie} from "../core/cookie_utils.js";

function create_notification(username, message){
    var notification = {
        username: username,
        message: message
    }
    console.log("notification stringify: "+JSON.stringify(notification));
    return JSON.stringify(notification);
}

var likes=null, comments=null;
var notificationList = [];
var currentNotifications = getCookie("notification");
if(currentNotifications===undefined){
    console.log("cookie undefined");
    createCookie("notification", JSON.stringify(notificationList), 1);
} else {
    notificationList = JSON.parse(decodeURIComponent(currentNotifications));
    console.log("notification list: "+notificationList);
}

setInterval(function() {
    var xmlhttp, likesAndComments;
    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            likesAndComments = JSON.parse(this.responseText);
            if(likes == null || comments == null){
                likes = likesAndComments.likes;
                comments = likesAndComments.comments;
                console.log(likes);
                console.log(comments);
            } else {
                var newNotification = false;
                if(likesAndComments.likes.length > likes.length){
                    var newLikes = likesAndComments.likes.slice(likes.length);
                    for(var i=0; i<newLikes.length; i++){
                        var newLike = newLikes[i];
                        var notification = create_notification(newLike.Username, "ha messo mi piace al tuo post.");
                        notificationList.push(notification);
                        newNotification = true;
                    }
                }
                if(likesAndComments.comments.length > comments.length){
                    var newComments = likesAndComments.comments.slice(comments.length);
                    for(var i=0; i<newComments.length; i++){
                        var newComment = newComments[i];
                        var notification = create_notification(newComment.Username, 'ha commentato: "' + newComment.comment +'"');
                        notificationList.push(notification);
                        newNotification = true;
                    }
                }
                if(newNotification){
                    console.log("new notification : "+notificationList);
                    createCookie("notification", JSON.stringify(notificationList), 1);
                    $("#notification_icon_container").load(location.href +" #notification_icon_container");
                }
                likes = likesAndComments.likes;
                comments = likesAndComments.comments;
            }
        }
    };
    xmlhttp.open("GET", "notification.php", true);
    xmlhttp.send();
}, 1000);


document.getElementById("notification_icon").addEventListener("click", function(){
    delete_cookie("notification", "/");
});

document.getElementById("notifications").addEventListener('hidden.bs.modal', function () {
    $("#notification_icon_container").load(location.href +" #notification_icon_container");
});