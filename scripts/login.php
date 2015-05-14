<?php
require_once 'init.php';

$email = $_POST['email'];
$password = $_POST['password'];

$ps = $db->prepare("SELECT username, password FROM users WHERE email=?");
$ps->execute(array($email));
$data = $ps->fetchAll(PDO::FETCH_NUM);

//Check if the cleartext password matches the hashed one in the database.
if(password_verify($password, $data[0][1]))
    $_SESSION['username'] = $data[0][0];

header('location: ../index.php');