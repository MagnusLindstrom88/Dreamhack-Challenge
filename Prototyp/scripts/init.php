<?php
session_start();
try {$db = new PDO('mysql:host=127.0.0.1;dbname=dreamhack_challenge', 'root', 'admin');}
catch(PDOException $e) {echo $e->getMessage();}