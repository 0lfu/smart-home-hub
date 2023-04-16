<?php
require_once '../../credentials.php';
session_start();
if (isset($_GET['access_token'])) {
    setcookie('spotify_token', $_GET['access_token'], time() + (3600), "/");
    header('location: ../../index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authorizing...</title>
    <script>
        const hash = window.location.hash.substr(1);
        const params = new URLSearchParams(hash);
        const accessToken = params.get('access_token');
        if(accessToken){
            window.location.href='authorize.php?access_token='+accessToken;
        }
        else{
            const CLIENT_ID = "<?php echo $spotify['client_id']; ?>";
            console.log(CLIENT_ID);
            const REDIRECT_URI = "<?php echo $spotify['redirect']; ?>";
            console.log(REDIRECT_URI);
            const scopes = ['user-read-playback-state', 'user-modify-playback-state'];
            const url = `https://accounts.spotify.com/authorize?response_type=token&client_id=${CLIENT_ID}&redirect_uri=${encodeURIComponent(REDIRECT_URI)}&scope=${encodeURIComponent(scopes.join(' '))}`;
            window.location.href = url;
        }
    </script>
</head>
<body>
</body>
</html>