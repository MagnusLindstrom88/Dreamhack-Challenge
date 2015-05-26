<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once 'template/head.php'; ?>
    <style>
	#hej {
	    background-color: #242424;
	    border: 3px solid #676461;
	    border-radius:10px;
	}
	#chatbox {
	    color:black;
	    height: 450px;
	    margin: 0 auto;
	}
	#chat-message-area {
	    width: 100%;
	    height: 75%;
	    border-bottom: 1px solid #676461;
	    overflow-y: scroll;
	    color: #f7f7f7;
	}
	#chat-input-field {
	    width:100%;
	    margin:5px 0;
	    resize: none;
	}
	#videoWrapper {
		position: relative;
		padding-bottom: 56.25%; /* 16:9 */
		padding-top: 25px;
		height: 0;
	}
	#videoWrapper iframe {
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
		<h1>Match Streaming</h1>
		<div class="row">
		    <div class="col-md-8" style="">
		    	<div id="videoWrapper">
		    	    <iframe src="https://www-cdn.jtvnw.net/swflibs/TwitchPlayer.swf?channel=imaqtpie" frameborder="0"></iframe>
		    	</div>
		    </div>
		    <div class="col-md-4"  id="hej">
			<div id="chatbox">
			    <div id="chat-message-area"></div>
			    <textarea id="chat-input-field"></textarea>
			    <button class="btn btn-default pull-right" onclick="sendMessage()">Send</button>
			</div>
		    </div>
		</div>
		<div class="row">
		    <div class="col-md-12" style="margin-top:15px;">
			<h3>Information</h3>
			<p>This is a very good match.</p>
		    </div>
		</div>
            </div>
        </div>
	<?php require_once 'template/footer.php'; ?>
    </div>
    
    <script>
	//Switch to a non-https embed for iOS devices since they apparently won't display it otherwise.
    	if (/iPhone|iPad|iPod/i.test(navigator.userAgent) )
    		$("iframe")[0].src = "http://www.twitch.tv/imaqtpie/embed";
	
	function sendMessage() {
	    var inputField = document.getElementById("chat-input-field");
	    var msg = inputField.value;
	    inputField.value = "";
	    
	    var xmlHttp = new XMLHttpRequest();
	    xmlHttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	    xmlHttp.send("");
	    
	    
	    //document.getElementById("chat-message-input-field").value = "";
	    //var child = document.createElement("div");
	    //child.innerHTML = msg;
	    //document.getElementById("chat-message-area").appendChild(child);
	}
    </script>
</body>
</html>
