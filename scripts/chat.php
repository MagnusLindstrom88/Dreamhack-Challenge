<?php
require_once 'init.php';

if(isset($_SESSION['username'])) {
    $message = trim($_POST['message']);
    if(strlen($message) > 0)
        $db->exec("INSERT INTO chatlog(content) VALUES ('<div>{$_SESSION['username']}: {$message}</div>')");
}
else echo "failed";
