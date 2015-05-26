<?php
session_start();
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
	$member = $_SESSION['id'];
	$matchen = $_POST["matchen"];
	$team = $_POST["team"];
	
	//echo($member);
	//echo($matchen);
	//echo($team);
	
	if(!isset($_SESSION['id'])){
		exit("x");
		}
	
	$ps = $dbh->prepare("SELECT * FROM bets WHERE user_id=? AND match_id=? AND team=?");
    $ps->execute(array($member, $matchen, $team));	
	
	if($ps->rowCount() != 0) {
	
		echo ("a");
		}
		
	 else  {
	echo("b");
	}
?>
