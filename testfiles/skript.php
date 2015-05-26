<?php
$message = $_POST['test'];
$log = fopen("log.html", "a");
fwrite($log, "<div>{$message}</div>");
fclose($log);


