<?php
require_once 'init.php';
$member = $_SESSION['id'];
$matchen = $_POST["matchen"];
$team = $_POST["team"];

if(!isset($_SESSION['id'])) exit("x");

$ps = $db->prepare("SELECT * FROM bets WHERE user_id=? AND match_id=? AND team=?");
$ps->execute(array($member, $matchen, $team));	

if($ps->rowCount() != 0) echo ("a");
else echo("b");
?>
