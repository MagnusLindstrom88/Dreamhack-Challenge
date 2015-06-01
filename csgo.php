<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once 'template/head.php'; ?>
    <style>
        #section-image-container {
            background-image: url(images/csgobackground.jpg);
        }
    </style>
</head>
<body>
    <div id="wrapper">
        <?php require_once 'template/header&navbar.php'; ?>
        
        <div id="section-image-container">
            <img id="section-logo" src="images/csgologo.png" alt="Counter Strike: Global Offensive logotype."/>
        </div>
        
        <!--Content columns.-->
        <div id="content">
            <nav id="navbar" class="navbar navbar-default">
                <div class="container">
                    <!--The toggle button for collapsed menu.-->
                    <button class="navbar-toggle" data-toggle="collapse" data-target="#gameMenuFields">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!--The brand on the leftmost side.-->
                    <div class="navbar-header">
                        <a class="navbar-brand">CS:GO</a>
                    </div>
        
                    <!--The menu fields. Will be collapsed on small screens.-->
                    <div class="collapse navbar-collapse" id="gameMenuFields">
                        <!--Fields on the left.-->
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="#">Matches</a></li>
                            <li><a href="stream.php?game=CS:GO">Stream</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
            
            <div class="container">
                <h2>Upcoming Matches</h2>
                <p>These matches will be played next.</p>
                <div class="row match-row">
                    <?php generateBoxes(); ?>
                </div>
                <h2 style="margin-top: 30px;">Contest Overview</h2>
                <p>Complete match bracket.</p>
                <div class="row" style="margin-bottom: 30px;">
                    <div class="col-md-4">
                        <p><b>Quarter</b></p>
                        <button class="btn btn-lg btn-primary btn-block">Kvarts-match</button>
                        <button class="btn btn-lg btn-primary btn-block">Kvarts-match</button>
                        <button class="btn btn-lg btn-primary btn-block">Kvarts-match</button>
                        <button class="btn btn-lg btn-primary btn-block">Kvarts-match</button>
                        
                    </div>
                    <div class="col-md-4">
                        <p>Semi</p>
                        
                        <button class="btn btn-lg btn-warning btn-block">Semi-match</button>
                        <button class="btn btn-lg btn-warning btn-block">Semi-match</button>
                       
                    </div>
                    <div class="col-md-4">
                        <p>Final</p>
                        <button class="btn btn-lg btn-danger btn-block">Final-match</button>
                    </div>
                </div>
            </div>
        </div>
        
        <?php require_once 'template/footer.php'; ?>
    </div>
</body>

<!-- Updates the time left every second. -->
<script>
    setInterval(updateCounters, 1000);
    function updateCounters() {
        var matchBoxes = $(".upcoming");
        queryString = "";
        matchBoxes.each(function() {
            queryString += "-"+this.getAttribute("id");
        });
        queryString = queryString.slice(1);
        
        var xmlHttp = new XMLHttpRequest();
        xmlHttp.onload = function() {
            var updatedCounters = xmlHttp.responseText.split("_");
            var counter = 0;
            matchBoxes.each(function() {
                this.querySelector(".counter").innerHTML = updatedCounters[counter];
                counter++;
            });
        }
        xmlHttp.open("GET", "scripts/get_time_left.php?matches="+queryString);
        xmlHttp.send();
    }
</script>
</html>

<?php
//Generate a box for each upcoming match for this game in the database.
function generateBoxes() {
    global $db;
    $matches = $db->query("SELECT * FROM matches WHERE winner='undecided' AND game='CS:GO'");
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
