function addComment(){
    let input = document.getElementById("your-comment");

    console.log("hello");

    /*
    let xmlhttp, likesCommentsFollowers;
    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            likesCommentsFollowers = JSON.parse(this.responseText);
            console.log(this.responseText);
            //$("#commentsList").load(location.href+" #commentsList") 
        }
    };
    xmlhttp.open("GET", "./comments_logic.php?yourComment=helloThere", true);
    xmlhttp.send();
    */
    
    /*
    $.post("demo_test_post.asp",
      {
        yourComment: "Donald Duck",
      },
      function(data,status){
        alert("Data: " + data + "\nStatus: " + status);
      }
      );
    */
}