<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once 'template/head.php'; ?>
    <style>
        #stream-heading {margin-bottom: 20px;}
        #stream-list li {
            background-color: #242424;
            border:1px solid #676461;
        }
    </style>
	<script src="//ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script>
      $(function () {
        window.onPlayerEvent = function (data) {
          data.forEach(function(event) {
            if (event.event == "playerInit") {
              var player = $("#twitch_embed_player")[0];
              player.playVideo();
              player.mute();
            }
          });
        }

        swfobject.embedSWF("//www-cdn.jtvnw.net/swflibs/TwitchPlayer.swf", "twitch_embed_player", "640", "400", "11", null,
          { "eventsCallback":"onPlayerEvent",
            "embed":1,
            "channel":"imaqtpie",
            "auto_play":"true"},
          { "allowScriptAccess":"always",
            "allowFullScreen":"true"});
      });
	  </script
</head>
<body>
    <div id="wrapper">
        <?php require_once 'template/header&navbar.php'; ?>
        
        <div id="content">
            <div class="container">
				<div id="content">
				<div class="container">
				<h2>Match Streaming</h2>
						<div class="row">

									<div class="col-md-8">
										 <ul id="stream-list" class="list-group">
											<li class="list-group-item">
										<p class="list-group-item-text">
										<iframe src="http://www.twitch.tv/imaqtpie/embed" frameborder="0" scrolling="no" height="auto" width="auto"></iframe>
										<div class="col-md-8">
										<object bgcolor="#000000" 
												data="//www-cdn.jtvnw.net/swflibs/TwitchPlayer.swf" 
												height="400" 
												type="application/x-shockwave-flash" 
												width="650" 
												> 
										  <param name="allowFullScreen" 
												  value="true" />
										  <param name="allowNetworking" 
												  value="all" />
										  <param name="allowScriptAccess" 
												  value="always" />
										  <param name="movie" 
												  value="//www-cdn.jtvnw.net/swflibs/TwitchPlayer.swf" />
										  <param name="flashvars" 
												  value="channel=imaqtpie&auto_play=true&start_volume=25" />
										</object>
										</div>
										
										</p>
									</li>
								</li>
							</ul>
							</div>
							<div class="col-md-4">
							<ul id="stream-list" class="list-group">
								<li class="list-group-item">
									<p class="list-group-item-text">						
									</p>
									</li>
								</li>
							</ul>
							</div>
							<div class="col-md-12">
							<ul id="stream-list" class="list-group">
								<li class="list-group-item">
									<p class="list-group-item-text">
									
									</p>
									</li>
								</li>
							</ul>
							</div>
						</div>
					</div>
				</div>
				
               
            </div>
        </div>
    
    <?php require_once 'template/footer.php'; ?>
    </div>
</body>
</html>
