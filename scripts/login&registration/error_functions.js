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
    var inputElements = $("#registration-form input, #login-form input, #contact-form input, #contact-form textarea");
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
function cleanForms() {
    $("#login-form input").each(function() {this.value = "";});
    $("#registration-form input").each(function() {this.value = "";});
    $("#contact-form input").each(function() {this.value = "";});
    $("#contact-form textarea").each(function() {this.value = "";});
    $(".error-message").remove();
    $(".form-group .glyphicon").remove();
    $(".form-group").each(function() {this.className = "form-group";})
    $("#tos-checkbox")[0].checked = false;
}