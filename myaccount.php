<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once 'template/head.php'; ?>
    <?php if(!isset($_SESSION['id'])) header("location: index.php"); ?>
    <style>
        #edit-account-modal {color: black;}
        .match-logos {height: 50px;}
        .team-logo {width: 30px;}
        .versus {width:15px;}
    </style>
</head>
<body>
    <?php require_once 'template/header&navbar.php'; ?>
    
    <div id="wrapper">
	<div class="container">
	    <div id="content">
		<div class="row">
		    <div class="col-md-6">
			<h3 id='profilepic'>Profile Picture</h3>
			<a href='#' class='thumbnail' style="width:inherit;">
			    <?php uploadImage(); ?>
			    <?php findProfilePic(); ?>
			    <img src='images/profilepictures/<?php echo $profilePicture; ?>' alt='Profile Pic'>
			</a>
			<p style="margin-bottom:2px;">Upload New Image:</p>
			<form method='post' enctype='multipart/form-data'>
			    <input type='file' name='fileToUpload' id='fileToUpload'>
			    <input type='submit' style="color:black" value='Upload Image'>
			</form>
			<?php
                            //Do not show "Edit Account Information" button to Facebook users.
                            $result = $db->query("SELECT password FROM users WHERE id={$_SESSION['id']}")->fetchAll(PDO::FETCH_ASSOC);
                            if($result[0]['password'] !== null)
                                echo "<button class='btn btn-default' style='margin-top:10px;' data-toggle='modal' data-target='#edit-account-modal' onclick='cleanForms()'>Edit Account Information...</button>";
                        ?>
		    </div>
		    <div class="col-md-6">
			<h3>Betting History</h3>
			 <div class="col-md-12">
        		 	<h3>Starcraft II</h3>
                		<div class="row match-row">
                    		    <?php generateBoxesAccount('SC2'); ?>
                		</div>
                		<br>
                		<h3>Dota 2</h3>
                		<div class="row match-row">
                		    <?php generateBoxesAccount('Dota2'); ?>
                		</div>
                		<br>
                		<h3>CS:GO</h3>
                		<div class="row match-row">
                		    <?php generateBoxesAccount('CS:GO'); ?>
                		</div>
             		</div>
        	</div>
        	<?php require_once 'template/footer.php'; ?>
    		</div>
           </div>
	</div>
    </div>
    <?php
    if(isset($_SESSION['email'])) createModal();  //Create modal if not a Facebook user.
    if(isset($fileUploaded)) echo "<script>alert('{$echoString}')</script>";
    ?>
</body>
</html>

<?php
//Finds the user's profile picture that will be displayed on the page.
function findProfilePic() {
    foreach(glob('images/profilepictures/*.*') as $filename)
	if(strpos($filename, $_SESSION['id'])) {
            $a = explode("/", $filename);
            $GLOBALS['profilePicture'] = $a[count($a)-1];
	}
    if(!isset($GLOBALS['profilePicture']))
        $GLOBALS['profilePicture'] = "../default.png";
}

//Run upon the submission of a new profile picture.
function uploadImage() {
    if(isset($_FILES["fileToUpload"]["name"]) && strlen($_FILES["fileToUpload"]["name"]) > 0) {
    $target_dir = "images/profilepictures/";
    $imageFileType = pathinfo($target_dir . basename($_FILES["fileToUpload"]["name"]), PATHINFO_EXTENSION);
    $target_file = $target_dir . basename("{$_SESSION['id']}.{$imageFileType}");
    $uploadOk = 1;
    
    $echoString = "";
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            $echoString .= "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            $echoString .= "File is not an image.";
            $uploadOk = 0;
        }
    }
    //Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        $echoString .= "File is too large.";
        $uploadOk = 0;
    }
    //Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        $echoString .= "Only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    //Check if $uploadOk is set to 0 by an error
    if ($uploadOk != 0) {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $echoString .= "The image has been uploaded.";
        } else {
            $echoString .= "There was an error uploading your file.";
        }
    }
    $GLOBALS['echoString'] = $echoString;
    $GLOBALS['fileUploaded'] = true;
    }
}


