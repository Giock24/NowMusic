
let all_heart = document.getElementsByClassName("like");
let all_like_count = document.getElementsByClassName("likes-count");
//console.log(all_heart);
//console.log(all_like_count[0].innerHTML);

for (let i = 0; i < all_heart.length; i++) {
    all_heart[i].addEventListener("click", function() {
        //all_heart[i].setAttribute("class", "uil uil-heart-break");
        //console.log(all_heart[i]);
        
        let xmlhttp, post_id;
        post_id = all_heart[i].getAttribute("data");

        if (all_heart[i].getAttribute("class") === "like uil uil-heart-break") {
            // add like
            all_heart[i].setAttribute("class", "like uil uil-heart");
            all_like_count[i].innerHTML = parseInt(all_like_count[i].innerHTML) + 1;
        } else {
            // remove like
            all_heart[i].setAttribute("class", "like uil uil-heart-break");
            all_like_count[i].innerHTML = parseInt(all_like_count[i].innerHTML) - 1;
        }
        
        xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
            }
        };

        xmlhttp.open("POST", "add_remove_likes.php", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); 
        xmlhttp.send("like_idpost="+post_id);

        let elementID = "post_"+post_id;
        console.log(location.href +" "+elementID);
        /*
        setTimeout(function() {
            location.reload();
        }, 200);
        */
    });
}
