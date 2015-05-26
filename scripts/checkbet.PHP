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
	$matchen = $_POST["matchen"];
	$member = $_SESSION["id"];
	$team = $_POST["team"];
	
	if(!isset($_SESSION['id'])){
		exit("x");
		}
	
	$ps = $dbh->prepare("SELECT * FROM bets WHERE user_ID=? AND match_ID=? AND team=?");
    $ps->execute(array($member, $matchen));	
	
	if($ps->rowCount() != 0) {
	
		echo ("a");
		}
		
	 else  {
	echo("b");
	}
?>