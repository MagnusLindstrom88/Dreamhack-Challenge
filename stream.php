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
										
										<iframe src="http://www.twitch.tv/asiagodtonegg3be0/embed" frameborder="0" scrolling="no" height="500" width="620"></iframe>
										<a href="http://www.twitch.tv/asiagodtonegg3be0?tt_medium=live_embed&tt_content=text_link" style="padding:2px 0px 4px; display:block; width:345px; font-weight:normal; font-size:10px;text-decoration:underline;">Watch live video from asiagodtonegg3be0 on www.twitch.tv</a>
										
										</p>
									</li>
								</li>
							</ul>
							</div>
							<div class="col-md-4">
							<ul id="stream-list" class="list-group">
								<li class="list-group-item">
									<p class="list-group-item-text">
									
									<iframe src="http://www.twitch.tv/asiagodtonegg3be0/chat?popout=" frameborder="0" scrolling="no" height="500" width="350"></iframe>
									
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
