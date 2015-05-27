<?php
$fh = fopen("log.html", 'a') or die('Could not open file');
fwrite($fh, "Hello") or die('Could not open file');
fclose($fh) or die('Could not open file');
?>

<script>
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.open("POST", "log.html");
    xmlHttp.onload = function() {
        alert(xmlHttp.responseText);
    }
    xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlHttp.send();
</script>