<?php
require_once 'init.php';

if(isset($_SESSION['username'])) {
    $message = trim($_POST['message']);
    if(strlen($message) > 0) {
        $message = htmlspecialchars($message);
        if(file_exists("images/profilepictures/{$_SESSION['id']}.jpg"))
            $profilePic = "<img src='images/profilepictures/{$_SESSION['id']}.jpg' style='width:20px;margin-right:2px;'>";
        
        $teamicon = "";
        if(strlen($_POST['bettedteam']) > 0)
            $teamicon = "<img src='images/teamlogos/{$_POST['bettedteam']}.png' style='width:20px;margin-right:2px;'>";
        
        $ps = $db->prepare("INSERT INTO chatlog(content, game) VALUES (?, ?)");
        $ps->execute(array("<div>{$profilePic}{$teamicon}{$_SESSION['username']}: {$message}</div>", $_POST['game']));
        echo $_POST['game'];
    }
}
else echo "failed";
