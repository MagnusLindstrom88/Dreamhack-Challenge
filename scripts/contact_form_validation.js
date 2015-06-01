function validateForm() {
    alert("Hello world1");
    //Get the contact input elements.
    var name = document.getElementById("name");
    var email = document.getElementById("contact-email");
    var message = document.getElementById("message");
    var captcha = grecaptcha.getResponse("recaptcha2");
    var textFields = [name, email, message];  //Put data into an array to enable iteration.
    
    alert("Hello world2");
    //Check for empty text fields.
    for(var i=0; i<textFields.length; i++)
        if (textFields[i].value.length === 0)
            createErrorMessage(textFields[i], "cannot be empty.");
    
    alert("Hello world3");            
    //Check if the email address is incorrectly formatted or contains illegal characters.
    var emailFilter = /^[^@]+@[^@.]+\.[^@]*\w\w$/;
    var illegalChars = /[\(\)\<\>\,\;\:\\\"\[\]]/;
    if(email.value.length > 0 && (!emailFilter.test(email.value) || email.value.match(illegalChars)))
        createErrorMessage(email, "invalid email address.");
    
    alert("Hello world4");
    //Check if the captcha was passed.
    if ($(".captcha-error").size() != 0) $(".captcha-error").remove();
    if(captcha.length === 0 && $(".captcha-error").size() === 0) {
        var error = document.createElement("strong");
        error.className = "error-message captcha-error";
        error.style.color = "red";
        error.appendChild(document.createTextNode("This box has to be checked."));
        document.getElementById("contact-form").insertBefore(error, document.getElementsByClassName("g-recaptcha")[0]);
    }
    alert("Hello world5");
    var xmlHttp = new XMLHttpRequest();
    //Check if the validation was passed.
    if($("#contact-form .error-message").size() === 0) {
        //Use AJAX to handle the registration server-side without reloading the page.
        xmlHttp.onload = function() {
            alert(xmlHttp.responseText);
            if(xmlHttp.responseText.search("successful") !== -1) {location.reload();}
        }
        xmlHttp.open("POST", "scripts/send_mail.php");
        xmlHttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlHttp.send("name="+name.value+"&email="+email.value+"&message="+message.value+"&g-recaptcha-response="+captcha);
    }
    else removeErrorsOnFocus();
}