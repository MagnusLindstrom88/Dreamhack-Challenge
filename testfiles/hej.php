<?php $fh = fopen($path, 'r') or die('Could not open file'); ?>

<script>
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.open("POST", "skript.php");
    xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlHttp.send("test="+"hello ");
    
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.open("POST", "log.html");
    xmlHttp.onload = function() {
        alert(xmlHttp.responseText);
    }
    xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlHttp.send();
</script>
