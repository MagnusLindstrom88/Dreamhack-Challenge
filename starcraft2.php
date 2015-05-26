<<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once 'template/head.php'; ?>
    <style>
        #section-image-container {
            background-color: #000000;
            background-size: cover;
        }
    </style>
</head>
<body>
    <div id="wrapper">
        <?php require_once 'template/header&navbar.php'; ?>
        
        <div id="section-image-container">
            <img id="section-image" src="images/Starcraft2-logo.jpg" alt="Starcraft 2 logotype."/>
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
                        <a class="navbar-brand">DOTA 2</a>
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
                    <div class="col-md-4">
                        <div class="match-block">
                            <div class="match-header">
                                <h4>Quarter-Finals</h4>
                                <p>Mayam Gaming (MayaM) VS Evil Geniuses (EG)</p>
                            </div>
                            <div class="match-logos">
                                <img src="images/teamlogos/teammayam.png" alt="Mayam Gaming's logotype."/>
                                <img src="images/vs.png" alt="Versus."/>
                                <img src="images/teamlogos/teamevilgeniuses.png" alt="Evil Geniuses's logotype."/>
                            </div>
                            <button class="btn btn-primary" style="margin-right: 5px;">Bet MayaM</button>
                            <button class="btn btn-primary" style="margin-left: 5px;">Bet EG</button>
                            <p style="margin-top: 10px;">16:30 CET, Time left: 4:23:43</p>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="match-block">
                            <div class="match-header">
                                <h4>Quarter-Finals</h4>
                                <p>Mayam Gaming (MayaM) VS Evil Geniuses (EG)</p>
                            </div>
                            <div class="match-logos">
                                <img src="images/teamlogos/teammayam.png" alt="Mayam Gaming's logotype."/>
                                <img src="images/vs.png" alt="Versus."/>
                                <img src="images/teamlogos/teamevilgeniuses.png" alt="Evil Geniuses's logotype."/>
                            </div>
                            <button class="btn btn-primary" style="margin-right: 5px;">Bet MayaM</button>
                            <button class="btn btn-primary" style="margin-left: 5px;">Bet EG</button>
                            <p style="margin-top: 10px;">16:30 CET, Time left: 4:23:43</p>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="match-block">
                            <div class="match-header">
                                <h4>Quarter-Finals</h4>
                                <p>Mayam Gaming (MayaM) VS Evil Geniuses (EG)</p>
                            </div>
                            <div class="match-logos">
                                <img src="images/teamlogos/teammayam.png" alt="Mayam Gaming's logotype."/>
                                <img src="images/vs.png" alt="Versus."/>
                                <img src="images/teamlogos/teamevilgeniuses.png" alt="Evil Geniuses's logotype."/>
                            </div>
                            <button class="btn btn-primary" style="margin-right: 5px;">Bet MayaM</button>
                            <button class="btn btn-primary" style="margin-left: 5px;">Bet EG</button>
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
        
        <?php require_once 'template/footer.php'; ?>
    </div>
</body>
</html>
