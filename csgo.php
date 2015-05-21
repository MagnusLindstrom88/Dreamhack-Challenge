<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once 'template/head.php'; ?>
    <style>
        #section-image-container {
            background-image: url(images/csgobackground.jpg);
            background-size: 100% 100%;
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
                    
                    <div class="col-md-3">
                        <div class="match-block">
                            <div class="match-header">
                                <h4>Quarter-Finals</h4>
                                <p>HellRaisers VS Ninjas In Pyjamas</p>
                            </div>
                            <div class="match-logos">
                                <img class="team-logo" src="images/teamlogos/csHellraisers.png" alt="Hellraisers's logotype."/>
                                <img class="versus" src="images/vs.png" alt="Versus."/>
                                <img class="team-logo" src="images/teamlogos/csNIP.png" alt="Ninjas In Pyjamas's logotype."/>
                            </div>
                            <button class="btn btn-primary" style="margin-right: 5px;">Bet HR</button>
                            <button class="btn btn-primary" style="margin-left: 5px;">Bet NiP</button>
                            <p style="margin-top: 10px;">16:30 CET, Time left: 4:23:43</p>
                        </div>
                    </div>
                    
                    <div class="col-md-3">
                        <div class="match-block">
                            <div class="match-header">
                                <h4>Quarter-Finals</h4>
                                <p>Virtus.Pro VS Evil Geniuses</p>
                            </div>
                            <div class="match-logos">
                                <img class="team-logo" src="images/teamlogos/csVirtusPro.png" alt="Virtus.Pro's logotype."/>
                                <img class="versus" src="images/vs.png" alt="Versus."/>
                                <img class="team-logo" src="images/teamlogos/teamevilgeniuses.png" alt="PENTA Sport's logotype."/>
                            </div>
                            <button class="btn btn-primary" style="margin-right: 5px;">Bet VP</button>
                            <button class="btn btn-primary" style="margin-left: 5px;">Bet EG</button>
                            <p style="margin-top: 10px;">16:30 CET, Time left: 4:23:43</p>
                        </div>
                    </div>
                    
                    <div class="col-md-3">
                        <div class="match-block">
                            <div class="match-header">
                                <h4>Quarter-Finals</h4>
                                <p>MayaM Gaming VS Fnatic</p>
                            </div>
                            <div class="match-logos">
                                <img class="team-logo" src="images/teamlogos/teammayam.png" alt="LDLC's logotype."/>
                                <img class="versus" src="images/vs.png" alt="Versus."/>
                                <img class="team-logo" src="images/teamlogos/csFnatic.png" alt="Fnatic's logotype."/>
                            </div>
                            <button class="btn btn-primary" style="margin-right: 5px;">Bet MayaM</button>
                            <button class="btn btn-primary" style="margin-left: 5px;">Bet Fnatic</button>
                            <p style="margin-top: 10px;">16:30 CET, Time left: 4:23:43</p>
                        </div>
                    </div>
                    
                    <div class="col-md-3">
                        <div class="match-block">
                            <div class="match-header">
                                <h4>Quarter-Finals</h4>
                                <p>Team Dignitas VS Natus Vincere</p>
                            </div>
                            <div class="match-logos">
                                <img class="team-logo" src="images/teamlogos/csDig.png" alt="Dignitas's logotype."/>
                                <img class="versus" src="images/vs.png" alt="Versus."/>
                                <img class="team-logo" src="images/teamlogos/csNavi.png" alt="Natus Vincere's logotype."/>
                            </div>
                            <button class="btn btn-primary" style="margin-right: 5px;">Bet Dig</button>
                            <button class="btn btn-primary" style="margin-left: 5px;">Bet Na'Vi</button>
                            <p style="margin-top: 10px;">16:30 CET, Time left: 4:23:43</p>
                        </div>
                    </div>
                    
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
            </div>
        </div>
        
        <?php require_once 'template/footer.php'; ?>
    </div>
</body>
</html>
