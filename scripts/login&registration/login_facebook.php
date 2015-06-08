<?php
require_once '../init.php';
require __DIR__ . '/facebooksdk/autoload.php';

use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;

FacebookSession::setDefaultApplication('396517753863526', 'f228fa0a27270bc885447de9431fc055');
//FacebookSession::setDefaultApplication('397231723792129', '53512cfc5518e9ed45bb14921345a61a');  //Localhost

$helper = new FacebookRedirectLoginHelper('https://pvt.dsv.su.se/Group10/scripts/login&registration/login_facebook.php');
//$helper = new FacebookRedirectLoginHelper('http://localhost/dreamhack-challenge/scripts/login&registration/login_facebook.php');
try {$session = $helper->getSessionFromRedirect();}
catch(FacebookRequestException $ex) {/*When Facebook returns an error*/}
catch(Exception $ex) {/* When validation fails or other local issues*/}

if(isset($session)) {
    //Graph api request for user data.
    $request = new FacebookRequest($session, 'GET', '/me');
    $response = $request->execute();
    $graphObject = $response->getGraphObject();
    $_SESSION['id'] = $graphObject->getProperty('id');  //Get Facebook ID.
    $_SESSION['username'] = $graphObject->getProperty('name');  //Get Facebook full name.
    
    //Insert the user into the database if they're not already there.
    $ps = $db->prepare("SELECT * FROM users WHERE id=?");
    $ps->execute(array($_SESSION['id']));
    if($ps->rowCount() === 0) {
        $ps = $db->prepare("INSERT INTO users (id, username) VALUES (?, ?)");
        $ps->execute(array($_SESSION['id'], $_SESSION['username']));
    }
    
    header("Location: ../../index.php");
}
else {
    $loginUrl = $helper->getLoginUrl();
    header("Location: " . $loginUrl);
}