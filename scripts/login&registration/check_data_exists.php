<?php
/* Contains code to check if provided data is in the database. Used when logging in to check if the email and password exists.
 * Used when registering to check if the username and email exists. */
require_once '../init.php';

//Code used for login validation.
if($_POST['from'] === "login") {
    $emailOrUsername = $_POST['emailorusername'];
    $ps1 = $db->prepare("SELECT * FROM users WHERE email=?");
    $ps2 = $db->prepare("SELECT * FROM users WHERE username=?");
    $ps1->execute(array($emailOrUsername));
    $ps2->execute(array($emailOrUsername));
    if($ps1->rowCount() > 0 || $ps2->rowCount() > 0) {
        echo "email or username found";
        $password = $_POST['password'];
        if($ps1->rowCount() > 0) $hashed_password = $ps1->fetchAll(PDO::FETCH_ASSOC)[0]['password'];
        else $hashed_password = $ps2->fetchAll(PDO::FETCH_ASSOC)[0]['password'];
        if($hashed_password === crypt($password, $hashed_password)) echo "password found";
    }
}

//Code used for registration validation.
else if($_POST['from'] === "registration") {
    $email = $_POST['email'];
    $username = $_POST['username'];
    
    $ps1 = $db->prepare("SELECT * FROM users WHERE email=?");
    $ps2 = $db->prepare("SELECT * FROM users WHERE username=?");
    $ps1->execute(array($email));
    $ps2->execute(array($username));
    if($ps1->rowCount() > 0) echo "email found";
    if($ps2->rowCount() > 0) echo "username found";
}