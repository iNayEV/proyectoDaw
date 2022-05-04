<?php
    require_once "settings.php";

    if(isset($_GET["code"])) {
        $token = $client->fetchAccessTokenWithAuthCode($_GET["code"]);
        $client->setAccessToken($token["access_token"]);

        $google_oauth = new Google_Service_Oauth2($client);
        $google_account_info = $google_oauth->userinfo->get();
        $email = $google_account_info->email;
        $givenName = $google_account_info->givenName;
        $familyName = $google_account_info->familyName;
        $picture = $google_account_info->picture;

    }