<?php
session_start();


    $message = $_POST['message'];
 
        $chatlog = fopen("../chatlog.html", "a");
        fwrite($chatlog, "<div>{$_SESSION['username']}: {$message}</div>");
        fclose($chatlog);
 
