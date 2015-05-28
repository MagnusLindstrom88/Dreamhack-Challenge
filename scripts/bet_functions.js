//Skickar data till för att registrera bets och ändrar färgen på knappen som trycktes.
function makeBet(btn){
    var jax = new XMLHttpRequest();
    var team = btn.getAttribute("id");
    var matchen = btn.parentNode.getAttribute("id");
    
    jax.open("POST", "scripts/make_bet.php", true)
    jax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    
    jax.onload = function() {
        var return_data = jax.responseText;
        
        if (return_data == "a")
          $(btn).removeClass().addClass("btn btn-info");
        if (return_data == "c")
            $(btn).removeClass().addClass("btn btn-success");
        if (return_data == "x")
            alert("You must be logged in to make a bet.");
    }
    jax.send("team="+team+"&matchen="+matchen);
}

//Kollar vilka bets som har gjorts och ändrar färgen på de knappar som har bets registrerade.
function showBet() {
    var buttons = document.getElementsByClassName("btn btn-info");
    for(var i = 0; i < buttons.length; i++)
        get(buttons[i]);
}

function get(button){
    var jax = new XMLHttpRequest();
    var url = "scripts/check_bet.php";
    var team = button.id;
    var matchen = button.parentNode.getAttribute("id");
    var data = "team="+team+"&matchen="+matchen;
    
    jax.open("POST",url,true)
    jax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    jax.onload = function() {
        if (jax.responseText == "a")
        $(button).removeClass().addClass("btn btn-success");
    }
    jax.send(data);
}
     
