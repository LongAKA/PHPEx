<?php
    define('GOOGLE_CLIENT_ID', '686097428076-g7c9ofv1v92igb9hd65og2f58v4c46j8.apps.googleusercontent.com');
    define('GOOGLE_CLIENT_SECRET', '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');
    define('GOOGLE_OAUTH_SCOPE','https://www.googleapis.com/auth/drive');
    define('REDIRECT_URI','http://localhost:81/THSPNews/admin/code/googledrive/index.php');

    if(!session_id()) session_start();

    $googleOauthURL = 'https://accounts.google.com/o/oauth2/auth?scope='.urlencode(GOOGLE_OAUTH_SCOPE).'&redirect_uri='.REDIRECT_URI.'&response_type=code&client_id='.GOOGLE_CLIENT_ID.'&access_type=online';
?>