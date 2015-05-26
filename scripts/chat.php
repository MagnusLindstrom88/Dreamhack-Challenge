<?php
session_start();

if(isset($_SESSION['username'])) {
    $message = trim($_POST['message']);
    if(strlen($message) > 0) {
        $chatlog = fopen("../chatlog.html", "a");
        fwrite($chatlog, "<div>{$_SESSION['username']}: {$message}</div>");
        fclose($chatlog);
    }
}
else echo "failed";
