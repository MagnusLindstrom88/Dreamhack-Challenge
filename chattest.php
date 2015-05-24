<head>
    <?php require_once 'template/head.php' ?>
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

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="videoWrapper">
                <iframe src="http://www.twitch.tv/imaqtpie/embed" frameborder="0" scrolling="no"></iframe>
            </div>
        </div>
        <div class="col-md-4" style="height:300px;background-color:white;">
            
        </div>
    </div>

</div>