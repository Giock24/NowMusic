import APIController from './spotify_controller.js';

document.getElementById("add_song_button").onclick = function() {
    console.log("Token:")
    APIController.getToken().then(token => console.log(token));
};

