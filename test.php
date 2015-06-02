

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
				AND users.id ='".$_SESSION['id']."'
				";
				
			$result = $conn->query($sql);
			
			if ($result->num_rows > 0) {
			    while($row = $result->fetch_assoc()) {
			       createBox();
			    }
			} else {
			    echo "0 results";
			}
			$conn->close();
			?> 

        </div>      	
  </div>
  <?php require_once 'template/footer.php'; 
  // echo "MatchID : " . $row['matchid']. " - UserID : " . $row['userid']. " - Game : " . $row['game']. "<br>";
  ?>
</body>
</html>

<?php
function createBox() {
        echo
        "
        <div class='col-md-3 col-sm-6'>
            <div class='{$matchBoxClass}' id='{$row['matchid']}'>
                <div class='match-header'>
                    <p>{$teams[0]['name']} VS {$teams[1]['name']}</p>
                </div>
                <div class='match-logos'>
                    <img class='team-logo' src='images/teamlogos/{$teams[0]['abbreviation']}.png' alt=\"{$teams[0]['name']}'s logotype.\"/>
                    <img class='versus' src='images/vs.png' alt='Versus.'/>
                    <img class='team-logo' src='images/teamlogos/{$teams[1]['abbreviation']}.png' alt=\"{$teams[1]['name']}'s logotype.\"/>
                </div>
                <button class='{$buttonClass0}' id='{$teams[0]['id']}' onclick='makeBet(this)' style='margin-right: 5px;'>Bet {$teams[0]['abbreviation']}</button>
                <button class='{$buttonClass1}' id='{$teams[1]['id']}' onclick='makeBet(this)' style='margin-left: 5px;'>Bet {$teams[1]['abbreviation']}</button>
                <p class='counter' style='margin-top: 10px;'>{$timeRemaining}</p>
            </div>
        </div>
        ";
}
?>
