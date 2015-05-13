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
                <form class="pull-right">
                    <h2>Change Account Info</h2>
                        <ul class="form-style-1">
                            <li>
                                <label>Full Name</label>
                                <input type="text" name="field1" class="field-divided" placeholder="First" />
                                <input type="text" name="field2" class="field-divided" placeholder="Last" />
                            </li>
                            <li>
                                <label>Change Email</label>
                                <input type="email" name="field3" class="field-long" />
                            </li>
                            <li>
                                <label>Change Password</label>
                                <input type="password" name="field1" class="field-divided" placeholder="Current Password" />&nbsp;<input type="password" name="field2" class="field-divided" placeholder="New Password" /></li>
                            <li>
                                <input type="submit" value="Submit" />
                            </li>
                        </ul>
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
