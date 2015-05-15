<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once 'template/head.php'; ?>
</head>
<body>
    <div id="wrapper">
        <?php require_once 'template/header&navbar.php'; ?>
        <!--Account Header-->
	<div id="content">
            <div class="container">
                <h1>My Account</h1>
                <!--Main Form-->
                	<form class="form-horizontal" role="form">
		<div class="form-group">
			<label class="control-label col-sm-2" for="username">Username: </label>
			<div class="col-sm-10">
				<input type="email" class="form-control" id="username" placeholder="Enter username">
			</div>
		</div>
			<div class="form-group">
			<label class="control-label col-sm-2" for="pwd">Change password:</label>
			<div class="col-sm-10"> 
				<input type="password" class="form-control" id="pwd" placeholder="Enter password">
			</div>
		</div>
		</div>
			<div class="form-group">
			<label class="control-label col-sm-2" for="pwd">Re-type password:</label>
			<div class="col-sm-10"> 
				<input type="password" class="form-control" id="pwd" placeholder="Enter password again">
			</div>
		</div>
		<div class="form-group"> 
			<div class="col-sm-offset-2 col-sm-10">
				<div class="checkbox">
				<label><input type="checkbox"> Remember me</label>
				</div>
			</div>
		</div>
			<div class="form-group"> 
				<div class="col-sm-offset-2 col-sm-10">
				<button type="submit" class="btn btn-default">Submit</button>
			</div>
		</div>
	</form>
                <!--Match History-->
                <div class="account-style">
                    <h2>Match History</h2>
                        <ul>
                            <li>
                                <img src="images/accountpic.png">
                                <h3>Match 1</h3>
                                <p><img src="images/account-win-loss.jpg"</p>
                            </li>
                            <li>
                                <img src="images/accountpic.png">
                                <h3>Match 2</h3>
                                <p><img src="images/account-win-loss.jpg"</p>
                            </li>
                            <li>
                                <img src="images/accountpic.png">
                                <h3>Match 3</h3>
                                <p><img src="images/account-win-loss.jpg"></p>
                            </li>
                        </ul>
                </div>
            </div>
	</div>
        <?php require_once 'template/footer.php'; ?>
    </div>
</body>
</html>
