<?php

$hostname = "mysql.dsv.su.se";
$username = "sewa2700";
$password = "eequishusaiz";

try {
$dbh = new PDO("mysql:host=$hostname;dbname=sewa2700", $username, $password);
 }
	
catch(PDOException $e)
    {
    echo $e->getMessage();
    }
	
	$member = $_SESSION['username'];
	$matchen = $_POST["matchen"];
	$team = $_POST["team"];
	
	
	$ps = $dbh->prepare("SELECT * FROM bets WHERE username=? AND matchID=?");
    $ps->execute(array($member, $matchen));
		
	if($ps->rowCount() != 0) {
		
	$ps2 = $dbh->prepare("SELECT * FROM bets WHERE username=? AND M
						 matchID=? AND bettedTeam=?");
    $ps2->execute(array($member, $matchen, $team));
		
		if($ps2->rowCount() != 0) {
			$sql = "DELETE FROM bets WHERE bettedTeam=? AND username=? AND matchID=? ";
		$query = $dbh->prepare($sql);
		$query->execute(array($team,$member,$matchen));
		echo ("a");
		} 
			
	}
	
	 else  {
	$sql = "INSERT INTO bets (bettedTeam, username, matchID) Values (:team, :member, :matchen)";
    $query = $dbh->prepare($sql);
	$query->execute(array(
			":team" =>$team,
			":member"=>$member,
			":matchen"=>$matchen
					));
	
	echo ("c");
	}
?>
