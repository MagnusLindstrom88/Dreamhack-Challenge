<?php
require_once 'init.php';

$datetime = $_GET['datetime'];
$chatlog = $db->prepare("SELECT * FROM chatlog WHERE created_at > ?");
$chatlog->execute(array($datetime));
$returnString = "";

if($chatlog->rowCount() > 0)
    foreach($chatlog as $row)
        $returnString .= $row['content'];

echo $returnString;