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
                        <iframe src="http://www.twitch.tv/imaqtpie/embed" frameborder="0" scrolling="no" height="378" width="620"></iframe><a href="http://www.twitch.tv/imaqtpie?tt_medium=live_embed&tt_content=text_link" style="padding:2px 0px 4px; display:block; width:345px; font-weight:normal; font-size:10px;text-decoration:underline;">Watch live video from imaqtpie on www.twitch.tv</a>
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
