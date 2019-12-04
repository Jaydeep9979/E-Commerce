<?php

    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 


//Include Google client library 
include_once 'src/Google_Client.php';
include_once 'src/contrib/Google_Oauth2Service.php';

/*
 * Configuration and setup Google API
 */
$clientId = '789485743088-jsa856dnk279r4kgi78mq0kbh3u9s8v3.apps.googleusercontent.com'; //Google client ID
$clientSecret = 'jIXgSmIM1uWxwZHuBPsR-CJZ'; //Google client secret
$redirectURL = 'http://mycouponzone.com/jaydeep/'; //Callback URL

//Call Google API
$gClient = new Google_Client();
$gClient->setApplicationName('Login to jaydeepwebapplication.com');
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectURL);

$google_oauthV2 = new Google_Oauth2Service($gClient);
?>