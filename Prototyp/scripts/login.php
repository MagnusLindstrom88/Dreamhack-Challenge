<?php
require_once 'init.php';

$email = $_POST['email'];
$password = $_POST['password'];

$ps = $db->prepare("SELECT * FROM users WHERE email=? AND password=?");
$ps->execute(array($email, $password));

if($ps->rowCount() == 1)
    $_SESSION['username'] = $ps->fetchAll(PDO::FETCH_NUM)[0][1];
header('location: ../index.php');