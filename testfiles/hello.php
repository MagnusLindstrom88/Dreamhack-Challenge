<?php
$message = trim($_GET['message']);
if(strlen($message) > 0) {
    $chatlog = fopen("chatlog.txt", "a");
    fwrite($chatlog, "<div>{$_GET['username']}: {$message}</div>");
    fclose($chatlog);
}