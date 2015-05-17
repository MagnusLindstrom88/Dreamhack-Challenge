<?php
/* Contains code to check if provided data is in the database. Used when logging in to check if the email and password exists.
 * Used when registering to check if the username and email exists. */
require_once '../init.php';

$email = $_POST['email'];

$ps = $db->prepare("SELECT * FROM users WHERE email=?");
$ps->execute(array($email));
if($ps->rowCount() > 0) {
    echo "email found";
    
    if($_POST['from'] === "login") {
    $password = $_POST['password'];
    $hashed_password = $ps->fetchAll(PDO::FETCH_ASSOC)[0]['password'];
    if($hashed_password === crypt($password, $hashed_password)) echo "password found";
    }
}

if($_POST['from'] === "registration") {
    $username = $_POST['username'];

    $ps = $db->prepare("SELECT * FROM users WHERE username=?");
    $ps->execute(array($username));
    if($ps->rowCount() > 0) echo "username found";
}