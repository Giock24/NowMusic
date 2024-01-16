var likes=null, comments=null;
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
                if(likesAndComments.likes.length > likes.length){
                    var newLikes = likesAndComments.likes.slice(likes.length);
                    likes = likesAndComments.likes;
                    for(var i=0; i<newLikes.length; i++){
                        var newLike = newLikes[i];
                        create_notification(newLike.user, "ha messo mi piace al tuo post.");
                    }
                }
                if(likesAndComments.comments.length > comments.length){
                    var newComments = likesAndComments.comments.slice(comments.length);
                    comments = likesAndComments.comments;
                    for(var i=0; i<newComments.length; i++){
                        var newComment = newComments[i];
                        create_notification(newComment.user, 'ha commentato: "' + newComment.comment +'"');
                    }
                }
            }
        }
    };
    xmlhttp.open("GET", "notification.php", true);
    xmlhttp.send();
}, 1000);


function create_notification($user, $message){
    console.log("create notification");
    var notification = document.createElement("div");
    notification.className = "alert alert-success fixed-bottom mh-4";
    notification.role = "alert";
    notification.innerHTML = $message;
    document.body.appendChild(notification);
}