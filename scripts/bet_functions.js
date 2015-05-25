// skickar data till för att registrera bets och ändrar färgen på knappen som trycktes.
      session_start();
      
      function makeBet(btn){
      
      if(!isset($_SESSION['id']) && !empty($_SESSION['id'])) {
      echo 'Du måste logga in för att kunna lägga ett bet';
      }

     var jax = new XMLHttpRequest();
     var url = "scripts/make_bet.php";
     var team = btn.value;
      console.log(team);
     var matchen = $(btn).closest("div").attr("id");
      console.log(matchen);
     var data = "team="+team+"&matchen="+matchen;
      console.log(data);
       
    jax.open("POST",url,true)
    jax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
   
    jax.onreadystatechange = function(){
      if (jax.readyState == 4 && jax.status == 200) {
                var return_data = jax.responseText;
                    
                    if (return_data == "a") {
                  
                    $(btn).removeClass().addClass("btn btn-primary");
                  }
                  if (return_data == "c") {
                    $(btn).removeClass().addClass("btn btn-success");
                  }
                  
      }
    }
    jax.send(data);
     }
  //  kollar vilka bets som har gjorts och ändrar färgen på de knappar som har bets registrerade- !EJ FÄRDIG!
     
     function showBet(){
      
  
    var jax = new XMLHttpRequest();
    var url = "checkbet.PHP";
    var matchen = document.getElementById("Match1").value;
    var data = "matchen="+matchen;
    
    
    jax.open("POST",url,true)
    jax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    jax.onreadystatechange = function(matchen){
      if (jax.readyState == 4 && jax.status == 200) {
                 var returnD = jax.responseText;
              
            
                 
                  if (returnD == "a") {
                  
                    $("div[id=1] > button:last-child").removeClass().addClass("btn btn-danger");
                    
                  }
                  if (returnD == "b") {
                    $("div[id=1] > button:first-child").removeClass().addClass("btn btn-danger");
                  }
                  if (returnD == "c") {
                    $("div[id=1] > button").removeClass().addClass("btn btn-primary");
                  }
      }
    }
    jax.send(data);
     }
