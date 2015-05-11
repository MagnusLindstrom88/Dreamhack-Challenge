<?php
require_once 'init.php';
if(isset($_POST['username'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm-password'];
    
    //Insert into database with a prepared statement in order eliminate any risk of SQL injection.
    $ps = $db->prepare('INSERT INTO users(username, email, password) VALUES (?, ?, ?)');
    $ps->execute(array($username, $email, $password));
    
    echo "Registration successful.";
}