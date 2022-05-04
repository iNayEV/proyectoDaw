<?php
    require_once "vendor/autoload.php";

    $clientID = "708140101063-n9b4i1ve01i3k64au33tbbjo0etpm30v.apps.googleusercontent.com";
    $clientSecret = "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";
    $redirectUri = "http://localhost/MP12/test.php";

    $client = new Google_Client();
    $client->setClientId($clientID);
    $client->setClientSecret($clientSecret);
    $client->setRedirectUri($redirectUri);
    $client->addScope("email");
    $client->addScope("profile");