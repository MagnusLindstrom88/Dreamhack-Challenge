<?php
require_once '../init.php';

$email = $_POST['email'];
$password = $_POST['password'];

$ps = $db->prepare("SELECT username, password FROM users WHERE email=?");
$ps->execute(array($email));
$data = $ps->fetchAll(PDO::FETCH_ASSOC);

//Check if the cleartext password matches the hashed one in the database.
if($data[0]['password'] === crypt($password, $data[0]['password']))
    $_SESSION['username'] = $data[0]['username'];