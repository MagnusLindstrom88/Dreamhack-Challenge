<?php
session_start();
try{$db = new PDO("mysql:host=mysql.dsv.su.se;dbname=sewa2700", "sewa2700", "eequishusaiz");}
catch(PDOException $e) {echo $e->getMessage();}