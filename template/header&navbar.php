<!--Header-->
<div id="header-wrapper">
    <header class="container">
        <a href="index.php"><img src="images/logo.png" alt="Logo"/></a>
    </header>
</div>

<!--Navigation bar-->
<nav class="navbar navbar-default" id="navbar">
    <div class="container">
        <!--The toggle button for collapsed menu.-->
        <button class="navbar-toggle" data-toggle="collapse" data-target="#menu-fields">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <!--The brand on the leftmost side.-->
        <div class="navbar-header">
            <a class="navbar-brand">Navigation</a>
        </div>

        <!--The menu fields. Will be collapsed on small screens.-->
        <div class="collapse navbar-collapse" id="menu-fields">
            <!--Fields on the left.-->
            <ul class="nav navbar-nav">
                <li><a href="index.php">Home</a></li>
                <li class="dropdown" id="game-list">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Games<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="game.php?game=CS:GO">Counter-Strike: Global Offensive</a></li>
                        <li><a href="game.php?game=Dota2">Dota 2</a></li>
                        <li><a href="game.php?game=SC2">Starcraft II</a></li>
                    </ul>
                </li>
                <li><a href="faq.php">FAQ</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="contact.php">Contact Us</a></li>
                <li><a href="gallery.php">Gallery</a></li>
            </ul>
            <?php
            //Fields on the right. Changes depending on if the user is logged in.
            echo '<ul class="nav navbar-nav navbar-right">';
            if(isset($_SESSION['username'])) echo
            '<li><p class="navbar-text">Welcome, '.$_SESSION['username'].'</p></li>
            <li><a href="myaccount.php"><span class="glyphicon glyphicon-user"></span> My Account</a></li>
            <li><a href="javascript:logout()"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>';
            else echo 
            '<li><a href="#" data-toggle="modal" data-target="#login-modal" onclick="cleanForms()"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            <li><a href="#" id="registration-button" data-toggle="modal" data-target="#registration-modal" onclick="cleanForms()"><span class="glyphicon glyphicon-pencil"></span> Register</a></li>';
            echo '</ul>';
            ?>
        </div>
    </div>
</nav>

<?php
//Creates the login- and registration modals. Only called if the user is not logged in.
if(!isset($_SESSION['id'])) generateModals();
?>

<!-- Code to handle menu highlighting. -->
<script>
    //Get name of the current page and compare it to the href attributes of the left menu fields. Highlights the field that matches.
    var pageName = document.URL.split("/");
    pageName = pageName[pageName.length-1];
    var links = $("#menu-fields a");
    links.each(function() {
        var href = this.href.split("/");
        href = href[href.length-1];
        if(pageName === href) this.parentNode.className = "active";
    });
    
    //Makes the dropdown menu field highlighted if any of its children are highlighted.
    var gameList = document.getElementById("game-list");
    var active = document.getElementsByClassName("active")[0];
    if($.contains(gameList, active))
        gameList.className += " active";
</script>

<!-- Handles clicks on the logout menu field. Makes an AJAX request to the logout script. -->
<script>
    function logout() {
        var xmlHttp = new XMLHttpRequest();
        xmlHttp.onload = function() {location.reload()}
        xmlHttp.open('GET', 'scripts/login&registration/logout.php');
        xmlHttp.send();
    }
</script>

<!-- Contains a function that will make an AJAX request when a bet is made. -->
<script src='scripts/make_bet.js'></script>

<?php
//Creates the login- and registration modals, and links to the scripts that provide their functionality. Only called if the user is not logged in.
function generateModals() {
    echo "
        <!--Login Modal-->
        <div class='modal fade' id='login-modal' tabindex='-1' role='dialog' aria-labelledby='loginHeading' aria-hidden='true'>
          <div class='modal-dialog'>
            <div class='modal-content'>
              <div class='modal-header'>
                <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                <h4 id='loginHeading' class='modal-title'>Login</h4>
              </div>
              <div class='modal-body'>
                <form id='login-form' role='form' method='post' action='scripts/login.php'>
                    <div class='form-group'>
                        <label for='login-email'>Email or Username:</label>
                        <input type='email' id='login-email' name='email' class='form-control'>
                    </div>
                    <div class='form-group'>
                        <label for='login-password'>Password:</label>
                        <input type='password' id='login-password' name='password' class='form-control'>
                    </div>
                    <div class='checkbox'>
                    <label><input type='checkbox'> Remember me</label>
                    </div>
                </form>
                <p><a href='scripts/login&registration/login_facebook.php'><img src='images/loginfacebook.png' alt='Facebook login button.'></a></p>
              </div>
              <div class='modal-footer'>
                <button type='button' class='btn btn-primary' onclick='validateLogin()'>Login</button>
                <button type='button' class='btn btn-default' data-dismiss='modal'>Cancel</button>
              </div>
            </div>
          </div>
        </div>
        
        <!--Registration Modal-->
        <div class='modal fade' id='registration-modal' tabindex='-1' role='dialog' aria-labelledby='registrationHeading' aria-hidden='true'>
          <div class='modal-dialog'>
            <div class='modal-content'>
              <div class='modal-header'>
                <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                <h4 id='registrationHeading' class='modal-title'>Register</h4>
              </div>
              <div class='modal-body'>
                <form id='registration-form' role='form' method='post'>
                    <div class='form-group'>
                        <label for='username'>Username:</label>
                        <input type='text' id='username' name='username' class='form-control' maxlength='20'>
                    </div>
                    <div class='form-group'>
                        <label for='registration-email'>Email:</label>
                        <input type='email' id='registration-email' name='email' class='form-control' maxlength='254'>
                    </div>
                    <div class='form-group'>
                        <label for='registration-password'>Password:</label>
                        <input type='password' id='registration-password' name='password' class='form-control' maxlength='255'>
                    </div>
                    <div class='form-group'>
                        <label for='confirm-password'>Confirm Password:</label>
                        <input type='password' id='confirm-password' name='confirm-password' class='form-control' maxlength='255'>
                    </div>
                    <div class='checkbox'>
                        <label><input type='checkbox' id='tos-checkbox'> I accept the <a href='#'>terms of service</a>.</label>
                    </div>
                    <div id='recaptcha1'></div>
                </form>
              </div>
              <div class='modal-footer'>
                <button type='button' class='btn btn-primary' onclick='validateRegistration();'>Register</button>
                <button type='button' class='btn btn-default' data-dismiss='modal'>Cancel</button>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Render captcha. -->
        <script>
          var recaptcha1;
          var multipleCaptcha = function() {
            //Render the recaptcha1 on the element with ID recaptcha1'
            recaptcha1 = grecaptcha.render('recaptcha1', {
              'sitekey' : '6LfzwQYTAAAAAGRb0kllCxB2qV3Jh-qPRcsU806x', 
              'theme' : 'light'
            });
          };
        </script>
        
        <!-- Contains some functions related to the creation and removal of error messages. Used by both the login- and registration validation scripts. -->
        <script src='scripts/error_functions.js'></script>
        
        <!-- Contains code to validate data sent with the login form. Passes the data on to the server if the validation is passed. -->
        <script src='scripts/login&registration/login_validation.js'></script>
        
        <!-- Contains code to validate data sent with the registration form. Passes the data on to the server if the validation is passed. -->
        <script src='scripts/login&registration/registration_validation.js'></script>
    ";
}
?>