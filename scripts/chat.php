<?php
session_start();

if(isset($_SESSION['username'])) {
    $message = trim($_POST['message']);
    if(strlen($message) > 0)
        header("location: http://www.avetian.se/skola/chat.php?username={$_SESSION['username']}&message={$message}") or die("I am a shit server.");
}
else echo "failed";
