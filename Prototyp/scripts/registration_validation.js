//Work in progress.
function validateRegistration() {
    var username = document.getElementById("username").value;
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var confirmPassword = document.getElementById("confirm-password").value;
    
    if (username.length === 0) {
        var parent = document.getElementById("username").parentNode;
        parent.className += " has-error has-feedback";
        parent.innerHTML += "<span class='glyphicon glyphicon-remove form-control-feedback'></span>";
        parent.childNodes[1].innerHTML += " <span style='color:red'>cannot be empty.</span>";
    }
    else document.getElementById("registration-form").submit();
}