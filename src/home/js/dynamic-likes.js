
let all_heart = document.getElementsByClassName("like");
//console.log(all_heart);

for (let i = 0; i < all_heart.length; i++) {
    all_heart[i].addEventListener("click", function() {
        //all_heart[i].setAttribute("class", "uil uil-heart-break");
        console.log(all_heart[i]);

        var xmlhttp, likesAndComments;
        xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
            }
        };
        xmlhttp.open("POST", "add_remove_likes.php", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); 
        xmlhttp.send("like_idpost="+all_heart[i].getAttribute("data"));

        //$("#post_like_icon").load(location.href +" #post_like_icon");
    });
}
