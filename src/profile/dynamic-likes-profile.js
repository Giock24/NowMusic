
let all_heart = document.getElementsByClassName("like");
//console.log(all_heart);

for (let i = 0; i < all_heart.length; i++) {
    all_heart[i].addEventListener("click", function() {
        //all_heart[i].setAttribute("class", "uil uil-heart-break");
        console.log(all_heart[i]);
        //console.log("OLAAAA MI");

        var xmlhttp, post_id;
        post_id = all_heart[i].getAttribute("data");

        xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
            }
        };

        xmlhttp.open("POST", "add_remove_likes.php", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); 
        xmlhttp.send("like_idpost="+post_id);

        var elementID = "post_"+post_id;
        console.log(location.href +" "+elementID);

        //after 1 second reload the page
        location.reload();
        /*
                setTimeout(function() {
            location.reload();
        }, 1000);
        */

        

    });
}