<?php
require_once 'init.php';
if(isset($_SESSION['id'])) {
	$member = $_SESSION['id'];
	$matchen = $_POST["matchen"];
	$team = $_POST["team"];
	
	$ps = $db->prepare("SELECT * FROM bets WHERE user_id=? AND match_id=?");
	$ps->execute(array($member, $matchen));
	
	if($ps->rowCount() != 0) {
		$ps2 = $db->prepare("SELECT * FROM bets WHERE user_id=? AND match_id=? AND team=?");
		$ps2->execute(array($member, $matchen, $team));
		if($ps2->rowCount() != 0) {
			$sql = "DELETE FROM bets WHERE team=? AND user_id=? AND match_id=? ";
			$query = $db->prepare($sql);
			$query->execute(array($team,$member,$matchen));
			echo ("a");
		}
	}
	else {
		$sql = "INSERT INTO bets (team, user_id, match_id) Values (:team, :member, :matchen)";
		$query = $db->prepare($sql);
		$query->execute(array(
			":team" =>$team,
			":member"=>$member,
			":matchen"=>$matchen
		));
		echo ("c");
	}
}
else echo "x";