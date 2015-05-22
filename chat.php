<?php

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

		$sql = "SELECT users.id, users.username, users.profilepic, comments.userid, comments.comment
				FROM users, comments 
				WHERE users.id = comments.userid";
	
	
$result = $conn->query($sql);
		
echo $result->num_rows;
if ($result->num_rows > 0) {
    // output data of each row
	
	echo '<table width="100%" border="1" cellpadding="0" cellspacing="0">';
    while($row = $result->fetch_assoc()) {
	
		echo '<tr>
			<th width="33%" align="left" height="20" scope="col"><a href="#">'. $row["users.username"] .'</a></th>	
			<th width="66%" align="left" height="20" scope="col">'. $row["comments.comment"] .'</th>		
			</tr>';
	}
	echo '</table>';	
} else {
    echo "0 results";
}
$conn->close();
?> 