<?php
require_once 'init.php';
if(isset($_SESSION['id'])) {
	$user = $_SESSION['id'];
	$match = $_POST["match"];
	$team = $_POST["team"];
	
	$ps = $db->prepare("SELECT * FROM bets WHERE user_id=? AND match_id=?");
	$ps->execute(array($user, $match));
	
	if($ps->rowCount() != 0) {
		$ps2 = $db->prepare("SELECT * FROM bets WHERE user_id=? AND match_id=? AND team_id=?");
		$ps2->execute(array($user, $match, $team));
		if($ps2->rowCount() != 0) {
			$sql = "DELETE FROM bets WHERE team_id=? AND user_id=? AND match_id=? ";
			$query = $db->prepare($sql);
			$query->execute(array($team,$user,$match));
			echo ("a");
		}
	}
	else {
		$sql = "INSERT INTO bets (team_id, user_id, match_id) Values (:team, :member, :match)";
		$query = $db->prepare($sql);
		$query->execute(array(
			":team" =>$team,
			":member"=>$user,
			":match"=>$match
		));
		echo ("c");
	}
}
else echo "x";