<?php
function generateBoxesAccount() {
    global $db;
    $match = $db->query("SELECT * FROM matches WHERE game=$game);
    foreach($matches as $row) {
        $teams = $db->query("SELECT * FROM bets WHERE user_id={$_SESSION['id']}")->fetchAll(PDO::FETCH_ASSOC);
        $buttonClass0 = "btn btn-info";
        $buttonClass1 = "btn btn-info";
        $matchBoxClass = "match-box upcoming";

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
        
        if($row['ongoing']) {
            $matchBoxClass .= "match-box";
            $buttonClass0 .= " disabled";
            $buttonClass1 .= " disabled";
        }
        
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
                <div class='match-header-account'>
                    <p>{$teams[0]['name']} VS {$teams[1]['name']}</p>
                </div>
                <div class='match-logos-account'>
                    <img class='team-logo-account' src='images/teamlogos/{$teams[0]['abbreviation']}.png' alt=\"{$teams[0]['name']}'s logotype.\"/>
                    <img class='versus-account' src='images/vs.png' alt='Versus.'/>
                    <img class='team-logo-account' src='images/teamlogos/{$teams[1]['abbreviation']}.png' alt=\"{$teams[1]['name']}'s logotype.\"/>
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
