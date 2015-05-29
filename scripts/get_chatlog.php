<?php
require_once 'init.php';

$chatlog = $db->prepare("SELECT * FROM chatlog WHERE created_at > ? AND game=?");
$chatlog->execute(array($_GET['datetime'], $_GET['game']));
$returnString = "";

if($chatlog->rowCount() > 0)
    foreach($chatlog as $row)
        $returnString .= $row['content'];

echo $returnString;