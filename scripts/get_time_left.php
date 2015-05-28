<?php
require_once 'init.php';

$ids = explode("-", $_GET['matches']);
$sqlString = "";
foreach($ids as $x) $sqlString .= "{$x},";
$sqlString = substr($sqlString, 0, -1);

$results = $db->query("SELECT played_at FROM matches WHERE id IN ({$sqlString})");
$returnString = "";
foreach($results as $row) $returnString .= "_".timeLeft($row['played_at']);
$returnString = substr($returnString, 1);

echo $returnString;

function timeLeft($played_at) {
    $seconds = strtotime($played_at) - time();
    $hours = floor($seconds / 3600);
    $seconds %= 3600;
    $minutes = floor($seconds / 60);
    if(strlen($minutes) === 1) $minutes = "0".$minutes;
    $seconds %= 60;
    if(strlen($seconds) === 1) $seconds = "0".$seconds;
    return "Time left: $hours:$minutes:$seconds";
}