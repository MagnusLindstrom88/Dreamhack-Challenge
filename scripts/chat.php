<?php
session_start();

if(isset($_SESSION['username'])) {
    $message = trim($_POST['message']);
    if(strlen($message) > 0) {
        $fh = fopen("http://www.avetian.se/skola/chat.php?username={$_SESSION['username']}&message={$message}", 'r');
        fclose($fh);
    }
        //header("location: http://www.avetian.se/skola/chat.php?username={$_SESSION['username']}&message={$message}");
}
else echo "failed";
