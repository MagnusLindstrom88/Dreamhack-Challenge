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
						<div class="row">
							<div class="col-md-8">				
								<ul id="stream-list" class="list-group">
									<li class="list-group-item">
										<p class="list-group-item-text">
											<div class="embed-container">
												<iframe src="http://www.twitch.tv/imaqtpie/embed" frameborder="0" scrolling="no" height="378" width="620"></iframe>
												<object bgcolor="#242424" 
													data="//www-cdn.jtvnw.net/swflibs/TwitchPlayer.swf" 
													height="450" 
													type="application/x-shockwave-flash" 
													width="720"> 
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
												<a class="embedly-card" href="http://www.twitch.tv/imaqtpie/embed">imaqtpie</a>
												<script async src="//cdn.embedly.com/widgets/platform.js" charset="UTF-8"></script>
											</div>
										</p>
									
									</li>
								</ul>
							</div>
							<div class="col-md-4">
							<ul id="stream-list" class="list-group">
								<li class="list-group-item">
									<p class="list-group-item-text">
									Chattrutan	
								
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
