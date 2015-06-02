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
			<?php generateBoxesAccount(); ?>
           </div>      	
        
  </div>
  <?php require_once 'template/footer.php'; ?>
</body>
</html>

<?php
function generateBoxesAccount() {
    global $db;
    $matches = $db->query(	"SELECT *
				FROM matches, bets, users
				WHERE matches.id = bets.match_id
				AND bets.user_id = users.id
				AND matches.game = "CS:GO"
				AND users.id = "10206612626732341"
				LIMIT 0 , 30");
    foreach($matches as $row) {
     echo $row;
    }
}
?>
