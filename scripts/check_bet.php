<?php
require_once 'init.php';
if(isset($_SESSION['id'])) {
	$member = $_SESSION['id'];
	$matchen = $_POST["matchen"];
	$team = $_POST["team"];
	
	$ps = $db->prepare("SELECT * FROM bets WHERE user_id=? AND match_id=? AND team=?");
	$ps->execute(array($member, $matchen, $team));	
	
	if($ps->rowCount() != 0) echo "a";
	else echo "b";
}