//Called when a betting button is clicked.
function makeBet(btn){
    var team = btn.getAttribute("id");
    var match = btn.parentNode.getAttribute("id");
    
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.open("POST", "scripts/make_bet.php", true)
    xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    
    xmlHttp.onload = function() {
        var return_data = xmlHttp.responseText;
        
        if (return_data === "a")
          $(btn).removeClass().addClass("btn btn-info");
        if (return_data === "c")
            $(btn).removeClass().addClass("btn btn-success");
        if (return_data === "x")
            alert("You must be logged in to make a bet.");
    }
    xmlHttp.send("team="+team+"&match="+match);
}