<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once 'template/head.php'; ?>
    <link href="http://s3.amazonaws.com/codecademy-content/courses/ltp/css/shift.css" rel="stylesheet">
    <style>
        .jumbotron {
            background-image: url(images/jumbotron.jpg);
            background-size: cover;
            height: 400px;
            border-bottom: 1px solid #676461;
            margin-bottom: 0px;
        }
        .jumbotron h1 {font-weight: bold;}
        .jumbotron a {
            color: #00b0ff;
            font-size: 20px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div id="wrapper">
        <?php require_once 'template/header&navbar.php'; ?>
        
        <!--Main image with text.-->
        <div class="jumbotron">
            <div class="container">
                 <h1>Welcome!</h1>
                 <p>Welcome to DreamHack Challenge! This is an interactive meeting place for gamers and e-sport enthusiasts. Follow the Dreamhack event from here, watch livestreams and place bets. Enjoy!</p>
<<<<<<< HEAD
                 <div class="dropdown">
  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
    Learn More
    <span class="caret"></span>
  </button>
=======
                 <a href="#">Learn More</a>
>>>>>>> 425d004928e3bb4e259b01c49acf5ea77a355c40
            </div>
        </div>
        
        <!--Content columns.-->
        <div id="content">
            <div class="container">
                <h2>Our Supported Games</h2>
                <p>Welcome to our supported games, feel free to place a bet and enjoy!</p>
                <div class="row">
                    <div class="col-md-4">
                        <a href="csgo.php"><div class="thumbnail"><img src="images/csgothumbnail.jpg" alt="Counter Strike: Global Offensive thumbnail."/></div></a>
                    </div>
                    <div class="col-md-4">
                        <a href="dota2.php"><div class="thumbnail"><img src="images/dota2thumbnail.jpg" alt="Dota 2 thumbnail."/></div></a>
                    </div>
                    <div class="col-md-4">
                        <a href="starcraft2.php"><div class="thumbnail"><img src="images/starcraft2thumbnail.jpg" alt="Starcraft 2 thumbnail."/></div></a>
                    </div>
                </div>
            </div>
        </div>
        <?php require_once 'template/footer.php'; ?>
    </div>
</body>
</html>
