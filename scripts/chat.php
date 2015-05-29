<?php
require_once 'init.php';

if(isset($_SESSION['username'])) {
    $message = trim($_POST['message']);
    if(strlen($message) > 0) {
        $message = htmlspecialchars($message);
        $ps = $db->prepare("INSERT INTO chatlog(content, game) VALUES (?, ?)");
        $ps->execute(array("<div>{$_SESSION['username']}: {$message}</div>", $_POST['game']));
        echo $_POST['game'];
    }
}
else echo "failed";
