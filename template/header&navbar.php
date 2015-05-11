<?php require_once 'scripts/init.php'; ?>

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
            <ul class="nav navbar-nav" id="left-fields">
                <li><a href="index.php">Home</a></li>
                <li class="dropdown" id="game-list">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Games<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="csgo.php">Counter-Strike: Global Offensive</a></li>
                        <li><a href="dota2.php">Dota 2</a></li>
                        <li><a href="starcraft2.php">Starcraft II</a></li>
                    </ul>
                </li>
                <li><a href="faq.php">FAQ</a></li>
                <li><a href="about.php">About Us</a></li>
            </ul>
            <?php
            //Fields on the right. Changes depending on if the user is logged in.
            echo '<ul class="nav navbar-nav navbar-right">';
            if(isset($_SESSION['username'])) echo
            '<li><a href="scripts/logout.php"> Welcome, '.$_SESSION['username'].' (log out)</a></li>';
            else echo 
            '<li><a href="#" data-toggle="modal" data-target="#login-modal"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            <li><a href="#" data-toggle="modal" data-target="#registration-modal" onclick="cleanRegistrationForm()"><span class="glyphicon glyphicon-user"></span> Register</a></li>';
            echo '</ul>';
            ?>
        </div>
    </div>
</nav>

<!--Login Modal-->
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="loginHeading" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 id="loginHeading" class="modal-title">Login</h4>
      </div>
      <div class="modal-body">
        <form id="login-form" role="form" method="post" action="scripts/login.php">
            <div class="form-group">
                <label for="login-email">Email:</label>
                <input type="email" id="login-email" name="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="login-password">Password:</label>
                <input type="password" id="login-password" name="password" class="form-control">
            </div>
            <div class="checkbox">
            <label><input type="checkbox"> Remember me</label>
            </div>
        </form>
        <p><b>Or</b> <a href="#"><img src="images/loginfacebook.png" alt="Facebook login button."></a></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="login()">Login</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>

<!--Registration Modal-->
<div class="modal fade" id="registration-modal" tabindex="-1" role="dialog" aria-labelledby="registrationHeading" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 id="registrationHeading" class="modal-title">Register</h4>
      </div>
      <div class="modal-body">
        <form id="registration-form" role="form" method="post">
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
            <div class="checkbox">
                <label><input type="checkbox" id="tos-checkbox"> I accept the <a href="#">terms of service</a>.</label>
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

<!-- Code to handle menu highlighting and login form submission. -->
<script>
    //Get name of the current page and compare it to the href attributes of the left menu fields. Highlights the field that matches.
    var pageName = document.URL.split("/");
    pageName = pageName[pageName.length-1];
    var links = $("#left-fields a");
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
    
    //Called when the login button is clicked. Simply submits the login form.
    function login() {document.getElementById("login-form").submit();}
</script>

<!-- Contains code related to validation of the registration form. -->
<script>
    function validateRegistration() {
        //Get the registration input elements.
        var username = document.getElementById("username");
        var email = document.getElementById("registration-email");
        var password = document.getElementById("registration-password");
        var confirmPassword = document.getElementById("confirm-password");
        var tosCheckbox = document.getElementById("tos-checkbox");
        var textFields = new Array(username, email, password, confirmPassword);  //Put data into an array to enable iteration.
        
        //Check for empty text fields.
        for(var i=0;i<textFields.length;i++)
            if (textFields[i].value.length === 0)
                createErrorMessage(textFields[i], "cannot be empty.");
                
        //Check if the username contains illegal characters.
        var illegalChars = /\W/;  //Allow letters, numbers, and underscores
        if (illegalChars.test(username.value)) {
            createErrorMessage(username, "contains illegal characters.");
        }
        
        //Check if the email address is incorrectly formatted or contains illegal characters.
        var emailFilter = /^[^@]+@[^@.]+\.[^@]*\w\w$/;
        var illegalChars= /[\(\)\<\>\,\;\:\\\"\[\]]/;
        if(email.value.length > 0 && (!emailFilter.test(email.value) || email.value.match(illegalChars)))
            createErrorMessage(email, "invalid email address.");
        
        //Check password length.
        if (password.value.length < 6 && password.value.length > 0)
            createErrorMessage(password, "cannot be shorter than 6 characters.");
            
        //Check if confirm password matches.
        if(confirmPassword.value != password.value)
            createErrorMessage(confirmPassword, "does not match.");
        
        //Check if the terms of service have been accepted.
        if(tosCheckbox.checked === false)
            if (tosCheckbox.parentNode.getElementsByClassName("error-message")[0] === undefined)
                tosCheckbox.parentNode.innerHTML += " <span class='error-message' style='color:red'><strong>You have to accept the terms.</strong></span>";
        
        if($("#registration-form .error-message").size() == 0) {
            alert("Registration successful.");
            sleep(500);
            document.getElementById("registration-form").submit();
        }
        else removeErrorsOnFocus();
    }
    
    //Inserts the specified error message into the specified input element's label.
    function createErrorMessage(inputElement, message) {
        var parent = inputElement.parentNode;
        var errorSpan = parent.getElementsByTagName("span")[0];
        if(errorSpan == null || errorSpan.innerHTML != message) {
            if (errorSpan != null) errorSpan.innerHTML = message;
            else {
                parent.className += " has-error has-feedback";
                var newChild = document.createElement("span");
                newChild.className = "glyphicon glyphicon-remove form-control-feedback";
                parent.appendChild(newChild);
                parent.childNodes[1].innerHTML += " <span class='error-message' style='color:red'>" + message + "</span>";
            }
        }
    }
    
    //Removes errors related to an input element when it gets focused.
    function removeErrorsOnFocus() {
        var inputElements = $("#registration-form input");
        inputElements.each(function() {
            this.onfocus = function() {
                this.parentNode.getElementsByClassName("error-message")[0].remove();
                if(this.type != "checkbox") {
                    this.parentNode.getElementsByClassName("glyphicon")[0].remove();
                    this.parentNode.className = "form-group";
                }
            }
        });
    }

    //Empties input elements and removes errors upon opening the registration form. This is for when the modal is closed and reopened.
    function cleanRegistrationForm() {
        $(".error-message").remove();
        $(".form-group .glyphicon").remove();
        $(".form-group").each(function() {this.className = "form-group";})
        $("#tos-checkbox")[0].checked = false;
    }
    
    //Simulates sleeping the current thread.
    function sleep(milliseconds) {
        var start = new Date().getTime();
        for (var i = 0; i < 1e7; i++) {
          if ((new Date().getTime() - start) > milliseconds){
            break;
          }
        }
    }
</script>

<?php
//Creates a new user with the registration data. Only run if the data passed the validation.
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

