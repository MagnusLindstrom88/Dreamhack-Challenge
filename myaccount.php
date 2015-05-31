<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once 'template/head.php'; ?>
    <?php if(!isset($_SESSION['id'])) header("location: index.php"); ?>
    <style>
        #edit-account-modal {color: black;}
    </style>
</head>
<body>
    <?php require_once 'template/header&navbar.php'; ?>
    
    <div class="container">
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
                <button class="btn btn-default" style="margin-top:10px;" data-toggle="modal" data-target="#edit-account-modal" onclick="cleanForms()">Edit Account Information...</button>
            </div>
            <div class="col-md-6">
                <h3>Betting History</h3>
                <ul class="list-group">
                    <a href="#" class="list-group-item list-group-item-success">Dapibus ac facilisis in</a> 
                    <a href="#" class="list-group-item list-group-item-danger">Vestibulum at eros</a>
                    <a href="#" class="list-group-item list-group-item-success">Dapibus ac facilisis in</a>
                    <a href="#" class="list-group-item list-group-item-success">Dapibus ac facilisis in</a>
                    <a href="#" class="list-group-item list-group-item-success">Dapibus ac facilisis in</a>
                    <a href="#" class="list-group-item list-group-item-danger">Vestibulum at eros</a>
                    <a href="#" class="list-group-item list-group-item-danger">Vestibulum at eros</a>
                </ul>
            </div>
        </div>
    </div>
    
    <?php require_once 'template/footer.php'; ?>

    <!--Edit Account Modal-->
    <div class="modal fade" id="edit-account-modal" tabindex="-1" role="dialog" aria-labelledby="editAccountHeading" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 id="registrationHeading" class="modal-title">Edit Account Information</h4>
                </div>
                <div class="modal-body">
                    <form id="edit-account-form" role="form" method="post">
                        <div class="form-group">
                            <label for="registration-email">Email:</label>
                            <input type="email" id="registration-email" name="email" class="form-control" maxlength="254">
                        </div>
                        <div class="form-group">
                            <label for="registration-password">Password:</label>
                            <input type="password" id="registration-password" name="password" class="form-control" maxlength="255">
                        </div>
                        <div class="form-group">
                            <label for="confirm-password">Confirm Password:</label>
                            <input type="password" id="confirm-password" name="confirm-password" class="form-control" maxlength="255">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="validateRegistration();">Confirm</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <?php if(isset($fileUploaded)) echo "<script>alert('{$echoString}')</script>"; ?>
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
        $GLOBALS['profilePicture'] = "default.png";
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
?>