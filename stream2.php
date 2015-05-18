<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once 'template/head.php'; ?>
    <style>
        #stream-heading {margin-bottom: 20px;}
        #stream-list li {
            background-color: #242424;
            border:1px solid #676461;
			margin-top: 0px;
			margin-bottom: 0px;
			margin-right: 0px;
			margin-left: 0px;
        }
		.embed-container {
		position: relative;
		padding-bottom: 56.25%; /* 16/9 ratio */
		padding-top: 30px; /* IE6 workaround*/
		height: 0;
		overflow: hidden;
		}
		.embed-container iframe,
		.embed-container object,
		.embed-container embed {
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
				<div id="content">
				<div class="container">
				<h2>Match Streaming</h2>
				<?php echo $_SERVER['HTTP_USER_AGENT']; ?>
						<div class="row">
							<div class="col-md-8">				
								<ul id="stream-list" class="list-group">
									<li class="list-group-item">
										<p class="list-group-item-text">
											<div class="embed-container">
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

													swfobject.embedSWF("//www-cdn.jtvnw.net/swflibs/TwitchPlayer.swf", "twitch_embed_player", "720", "450", "11", null,
													  { "eventsCallback":"onPlayerEvent",
														"embed":1,
														"channel":"imaqtpie",
														"auto_play":"true"},
													  { "allowScriptAccess":"always",
														"allowFullScreen":"true"});
												  });
												</script>

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
									<iframe src="chat.php" height="450" widtframeborder="0" scrolling="yes"></iframe>
									</div>
									</p>
									</li>
								</li>
							</ul>
							</div>
							<div class="col-md-12">
							<ul id="stream-list" class="list-group">
								<li class="list-group-item">
									<p class="list-group-item-text">
									Matchinforuta
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