function generateBoxesAccount($game) {
    global $db;
    $matches = $db->query("SELECT * FROM matches, bets, users WHERE game='{$game}' AND matches.id=bets.match_id AND bets.user_id=users.id AND users.id={$_SESSION['id']}");
    foreach($matches as $row) {
        $teams = $db->query("SELECT * FROM teams WHERE id={$row['team0']} OR id={$row['team1']}")->fetchAll(PDO::FETCH_ASSOC);
        $buttonClass0 = "btn btn-info";
        $buttonClass1 = "btn btn-info";
        $matchBoxClass = "match-box upcoming";
        
        if(isset($_SESSION['id'])) {
            $bet = $db->query("SELECT * FROM bets WHERE user_id={$_SESSION['id']} AND match_id={$row['id']} AND (team_id={$teams[0]['id']} OR team_id={$teams[1]['id']})");
        
            if($bet->rowCount() > 0) {
                $bet = $bet->fetchAll(PDO::FETCH_ASSOC);
                if($bet[0]['team_id'] === $teams[0]['id'])
                    $buttonClass0 = str_replace("btn-info", "btn-success", $buttonClass0);
                else if($bet[0]['team_id'] === $teams[1]['id'])
                    $buttonClass1 = str_replace("btn-info", "btn-success", $buttonClass1);
            }
        }
        
        //Style buttons as disabled if the match in ongoing.
        if($row['ongoing']) {
            $matchBoxClass .= "match-box";
            $buttonClass0 .= " disabled";
            $buttonClass1 .= " disabled";
        }
        
        //Calculate time remaining if not ongoing.
        $timeClass = "";
        if(!$row['ongoing']) {
            $seconds = strtotime($row['played_at']) - time();
            $hours = floor($seconds / 3600);
            $seconds %= 3600;
            $minutes = floor($seconds / 60);
            if(strlen($minutes) === 1) $minutes = "0".$minutes;
            $seconds %= 60;
            if(strlen($seconds) === 1) $seconds = "0".$seconds;
            $timeRemaining = "Time left: $hours:$minutes:$seconds";
        }
        else $timeRemaining = "<strong>Ongoing</strong>";
        echo
        "
        <div class='col-md-6 col-sm-12'>
            <div class='{$matchBoxClass}' id='{$row['id']}'>
                <div class='match-header'>
                    <p>{$teams[0]['name']} VS {$teams[1]['name']}</p>
                </div>
                <div class='match-logos'>
                    <img class='team-logo' src='images/teamlogos/{$teams[0]['abbreviation']}.png' alt=\"{$teams[0]['name']}'s logotype.\"/>
                    <img class='versus' src='images/vs.png' alt='Versus.'/>
                    <img class='team-logo' src='images/teamlogos/{$teams[1]['abbreviation']}.png' alt=\"{$teams[1]['name']}'s logotype.\"/>
                </div>
                <button class='{$buttonClass0}' id='{$teams[0]['id']}' onclick='makeBet(this)' style='margin-right: 5px;'>Bet {$teams[0]['abbreviation']}</button>
                <button class='{$buttonClass1}' id='{$teams[1]['id']}' onclick='makeBet(this)' style='margin-left: 5px;'>Bet {$teams[1]['abbreviation']}</button>
                <p class='counter' style='margin-top: 10px;'>{$timeRemaining}</p>
            </div>
        </div>
        ";
    }
}

//Outputs the modal HTML code on the page if the user is not logged in with Facebook.
function createModal() {
    //Edit Account Modal
    echo "
    <div class='modal fade' id='edit-account-modal' tabindex='-1' role='dialog' aria-labelledby='editAccountHeading' aria-hidden='true'>
        <div class='modal-dialog'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                    <h4 id='registrationHeading' class='modal-title'>Edit Account Information</h4>
                </div>
                <div class='modal-body'>
                    <form id='edit-account-form' role='form' method='post'>
                        <div class='form-group'>
                            <label for='registration-email'>Email:</label>
                            <input type='email' id='registration-email' name='email' class='form-control' value='{$_SESSION['email']}' maxlength='254'>
                        </div>
                        <div class='form-group'>
                            <label for='registration-password'>New Password:</label>
                            <input type='password' id='registration-password' name='password' class='form-control' maxlength='255'>
                        </div>
                        <div class='form-group'>
                            <label for='confirm-password'>Old Password:</label>
                            <input type='password' id='confirm-password' name='confirm-password' class='form-control' maxlength='255'>
                        </div>
                    </form>
                </div>
                <div class='modal-footer'>
                    <button type='button' class='btn btn-primary' onclick='validateRegistration();'>Save</button>
                    <button type='button' class='btn btn-default' data-dismiss='modal'>Cancel</button>
                </div>
            </div>
        </div>
    </div>";
}
?>
