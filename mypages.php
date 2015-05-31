<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once 'template/head.php'; ?>
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
                    <img src='images/profilepictures/default.png' alt='Profile Pic'>
		</a>
		<button id='take-picture' type='edit' class='btn btn-default'>Take A New Profile Picture</button>
		<form action='upload.php' method='post' enctype='multipart/form-data'>
                    Select image to upload:
                    <input type='file' name='fileToUpload' id='fileToUpload'>
                    <input type='submit' value='Upload Image' name='submit'>
		</form>
                <button class="btn btn-default" data-toggle="modal" data-target="#edit-account-modal" onclick="cleanForms()">Edit Account Information</button>
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
                            <label for="username">Username:</label>
                            <input type="text" id="username" name="username" class="form-control" maxlength="20">
                        </div>
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
</body>
</html>
 
