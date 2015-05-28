<?php
require_once 'init.php';

$datetime = $_GET['datetime'];
$chatlog = $db->query("SELECT * FROM chatlog WHERE created_at > '{$datetime}'");
$returnString = "";

if($chatlog->rowCount() > 0)
    foreach($chatlog as $row)
        $returnString .= $row['content'];

echo $returnString;