<?php
$fh = fopen("log.html", 'r') or die('Could not open file');
fwrite($fh, "Hello");
fclose($fh);
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
