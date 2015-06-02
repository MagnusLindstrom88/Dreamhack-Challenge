

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
			       createBox("SC2");
			    }
			} else {
			    echo "0 results";
			}
			$conn->close();
			?> 

        </div>   
          <?php require_once 'template/footer.php'; 
    // echo "MatchID : " . $row['matchid']. " - UserID : " . $row['userid']. " - Game : " . $row['game']. "<br>";
  ?>
  </div>


</body>

</html>

<?php
function createBox($game) {
    global $db;
    $matches = $db->query("SELECT * FROM matches WHERE winner='undecided' AND game='".$game."'");
    foreach($matches as $row) {
        $teams = $db->query("SELECT * FROM teams WHERE id={$row['team0']} OR id={$row['team1']}")->fetchAll(PDO::FETCH_ASSOC);
        $buttonClass0 = "btn btn-info";
        $buttonClass1 = "btn btn-info";
        $matchBoxClass = "match-box upcoming";
        
        //Checks if the user already has a bet for this match and in that case colors the appropriate button.
        if(isset($_SESSION['id'])) {
            $bet = $db->query("SELECT * FROM bets WHERE user_id={$_SESSION['id']} AND match_id={$row['id']} AND (team_id={$teams[0]['id']} OR team_id={$teams[1]['id']})");
        
            if($bet->rowCount() > 0) {
                $bet = $bet->fetchAll(PDO::FETCH_ASSOC);
                if($bet[0]['team_id'] === $teams[0]['id'])
                    $buttonClass0 = str_replace("btn-info", "btn-success", $buttonClass0);
                else if($bet[0]['team_id'] === $teams[1]['id'])
                    $buttonClass1 = str_replace("btn-info", "btn-success", $buttonClass1);
            }
        }
        
        //Style buttons as disabled if the match in ongoing.
        if($row['ongoing']) {
            $matchBoxClass .= "match-box";
            $buttonClass0 .= " disabled";
            $buttonClass1 .= " disabled";
        }
        
        //Calculate time remaining if not ongoing.
        $timeClass = "";
        if(!$row['ongoing']) {
            $seconds = strtotime($row['played_at']) - time();
            $hours = floor($seconds / 3600);
            $seconds %= 3600;
            $minutes = floor($seconds / 60);
            if(strlen($minutes) === 1) $minutes = "0".$minutes;
            $seconds %= 60;
            if(strlen($seconds) === 1) $seconds = "0".$seconds;
            $timeRemaining = "Time left: $hours:$minutes:$seconds";
        }
        else $timeRemaining = "<strong>Ongoing</strong>";
        echo
        "
        <div class='col-md-3 col-sm-6'>
            <div class='{$matchBoxClass}' id='{$row['id']}'>
                <div class='match-header'>
                    <h4>Quarter-Finals</h4>
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
}
?>
