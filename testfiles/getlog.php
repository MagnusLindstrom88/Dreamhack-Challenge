<?php
$path = "http://www.avetian.se/skola/chatlog.txt";
$fh = fopen($path, 'r') or die('Could not open file');
echo fread($fh, 102400);
fclose($fh);