<?php
//Contains code to check if a username and/or email is already taken.

require_once '../init.php';

$username = $_POST['username'];
$email = $_POST['email'];
$returnString = "";

$ps = $db->prepare("SELECT * FROM users WHERE username=?");
$ps->execute(array($username));
if($ps->rowCount() > 0) $returnString .= "username taken";

$ps = $db->prepare("SELECT * FROM users WHERE email=?");
$ps->execute(array($email));
if($ps->rowCount() > 0) $returnString .= "email taken";

echo $returnString;