

<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once 'template/head.php'; ?>
    <?php if(!isset($_SESSION['id'])) header("location: index.php"); ?>
    <style>
        #edit-account-modal {color: black;}
    </style>
</head>
<body>
    <?php require_once 'template/header&navbar.php'; ?>
    <div id="wrapper">
	<div class="container">
			<?php
			$servername = "mysql.dsv.su.se";
			$username = "sewa2700";
			$password = "eequishusaiz";
			$dbname = "sewa2700";
			
			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conn->connect_error) {
			    die("Connection failed: " . $conn->connect_error);
			}
			
			$sql = "SELECT users.id AS userid, matches.id AS matchid, matches.game AS game
				FROM matches, bets, users
				WHERE matches.id = bets.match_id
				AND bets.user_id = users.id
				AND matches.game = 'CS:GO'
				AND users.id ='$_SESSION['id']
				";
				
			$result = $conn->query($sql);
			
			if ($result->num_rows > 0) {
			    while($row = $result->fetch_assoc()) {
			        echo "MatchID : " . $row['matchid']. " - UserID : " . $row['userid']. " - Game : " . $row['game']. "<br>";
			    }
			} else {
			    echo "0 results";
			}
			$conn->close();
			?> 

        </div>      	
  </div>
  <?php require_once 'template/footer.php'; ?>
</body>
</html>

