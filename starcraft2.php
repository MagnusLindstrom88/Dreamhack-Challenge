<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once 'template/head.php'; ?>
    <style>
        #section-image-container {
            background-color: #000000;
        }
    </style>
</head>
<body>
    <div id="wrapper">
        <?php require_once 'template/header&navbar.php'; ?>
        
        <div id="section-image-container">
            <img id="section-logo" src="images/Starcraft2-logo.jpg" alt="Starcraft 2 logotype."/>
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
                        <a class="navbar-brand">Starcraft II</a>
                    </div>
        
                    <!--The menu fields. Will be collapsed on small screens.-->
                    <div class="collapse navbar-collapse" id="gameMenuFields">
                        <!--Fields on the left.-->
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="#">Matches</a></li>
                            <li><a href="stream.php">Stream</a></li>
                            <li><a href="#">Something</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
            
            <div class="container">
                <h2>Upcoming Matches</h2>
                <p>These matches are currently open for betting.</p>
                <div class="row match-row">
                    <?php
                    //Generate a box for each upcoming match for this game in the database.
                    $matches = $db->query("SELECT * FROM matches WHERE winner='undecided' AND game='SC2'");
                    foreach($matches as $row) {
                        $teams = $db->query("SELECT * FROM teams WHERE id={$row['team0']} OR id={$row['team1']}")->fetchAll(PDO::FETCH_ASSOC);
                        echo
                        "
                        <div class='col-md-3 col-sm-6'>
                            <div class='match-block' id='{$row['id']}'>
                                <div class='match-header'>
                                    <h4>Quarter-Finals</h4>
                                    <p>{$teams[0]['name']} VS {$teams[1]['name']}</p>
                                </div>
                                <div class='match-logos'>
                                    <img class='team-logo' src='images/teamlogos/{$teams[0]['abbreviation']}.png' alt=\"{$teams[0]['name']}'s logotype.\"/>
                                    <img class='versus' src='images/vs.png' alt='Versus.'/>
                                    <img class='team-logo' src='images/teamlogos/{$teams[1]['abbreviation']}.png' alt=\"{$teams[1]['name']}'s logotype.\"/>
                                </div>
                                <button class='btn btn-primary' style='margin-right: 5px;'>Bet {$teams[0]['abbreviation']}</button>
                                <button class='btn btn-primary' style='margin-left: 5px;'>Bet {$teams[1]['abbreviation']}</button>
                                <p style='margin-top: 10px;'>16:30 CET, Time left: 4:23:43</p>
                            </div>
                        </div>
                        ";
                    }
                    ?>
                </div>
                <h2 style="margin-top: 30px;">Bracket</h2>
                <p>Proin dictum, tortor at porta malesuada, enim nulla maximus felis, ornare eleifend mauris tellus et dui.</p>
                <div class="row" style="margin-bottom: 30px;">
                    <div class="col-md-4">
                        <p>Quarter</p>
                        <button class="btn btn-lg btn-success btn-block">Kvarts-match</button>
                        <button class="btn btn-lg btn-success btn-block">Kvarts-match</button>
                        <button class="btn btn-lg btn-success btn-block">Kvarts-match</button>
                        <button class="btn btn-lg btn-success btn-block">Kvarts-match</button>
                        
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
        
        <?php require_once 'template/footer.php'; ?>
    </div>
</body>
</html>
