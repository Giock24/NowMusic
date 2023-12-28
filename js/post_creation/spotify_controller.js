import {SPOTIFY_CLIENT_ID, SPOTIFY_CLIENT_SECRET } from '../../config.js' 

const APIController = (function() {

    const clientId = SPOTIFY_CLIENT_ID;
    const clientSecret = SPOTIFY_CLIENT_SECRET;

    const _getToken = async () => {
        const result = await fetch('https://accounts.spotify.com/api/token', {
            method: 'POST',
            headers: {
                'Content-Type' : 'application/x-www-form-urlencoded', 
                'Authorization' : 'Basic ' + btoa(clientId + ':' + clientSecret)
            },
            body: 'grant_type=client_credentials'
        });
        const data = await result.json();
        return data.access_token;
    }

    const _searchTracks = async (token, songName) => {
        var query = songName.replace(" ", "+");
        const limit = 10;
        const result = await fetch(`https://api.spotify.com/v1/search?q=${query}&type=track&limit=${limit}`, {
            method: 'GET',
            headers: { 'Authorization' : 'Bearer ' + token}
        });
        const data = await result.json();
        return data.tracks.items;
    }

    return {
        getToken() {
            return _getToken();
        },
        searchTracks(token, songName) {
            return _searchTracks(token, songName);
        },
    }
}());

export default APIController;