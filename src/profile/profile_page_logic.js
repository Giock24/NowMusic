document.querySelector(".follow_unfollow").addEventListener("click", function() {
    var xmlhttp, followEmail;
    followEmail = document.querySelector(".follow_unfollow").getAttribute("data");

    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
        }
    };
    xmlhttp.open("POST", "follow_unfollow.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); 
    xmlhttp.send("follow_email="+followEmail);

    setTimeout(function() {
        location.reload();
    },500);
});

