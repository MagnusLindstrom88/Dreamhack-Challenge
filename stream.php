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
            "channel":"day9tv",
            "auto_play":"true"},
          { "allowScriptAccess":"always",
            "allowFullScreen":"true"});
      });
</head>
<body>
    <div id="wrapper">
        <?php require_once 'template/header&navbar.php'; ?>
        
        <div id="content">
            <div class="container">
				<div id="content">
				<div class="container">
				<h2>Streaming</h2>
						<div class="row">
									<div class="col-md-8">
										 <ul id="stream-list" class="list-group">
											<li class="list-group-item">
										<p class="list-group-item-text">
										
										<iframe src="http://www.twitch.tv/asiagodtonegg3be0/embed" frameborder="0" scrolling="no" height="400" width="620"></iframe>

										</p>
									</li>
								</li>
							</ul>
							</div>
							<div class="col-md-4">
							<ul id="stream-list" class="list-group">
								<li class="list-group-item">
									<p class="list-group-item-text">
									
									<iframe src="http://www.twitch.tv/asiagodtonegg3be0/chat?popout=" frameborder="0" scrolling="no" height="400" width="350"></iframe>
									
									</p>
									</li>
								</li>
							</ul>
							</div>
							<div class="col-md-12">
							<ul id="stream-list" class="list-group">
								<li class="list-group-item">
									<p class="list-group-item-text">
									Information om matchen
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
