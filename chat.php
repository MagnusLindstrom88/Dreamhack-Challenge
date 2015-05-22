<?php

$servername = "mysql.dsv.su.se";
$username = "sewa2700";
$password = "eequishusaiz";
$dbname = "sewa2700";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection

if (isset($_POST['comment']))
{
	if(mysql_query("INSERT INTO comments VALUES ($_SESSION['id']), $_POST['comment']))"))
        {

        }
        else echo "Error, in mysql query";  
}

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

		$sql = "SELECT comment, username, userid, users.id
				FROM comments, users
				WHERE userid = users.id";
	
	
$result = $conn->query($sql);
		
echo '<form action="" method="post">
      <textarea name="comment"></textarea>
      <input type="submit" />
      </form>';
	  
if ($result->num_rows > 0) {
    // output data of each row
	
	echo '<table width="100%" border="1" cellpadding="0" cellspacing="0">';
    while($row = $result->fetch_assoc()) {
	
		echo '<tr>
			<th width="33%" align="left" height="20" scope="col"><a href="#">'. $row["username"] .'</a></th>	
			<th width="66%" align="left" height="20" scope="col">'. $row["comment"] .'</th>		
			</tr>';
	}
	echo '</table>';	
} else {
    echo "0 results";
}
$conn->close();


?> 

