// skickar data till för att registrera bets och ändrar färgen på knappen som trycktes.
   
      function makeBet(btn){
      
     var jax = new XMLHttpRequest();
     var url = "scripts/make_bet.php";
     var team = btn.value;
     var matchen = $(btn).closest("div").attr("id");
     var data = "team="+team+"&matchen="+matchen;
     
    jax.open("POST",url,true)
    jax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
   
    jax.onreadystatechange = function(){
      if (jax.readyState == 4 && jax.status == 200) {
                var return_data = jax.responseText;
                    
                    if (return_data == "a") {
                  
                    $(btn).removeClass().addClass("btn btn-info");
                  }
                  if (return_data == "c") {
                    $(btn).removeClass().addClass("btn btn-success");
                  }
                  if (return_data == "x") {
                    alert("You need to login to make a bet");
                  }
                  
      }
    }
    jax.send(data);
     }
  //  kollar vilka bets som har gjorts och ändrar färgen på de knappar som har bets registrerade- !EJ FÄRDIG!
     
     function showBet(){
  
  var buttons = document.getElementsByClassName("btn btn-info");
    for (var i = 0; i < buttons.length; i++) {
    
    var button = buttons[i];
    console.log(buttons);
    var jax = new XMLHttpRequest();
    var url = "scripts/checkbet.php";
    var matchen = $(button).closest("div").attr("id");
    console.log(matchen);
    var team = button.value;
    console.log(team);
    var data = "team="+team+"&matchen="+matchen;
    console.log(data);
    
    jax.open("POST",url,true)
    jax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    jax.onreadystatechange = function(matchen){
      if (jax.readyState == 4 && jax.status == 200) {
                 var returnD = jax.responseText;
                 console.log(returnD);
            
                 
                  if (returnD == "a") {
                    $(button).removeClass().addClass("btn btn-success");
                    
                  }
                  if (returnD == "b") {
                    
                  }
                  if (returnD == "x") {
                    return;
                    
                  }
      }
    }
    jax.send(data);
     }
     }
