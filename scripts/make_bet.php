<?php
require_once 'init.php';
if(isset($_SESSION['id'])) {
	$user = $_SESSION['id'];
	$match = $_POST["match"];
	$team = $_POST["team"];
	
	$ps = $db->prepare("SELECT * FROM bets WHERE user_id=? AND match_id=?");
	$ps->execute(array($user, $match));
	
	if($ps->rowCount() != 0) {
		$ps = $db->prepare("SELECT * FROM bets WHERE user_id=? AND match_id=? AND team_id=?");
		$ps->execute(array($user, $match, $team));
		if($ps->rowCount() != 0) {
			$ps = $db->prepare("DELETE FROM bets WHERE team_id=? AND user_id=? AND match_id=?");
			$ps->execute(array($team, $user, $match));
			echo ("a");
		}
	}
	else {
		$ps = $db->prepare("INSERT INTO bets (team_id, user_id, match_id) Values (?, ?, ?)");
		$ps->execute(array($team, $user, $match));
		echo ("c");
	}
}
else echo "x";