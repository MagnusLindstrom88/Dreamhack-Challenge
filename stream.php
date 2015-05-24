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
		    <div class="col-md-8" id="hej" style="border: 3px solid red;">
		    	<div class="videoWrapper">
		    		<iframe src="http://www.twitch.tv/imaqtpie/embed" frameborder="0" scrolling="no"></iframe>	
		    	</div>

		    				
<!--
			    <object width="16" height="10" type="application/x-shockwave-flash" id="live_embed_player_flash" data="https://www-cdn.jtvnw.net/swflibs/TwitchPlayer.swf?channel=imaqtpie" bgcolor="#000000">
				<param name="allowFullScreen" value="true" />
				<param name="allowScriptAccess" value="always" />
				<param name="allowNetworking" value="all" />
				<param name="movie" value="http://www.twitch.tv/widgets/live_embed_player.swf" />
				<param name="flashvars" value="hostname=www.twitch.tv&channel=imaqtpie&auto_play=true&start_volume=25" />
			    </object>
-->
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
    
    <script>
    /*
	// Find all YouTube videos
	var $allVideos = $("object"),
	
	// The element that is fluid width
	$fluidEl = $("#hej");
	
	// Figure out and save aspect ratio for each video
	$allVideos.each(function() {
	
	$(this)
	    .attr('data-aspectRatio', this.height / this.width)
	
	    // and remove the hard coded width/height
	    .removeAttr('height')
	    .removeAttr('width');
	
	});
	
	// When the window is resized
	$(window).resize(function() {
	
	  var newWidth = $fluidEl.width();
	
	  // Resize all videos according to their own aspect ratio
	  $allVideos.each(function() {
	
	    var $el = $(this);
	    $el
	    .width(newWidth)
	    .height(newWidth * $el.attr('data-aspectRatio'));
	
	  });
	
	// Kick off one resize to fix all videos on page load
	}).resize();*/
    </script>
</body>
</html>
