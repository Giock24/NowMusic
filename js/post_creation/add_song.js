import APIController from './spotify_controller.js';

const _addSongToPost = (song) => {
    console.log(song);
}

const _createSongElement = (song) => {
    // Create the main article element
    let songElement = document.createElement('li');
    songElement.setAttribute('class', 'mb-3');

    // Create the iframe element
    let iframe = document.createElement('iframe');
    iframe.setAttribute('style', 'border-radius:12px');
    iframe.setAttribute('src', `https://open.spotify.com/embed/track/${song.id}?utm_source=generator&theme=0`);
    iframe.setAttribute('width', '100%');
    iframe.setAttribute('height', '152');
    iframe.setAttribute('frameBorder', '0');
    iframe.setAttribute('allowfullscreen', '');
    iframe.setAttribute('allow', 'autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture');
    iframe.setAttribute('loading', 'lazy');

    // Create the button element
    let button = document.createElement('button');
    button.setAttribute('id', 'add_song_button');
    button.setAttribute('type', 'button');
    button.setAttribute('class', 'align-content-center');
    button.innerHTML = 'Add to Post <i class="bi bi-plus"></i>';
    button.onclick = () => _addSongToPost(song);

    // Append the iframe and button to the main article element
    songElement.appendChild(iframe);
    songElement.appendChild(button);

    return songElement;
}

// Call to Spotify API to search the songs
document.getElementById("search_song").onsubmit = function(event) {
    event.preventDefault();
    var songName = event.target.SearchSong.value;
    document.getElementById("search_results").innerHTML = "";
    APIController.getToken().then(token => {
        APIController.searchTracks(token,songName).then(tracks => {
            tracks.forEach(track => {
                document.getElementById("search_results").appendChild(_createSongElement(track));
            });
        });
    });
    return false;
};
