<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once 'template/head.php'; ?>
    <?php if(!isset($_SESSION['id'])) header("location: index.php"); ?>
    <style>
        #edit-account-modal {color: black;}
    </style>
</head>
<body>
    <?php require_once 'template/header&navbar.php'; ?>
    <div id="wrapper">
	<div class="container">
	<?php
	global $db;
	$matches = $db->query(	"SELECT *
				FROM matches, bets, users
				WHERE matches.id = bets.match_id
				AND bets.user_id = users.id
				");
    	foreach($matches as $row) {
     		echo $row[users.id];
	}
	?>
        </div>      	
  </div>
  <?php require_once 'template/footer.php'; ?>
</body>
</html>

