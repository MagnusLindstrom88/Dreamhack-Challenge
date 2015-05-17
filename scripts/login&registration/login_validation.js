function validateLogin() {
    //Get the login input elements.
    var email = document.getElementById("login-email");
    var password = document.getElementById("login-password");
    
    //Check for empty text fields.
    if(email.value.length === 0) createErrorMessage(email, "cannot be empty.");
    if(password.value.length === 0) createErrorMessage(password, "cannot be empty.");
    
    //Check if the email is registered and if the password is correct. An AJAX request is need to do this.
    
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.onload = function() {
        if (email.value.length > 0 && xmlHttp.responseText.search("email found") == -1)
            createErrorMessage(email, "not registered.");
        if (password.value.length > 0 && xmlHttp.responseText.search("password found") == -1)
            createErrorMessage(password, "not valid.");
    }
    xmlHttp.open("POST", "scripts/login&registration/check_data_exists.php", false);
    xmlHttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlHttp.send("email="+email.value+"&password="+password.value+"&from=login");
    
    //Check if the validation was passed.
    if($("#login-form .error-message").size() == 0) {
        //Use AJAX to handle the login server-side without reloading the page.
        xmlHttp.onload = function() {
            cleanForms();
            window.location = "index.php";
        }
        xmlHttp.open("POST", "scripts/login&registration/login.php");
        xmlHttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlHttp.send("email="+email.value+"&password="+password.value);
    }
    else removeErrorsOnFocus();
}