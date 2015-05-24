<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once 'template/head.php'; ?>
    <link href="http://s3.amazonaws.com/codecademy-content/courses/ltp/css/shift.css" rel="stylesheet">
    <style>
        .videoWrapper {
            position: relative;
            padding-bottom: 56.25%; /* 16:9 */
            padding-top: 25px;
            height: 0;
        }
        .videoWrapper iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
    </style>
</head>
<body>
    <div id="wrapper">
        <?php require_once 'template/header&navbar.php'; ?>
        
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="videoWrapper">
                        <iframe src="https://www-cdn.jtvnw.net/swflibs/TwitchPlayer.swf?channel=imaqtpie" frameborder="0" scrolling="no"></iframe>
                    </div>
                </div>
                <div class="col-md-4" style="height:300px;background-color:white;">
                    
                </div>
            </div>
        </div>
    
        <?php require_once 'template/footer.php'; ?>
    </div>
</body>
</html>
