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
	#video-wrapper {
	    position: relative;
	    padding-bottom: 56.25%; /* 16:9 */
	    padding-top: 25px;
	    height: 0;
	}
	#video-wrapper iframe {
	    position: absolute;
	    top: 0;
	    left: 0;
	    width: 100%;
	    height: 100%;
	}
    </style>
</head>
<?php initialize(); ?>
<body>
    <div id="wrapper">
        <?php require_once 'template/header&navbar.php'; ?>
        <div id="content">
            <div class="container">
		<h3><?php echo $heading; ?></h3>
		<div class="row">
		    <div class="col-md-8">
		    	<div id="video-wrapper">
		    	    <iframe src="https://www-cdn.jtvnw.net/swflibs/TwitchPlayer.swf?channel=<?php echo $stream; ?>" frameborder="0"></iframe>
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
			<p><?php echo $information; ?></p>
		    </div>
		</div>
            </div>
        </div>
	<?php require_once 'template/footer.php'; ?>
    </div>
</body>

<script>
//Switch to a non-https embed for iOS devices since they apparently won't display it otherwise.
if (/iPhone|iPad|iPod/i.test(navigator.userAgent) )
	$("#video-wrapper")[0].innerHTML = " <iframe src='http://www.twitch.tv/<?php echo $stream; ?>/embed' frameborder='0' scrolling='no'></iframe>";

//Get current date in time. Is used to make sure only recent chat messages gets displayed.
var datetime = getDateTime();
var game = window.location.search.split("=")[1];

//Get the user's betted team, if any. Not relevant if there's not an ongoing match.
var bettedTeam;
var xmlHttp = new XMLHttpRequest();
xmlHttp.onload = function() {bettedTeam = xmlHttp.responseText;}
xmlHttp.open("GET", "scripts/get_betted_team.php?game="+game);
xmlHttp.send();

//Refreshes the chat log periodically.
setInterval(loadChatLog, 2000);

//Puts the content of the chatlog.txt file into the chat area.
function loadChatLog() {
    var oldscrollHeight = $("#chat-message-area").prop("scrollHeight");
    xmlHttp.onload = function() {
	var chatlog = xmlHttp.responseText;
	document.getElementById("chat-message-area").innerHTML = chatlog;
	//Auto-scrolls the chat area.
	var newscrollHeight = $("#chat-message-area").prop("scrollHeight"); //Scroll height after the request.
	if(newscrollHeight > oldscrollHeight)
	    $("#chat-message-area").animate({ scrollTop: newscrollHeight }, 'normal'); //Autoscroll to bottom of div.
    }
    xmlHttp.open("GET", "scripts/get_chatlog.php?game="+game+"&datetime="+datetime);
    xmlHttp.send();
}

//Called when the user sends a chat message.
function sendMessage() {
    var inputField = document.getElementById("chat-input-field");
    var message = inputField.value;
    inputField.value = "";
    
    xmlHttp.onload = function() {
	if(xmlHttp.responseText === "failed") alert("You must be logged in to chat.");
    }
    xmlHttp.open("POST", "scripts/insert_chat_message.php");
    xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlHttp.send("message="+message+"&game="+game+"&bettedteam="+bettedTeam);
}

//Makes chat messages get sent upon pressing enter.
document.getElementById("chat-input-field").onkeydown = function(e){
    if (e.keyCode === 13) {
	e.preventDefault();
	sendMessage();
    }
}

//Gets the current date and time in the format MySQL uses.
function getDateTime() {
    var now     = new Date(); 
    var year    = now.getFullYear();
    var month   = now.getMonth()+1; 
    var day     = now.getDate();
    var hour    = now.getHours();
    var minute  = now.getMinutes();
    var second  = now.getSeconds();
    
    if(month.toString().length == 1)
	var month = '0'+month;
    if(day.toString().length == 1)
	var day = '0'+day;
    if(hour.toString().length == 1)
	var hour = '0'+hour;
    if(minute.toString().length == 1)
	var minute = '0'+minute;
    if(second.toString().length == 1)
	var second = '0'+second;
	
    var dateTime = year+'-'+month+'-'+day+' '+hour+':'+minute+':'+second;   
     return dateTime;
}
</script>
</html>

<?php
//Gets data that will be displayed on the page.
function initialize() {
    global $db;
    $match = $db->prepare("SELECT * FROM matches WHERE ongoing=1 AND game=?");
    $match->execute(array($_GET['game']));
    $match = $match->fetchAll(PDO::FETCH_ASSOC);
    
    switch($_GET['game']) {
	case "CS:GO":
	    $game = "CS:GO";
	    $GLOBALS['stream'] = "meclipse";
	    break;
	case "Dota2":
	    $game = "Dota 2";
	    $GLOBALS['stream'] = "ti5yasha";
	    break;
	case "SC2":
	    $game = "Starcraft II";
	    $GLOBALS['stream'] = "wcs";
	    break;
    }
    
    //Check if there's an ongoing match for this stream page.
    if(count($match) === 1) {
	$teams = $db->query("SELECT * FROM teams WHERE id={$match[0]['team0']} OR id={$match[0]['team1']}")->fetchAll(PDO::FETCH_ASSOC);
	$GLOBALS['heading'] = "{$game} - {$teams[0]['name']} VS {$teams[1]['name']}";
	$GLOBALS['information'] = "This is a very good match.";
    }
    else {
	$match = $db->prepare("SELECT * FROM matches WHERE played_at=(SELECT MIN(played_at) FROM matches WHERE game=?) AND game=?");
	$match->execute(array($_GET['game'], $_GET['game']));
	$match = $match->fetchAll(PDO::FETCH_ASSOC);
	$teams = $db->query("SELECT * FROM teams WHERE id={$match[0]['team0']} OR id={$match[0]['team1']}")->fetchAll(PDO::FETCH_ASSOC);
	$GLOBALS['heading'] = "{$game} - Stream Offline";
	$GLOBALS['information'] = "The stream is currently offline. Next up is {$teams[0]['name']} versus {$teams[1]['name']}, please come back later.";
    }
}
?>
