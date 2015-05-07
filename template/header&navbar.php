<?php require_once 'scripts/init.php'; ?>

<!--Code to help highlight the correct field in the navbar.-->
<?php
$pageName = explode('/', $_SERVER['SCRIPT_NAME'])[2];
function checkActive($s) {
    global $pageName;
    if($s === $pageName) echo 'active';
}
?>

<!--Header-->
<div id="header-wrapper">
    <header class="container">
        <a href="index.php"><img src="images/logo.png" alt="Logo"/></a>
    </header>
</div>

<!--Navigation bar-->
<nav id="navbar" class="navbar navbar-default">
    <div class="container">
        <!--The toggle button for collapsed menu.-->
        <button class="navbar-toggle" data-toggle="collapse" data-target="#menuFields">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <!--The brand on the leftmost side.-->
        <div class="navbar-header">
            <a class="navbar-brand">Navigation</a>
        </div>

        <!--The menu fields. Will be collapsed on small screens.-->
        <div class="collapse navbar-collapse" id="menuFields">
            <!--Fields on the left.-->
            <ul class="nav navbar-nav">
                <li class="<?php checkActive('index.php'); ?>"><a href="index.php">Home</a></li>
                <li class="dropdown" id="game-list">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Games<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li class="<?php checkActive('csgo.php'); ?>"><a href="csgo.php">Counter-Strike: Global Offensive</a></li>
                        <li class="<?php checkActive('dota2.php'); ?>"><a href="dota2.php">Dota 2</a></li>
                        <li class="<?php checkActive('starcraft2.php'); ?>"><a href="starcraft2.php">Starcraft II</a></li>
                    </ul>
                </li>
                <li class="<?php checkActive('faq.php'); ?>"><a href="faq.php">FAQ</a></li>
                <li><a href="#">About Us</a></li>
            </ul>
            <!--Fields on the right. Changes depending on if the user is logged in.-->
            <?php
            echo '<ul class="nav navbar-nav navbar-right">';
            if(isset($_SESSION['username'])) echo
            '<li><a href="scripts/logout.php"> Welcome, '.$_SESSION['username'].' (log out)</a></li>';
            else echo 
            '<li><a href="#" data-toggle="modal" data-target="#login-modal"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            <li><a href="#" data-toggle="modal" data-target="#register-modal"><span class="glyphicon glyphicon-user"></span> Register</a></li>';
            echo '</ul>';
            ?>
        </div>
    </div>
</nav>

<!--Login Modal-->
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Login</h4>
      </div>
      <div class="modal-body">
        <form id="login-form" role="form" method="post" action="scripts/login.php">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" class="form-control">
            </div>
            <div class="checkbox">
            <label><input type="checkbox"> Remember me</label>
            </div>
        </form>
        <p><b>Or</b> <a href="#"><img src="images/loginfacebook.png"></a></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="login()">Login</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>

<!--Register Modal-->
<div class="modal fade" id="register-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Register</h4>
      </div>
      <div class="modal-body">
        <form id="registration-form" role="form" method="post">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" class="form-control">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" class="form-control">
            </div>
            <div class="form-group">
                <label for="confirm-password">Confirm Password:</label>
                <input type="password" id="confirm-password" name="confirm-password" class="form-control">
            </div>
            <div class="checkbox">
                <label><input type="checkbox"> I accept the <a href="#">terms of service</a>.</label>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="validateRegistration()">Register</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>

<!-- Makes the dropdown menu field highlighted if any of its children are highlighted. -->
<script>
    var gameList = document.getElementById("game-list");
    var active = document.getElementsByClassName("active")[0];
    if($.contains(gameList, active))
        gameList.className += " active";
</script>

<!-- Called when the login button is clicked. Simply submits the login form. -->
<script>function login() {document.getElementById("login-form").submit();}</script>


<!-- Contains a function for validating the registration form before it's sent to the server -->
<script src="scripts/registration_validation.js"></script>

<!-- Creates a new user with the registration data. Only run if the data passed the validation. -->
<?php
if(isset($_POST['username'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm-password'];
    
    //Insert into database with a prepared statement in order eliminate any risk of SQL injection.
    $ps = $db->prepare('INSERT INTO users(username, email, password) VALUES (?, ?, ?)');
    $ps->execute(array($username, $email, $password));
}
?>

