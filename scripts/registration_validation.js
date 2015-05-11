/*This file contains code for validating registrations on the client-side. Passes the data on to the server for a double-check
 *if the validation is passed. Handles the creation and removal of error messages in the form.*/

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
    
    //Check if the validation was passed.
    if($("#registration-form .error-message").size() == 0) {
        //Use AJAX to handle the registration server-side without reloading the page.
        xmlHttp = new XMLHttpRequest();
        xmlHttp.onload = function() {
            cleanRegistrationForm();
            alert(xmlHttp.responseText);
        }
        xmlHttp.open("POST", "scripts/registration_handling.php");
        xmlHttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlHttp.send("username="+username.value+"&email="+email.value+"&password="+password.value+"&confirm-password="+confirmPassword.value);
        
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
    $("#registration-form input").each(function() {this.value = "";});
    $(".error-message").remove();
    $(".form-group .glyphicon").remove();
    $(".form-group").each(function() {this.className = "form-group";})
    $("#tos-checkbox")[0].checked = false;
}