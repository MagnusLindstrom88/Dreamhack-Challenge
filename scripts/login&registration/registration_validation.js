function validateRegistration() {
    //Get the registration input elements.
    var username = document.getElementById("username");
    var email = document.getElementById("registration-email");
    var password = document.getElementById("registration-password");
    var confirmPassword = document.getElementById("confirm-password");
    var tosCheckbox = document.getElementById("tos-checkbox");
    var captcha = grecaptcha.getResponse();
    var textFields = [username, email, password, confirmPassword];  //Put data into an array to enable iteration.
    
    //Check for empty text fields.
    for(var i=0; i<textFields.length; i++)
        if (textFields[i].value.length === 0)
            createErrorMessage(textFields[i], "cannot be empty.");
            
    //Check if the username contains illegal characters.
    var illegalChars = /\W/;  //Allow letters, numbers, and underscores
    if (illegalChars.test(username.value)) {
        createErrorMessage(username, "contains illegal characters.");
    }
    
    //Check if the email address is incorrectly formatted or contains illegal characters.
    var emailFilter = /^[^@]+@[^@.]+\.[^@]*\w\w$/;
    var illegalChars = /[\(\)\<\>\,\;\:\\\"\[\]]/;
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
    
    //Check if the captcha was passed.
    if ($(".captcha-error").size() != 0) $(".captcha-error").remove();
    if(captcha.length === 0 && $(".captcha-error").size() === 0) {
        var error = document.createElement("strong");
        error.className = "error-message captcha-error";
        error.style.color = "red";
        error.appendChild(document.createTextNode("This box has to be checked."));
        document.getElementById("registration-form").insertBefore(error, document.getElementsByClassName("g-recaptcha")[0]);
    }
    
    //Check if username or email is already taken. An AJAX request is need to do this.
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.onload = function() {
        if (xmlHttp.responseText.search("username found") !== -1)
            createErrorMessage(username, "already taken.");
        if (xmlHttp.responseText.search("email found") !== -1)
            createErrorMessage(email, "already registered.");
    }
    xmlHttp.open("POST", "scripts/login&registration/check_data_exists.php", false);
    xmlHttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlHttp.send("username="+username.value+"&email="+email.value+"&from=registration");
    
    //Check if the validation was passed.
    if($("#registration-form .error-message").size() === 0) {
        //Use AJAX to handle the registration server-side without reloading the page.
        xmlHttp.onload = function() {
            alert(xmlHttp.responseText);
            if(xmlHttp.responseText.search("successful") !== -1) {location.reload();}
        }
        xmlHttp.open("POST", "scripts/login&registration/register.php");
        xmlHttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlHttp.send("username="+username.value+"&email="+email.value+"&password="+password.value+"&confirm-password="+confirmPassword.value+"&g-recaptcha-response="+captcha);
    }
    else removeErrorsOnFocus();
}
