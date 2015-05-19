function validateLogin() {
    //Get the login input elements.
    var emailOrUsername = document.getElementById("login-email");
    var password = document.getElementById("login-password");
    var verified = true;  //Set to false later if the user's account is not verified through email.
    
    //Check for empty text fields.
    if(emailOrUsername.value.length === 0) createErrorMessage(emailOrUsername, "cannot be empty.");
    if(password.value.length === 0) createErrorMessage(password, "cannot be empty.");
    
    //Check if the email is registered and if the password is correct. An AJAX request is need to do this.
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.onload = function() {
        if (emailOrUsername.value.length > 0 && xmlHttp.responseText.search("email or username found") == -1)
            createErrorMessage(emailOrUsername, "not registered.");
        if (password.value.length > 0 && xmlHttp.responseText.search("password found") == -1)
            createErrorMessage(password, "incorrect.");
        if(xmlHttp.responseText.search("not verified") != -1) {
            verified = false;
            alert("You account is not verified, a confirmation message has been sent to your email.");
        }
    }
    xmlHttp.open("POST", "scripts/login&registration/check_data_exists.php", false);
    xmlHttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlHttp.send("emailorusername="+emailOrUsername.value+"&password="+password.value+"&from=login");
    
    //Check if the validation was passed.
    if(verified && $("#login-form .error-message").size() == 0) {
        //Use AJAX to handle the login server-side without reloading the page.
        xmlHttp.onload = function() {
            cleanForms();
            location.reload();
        }
        xmlHttp.open("POST", "scripts/login&registration/login.php");
        xmlHttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlHttp.send("emailorusername="+emailOrUsername.value+"&password="+password.value);
    }
    else removeErrorsOnFocus();
}