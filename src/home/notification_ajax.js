function create_notification(user, message){
    console.log("create notification");
    var notification = {
        user: user,
        message: message
    }
    return JSON.stringify(notification);
}

function createCookie(name, value, days) {
    let expires;
    if (days) {
        let date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toGMTString();
    }
    else {
        expires = "";
    }
    document.cookie = encodeURIComponent(name) + "=" +
    encodeURIComponent(value) + expires + "; path=/";
}

function getCookie(name) {
    const value = `; ${document.cookie}`;
    const parts = value.split(`; ${name}=`);
    if (parts.length === 2) return parts.pop().split(';').shift();
  }


var likes=null, comments=null;
var notificationList = [];
var currentNotifications = getCookie("notification")
console.log(currentNotifications);
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
                    likes = likesAndComments.likes;
                    for(var i=0; i<newLikes.length; i++){
                        var newLike = newLikes[i];
                        var notification = create_notification(newLike.user, "ha messo mi piace al tuo post.");
                        notificationList.push(notification);
                        newNotification = true;
                    }
                }
                if(likesAndComments.comments.length > comments.length){
                    var newComments = likesAndComments.comments.slice(comments.length);
                    comments = likesAndComments.comments;
                    for(var i=0; i<newComments.length; i++){
                        var newComment = newComments[i];
                        var notification = create_notification(newComment.user, 'ha commentato: "' + newComment.comment +'"');
                        notificationList.push(notification);
                        newNotification = true;
                    }
                }
                if(newNotification){
                    console.log("new notification : "+notificationList);
                    createCookie("notification", JSON.stringify(notificationList), 1);
                    location.reload();
                }
            }
        }
    };
    xmlhttp.open("GET", "notification.php", true);
    xmlhttp.send();
}, 1000);



/* 
var x = ["1","2"];
var y = JSON.stringify(x);

createCookie("notification", y, 1);

console.log("COOKIE:  "+document.cookie);

console.log("COOKIE NOTIFICATION:  "+decodeURIComponent(getCookie("notification")));
*/