<?php
require_once '../init.php';

$emailOrUsername = $_POST['emailorusername'];
$password = $_POST['password'];

$ps1 = $db->prepare("SELECT username, password FROM users WHERE email=?");
$ps2 = $db->prepare("SELECT username, password FROM users WHERE username=?");
$ps1->execute(array($emailOrUsername));
$ps2->execute(array($emailOrUsername));
if($ps1->rowCount() > 0) $data = $ps1->fetchAll(PDO::FETCH_ASSOC);
else $data = $ps2->fetchAll(PDO::FETCH_ASSOC);

//Check if the cleartext password matches the hashed one in the database.
if($data[0]['password'] === crypt($password, $data[0]['password']))
    $_SESSION['username'] = $data[0]['username'];