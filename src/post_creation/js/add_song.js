import APIController from './spotify_controller.js';

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
    
    // Create the form element
    let form = document.createElement('form');
    form.setAttribute('action', 'post_add_image.php');
    form.setAttribute('method', 'post');

    // Create input label
    let labelInput = document.createElement('label');
    labelInput.setAttribute('for', 'songId_'+song.id);
    labelInput.setAttribute('hidden', '');
    labelInput.innerHTML = 'Song ID: ';

    // Create the input element
    let input = document.createElement('input');
    input.setAttribute('id', 'songId_'+song.id);
    input.setAttribute('type', 'hidden');
    input.setAttribute('name', 'song_id');
    input.setAttribute('value', song.id);
    
    // Create input label
    let labelSubmit = document.createElement('label');
    labelSubmit.setAttribute('for', 'songId_'+song.id);
    labelSubmit.setAttribute('hidden', '');
    labelSubmit.innerHTML = 'Song ID: ';

    // Create the submit button
    let submit = document.createElement('input');
    submit.setAttribute('type', 'addSong_'+song.id);
    submit.setAttribute('type', 'submit');
    submit.setAttribute('value', 'Add Song');
    submit.setAttribute('class', 'btn');
    submit.setAttribute('style', 'width:100%');

    form.appendChild(labelInput);
    form.appendChild(input);
    form.appendChild(labelSubmit);
    form.appendChild(submit);

    // Append the iframe and button to the main article element
    songElement.appendChild(iframe);
    songElement.appendChild(form);

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