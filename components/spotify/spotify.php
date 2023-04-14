<script>
const accessToken = '<?php echo isset($_COOKIE['spotify_token']) ? $_COOKIE['spotify_token'] : '' ?>';
var title = "";
var artist = "";

function UpdateMusicData(){
    const url = 'https://api.spotify.com/v1/me/player/';
    const method = 'GET';
    fetch(url, {
        method: method,
        headers: {
            'Authorization': 'Bearer ' + accessToken,
            'Content-Type': 'application/json'
        },
        })
        .then(response => response.json())
        .then(data => {
            title = data.item.name;
            artist = data.item.artists[0].name;
            cover = data.item.album.images[0].url;
            document.getElementById('info').innerHTML = "<span class='song-title'>" + title + "</span>" + artist;
            document.getElementById('cover').innerHTML = "<img width='100%' src='" + cover + "' alt='cover'>";
        })
        .catch(error => {
            console.error(error);
    });
}

function playSwitch() {
    const url = 'https://api.spotify.com/v1/me/player/';
    const method = 'GET';
    fetch(url, {
        method: method,
        headers: {
            'Authorization': 'Bearer ' + accessToken,
            'Content-Type': 'application/json'
        },
        })
        .then(response => response.json())
        .then(data => {
            if (data.is_playing) {
                pauseMusic(data.device.id);
            } else {
                playMusic(data.device.id);
            }
        })
        .catch(error => {
            console.error(error);
    });
}

function playMusic(device_id) {
    const url = 'https://api.spotify.com/v1/me/player/play';
    const method = 'PUT';
    const body = {
        device_ids: [device_id]
    };
    fetch(url, {
        method: method,
        headers: {
            'Authorization': 'Bearer ' + accessToken,
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(body)
        })
        .catch(error => {
            console.error(error);
    });
}

function pauseMusic(device_id) {
    const url = 'https://api.spotify.com/v1/me/player/pause';
    const method = 'PUT';
    const body = {
        device_ids: [device_id]
    };
    fetch(url, {
        method: method,
        headers: {
            'Authorization': 'Bearer ' + accessToken,
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(body)
        })
        .catch(error => {
            console.error(error);
    });
}

function skipForward() {
    const url = 'https://api.spotify.com/v1/me/player/next';
    const method = 'POST';
    fetch(url, {
        method: method,
        headers: {
            'Authorization': 'Bearer ' + accessToken,
            'Content-Type': 'application/json'
        },
        })
        .catch(error => {
            console.error(error);
    });
}
function skipPrevious() {
    const url = 'https://api.spotify.com/v1/me/player/previous';
    const method = 'POST';
    fetch(url, {
        method: method,
        headers: {
            'Authorization': 'Bearer ' + accessToken,
            'Content-Type': 'application/json'
        },
        })
        .catch(error => {
            console.error(error);
    });
}

function redirectToAuthorizePage() {
    window.location.href = 'components/spotify/authorize.php';
}

// add event listeners to button
const playButton = document.getElementById('play-pause');
const nextButton = document.getElementById('next');
const previousButton = document.getElementById('previous');
if (accessToken) {
    playButton.addEventListener('click', playSwitch);
    nextButton.addEventListener('click', skipForward);
    previousButton.addEventListener('click', skipPrevious);
    setInterval(UpdateMusicData, 2000);
} else {
    playButton.addEventListener('click', redirectToAuthorizePage);
}
</script>