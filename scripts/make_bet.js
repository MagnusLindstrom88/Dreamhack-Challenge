//Skickar data till för att registrera bets och ändrar färgen på knappen som trycktes.
function makeBet(btn){
    var jax = new XMLHttpRequest();
    var team = btn.getAttribute("id");
    var match = btn.parentNode.getAttribute("id");
    
    jax.open("POST", "scripts/make_bet.php", true)
    jax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    
    jax.onload = function() {
        var return_data = jax.responseText;
        
        if (return_data === "a")
          $(btn).removeClass().addClass("btn btn-info");
        if (return_data === "c")
            $(btn).removeClass().addClass("btn btn-success");
        if (return_data === "x")
            alert("You must be logged in to make a bet.");
    }
    jax.send("team="+team+"&match="+match);
}