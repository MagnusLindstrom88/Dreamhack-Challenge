<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once 'template/head.php'; ?>
    <style>
	#chat-container {
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
	    margin-top:5px;
	    width: 100%;
	    height: 75%;
	    line-height: 25px;
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
		<h1>CS:GO - Ninjas in Pyjamas VS HellRaisers</h1>
		<div class="row">
		    <div class="col-md-8" style="">
		    	<div id="videoWrapper">
		    	    <iframe src="https://www-cdn.jtvnw.net/swflibs/TwitchPlayer.swf?channel=esl_csgo" frameborder="0"></iframe>
		    	</div>
		    </div>
		    <div class="col-md-4"  id="chat-container">
			<div id="chatbox">
			    <div id="chat-message-area"></div>
			    <textarea id="chat-input-field" rows="1"></textarea>
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
	
	//Refreshes the chat log periodically.
	setInterval(loadChatLog, 2000);
	
	//Get the content of the chat log when the page loads. Used to avoid showing old messages.
	var LOG_AT_START;
	var xmlHttp = new XMLHttpRequest();
	xmlHttp.onload = function() {
	    LOG_AT_START = xmlHttp.responseText;
	}
	xmlHttp.open("POST", "chatlog.html");
	xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlHttp.send();
	
	
	//Puts the content of the chatlog.html file into the chat area.
	function loadChatLog() {
	    //var oldscrollHeight = $("#chat-message-area").prop("scrollHeight");
	    var xmlHttp = new XMLHttpRequest();
	    xmlHttp.onload = function() {
		//var chatlog = xmlHttp.responseText;
		//chatlog = chatlog.replace(LOG_AT_START, "");
		document.getElementById("chat-message-area").innerHTML = xmlHttp.responseText;;
		//Auto-scrolls the chat area.
		//var newscrollHeight = $("#chat-message-area").prop("scrollHeight"); //Scroll height after the request.
		//if(newscrollHeight > oldscrollHeight)
		//    $("#chat-message-area").animate({ scrollTop: newscrollHeight }, 'normal'); //Autoscroll to bottom of div.
	    }
	    xmlHttp.open("POST", "chatlog.html");
	    xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	    xmlHttp.send();
	}
	
	//Called when the user sends a chat message.
	function sendMessage() {
	    var inputField = document.getElementById("chat-input-field");
	    var message = inputField.value;
	    inputField.value = "";
	    
	    var xmlHttp = new XMLHttpRequest();
	    xmlHttp.onload = function() {
		if(xmlHttp.responseText === "failed") alert("You must be logged in to chat.");
	    }
	    xmlHttp.open("POST", "scripts/chat.php");
	    xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	    xmlHttp.send("message="+message);
	}
	
	//Makes chat messages get sent upon pressing enter.
	document.getElementById("chat-input-field").onkeydown = function(e){
	    if (e.keyCode === 13) {
		e.preventDefault();
		sendMessage();
	    }
        }
    </script>
</body>
</html>
