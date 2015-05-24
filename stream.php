<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once 'template/head.php'; ?>
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
        <div id="content">
            <div class="container">
		<h2>Match Streaming</h2>
		<div class="row">
		    <div class="col-md-8">				
			<ul id="stream-list" class="list-group">
			    <li class="list-group-item">
				<p class="list-group-item-text">
				<div class="videoWrapper">
				    <iframe src="https://www-cdn.jtvnw.net/swflibs/TwitchPlayer.swf?channel=imaqtpie" frameborder="0" scrolling="no"></iframe>
				</div>
				</p>
			    </li>
			</ul>
		    </div>
		    <div class="col-md-4">
			<ul id="stream-list" class="list-group">
			    <li class="list-group-item">
				<p class="list-group-item-text">
				<div class="embed-container">
				    <iframe src="chat.php" height="450" frameborder="0" scrolling="yes"></iframe>
				</div>
				</p>
			    </li>
			</ul>
		    </div>
		</div>
		<div class="row">
		    <div class="col-md-12">
			<ul id="stream-list" class="list-group">
			    <li class="list-group-item">
				<p class="list-group-item-text">
				Matchinforuta
				</p>
			    </li>
			</ul>
		    </div>
		</div>
            </div>
        </div>
	<?php require_once 'template/footer.php'; ?>
    </div>
</body>
</html>
