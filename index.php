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
                 <h1>Curabitur</h1>
                 <p>Maecenas vulputate massa ultrices, tristique ante mattis, cursus nisl.</p>
                 <a href="#">Learn More</a>
            </div>
        </div>
        
        <!--Content columns.-->
        <div id="content">
            <div class="container">
                <h2>Our Supported Games</h2>
                <p>Fusce consequat mauris sed nisi dignissim, eu sagittis odio pellentesque.</p>
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