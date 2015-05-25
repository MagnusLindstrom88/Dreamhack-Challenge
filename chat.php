<?php
session_start();

$servername = "mysql.dsv.su.se";
$username = "sewa2700";
$password = "eequishusaiz";
$dbname = "sewa2700";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//If comment is posted
if (isset($_POST['comment'])) {
		$sql_insert = "INSERT INTO comments VALUES ".($_SESSION['id'].",". $_POST['comment']).")";
		$conn->query($sql_insert);
}

// SQL för att visa kommentarer
		$sql = "SELECT comment, username, userid, users.id
				FROM comments, users
				WHERE userid = users.id";
	
		$result = $conn->query($sql);
		
//Form för att posta nya kommentarers

if (isset($_SESSION['id'])) {
	echo '<form action="" method="post">
		  <textarea name="comment"></textarea>
		  <input type="submit" />
		  </form>';
} else  { 
	echo "Log in to chat.";
}


	  
if ($result->num_rows > 0) {
	echo '<table width="100%" border="1" cellpadding="0" cellspacing="0">';
	
	// output data of each row
    while($row = $result->fetch_assoc()) {
	
		echo '<tr>
			<th width="33%" align="left" height="20" scope="col"><a href="#">'. $row["username"] .'</a></th>	
			<th width="66%" align="left" height="20" scope="col">'. $row["comment"] .'</th>		
			</tr>';
	}
	
	echo '</table>';	
}
$conn->close();
?> 

