<?php session_start();
	$_SESSION['username'] = "placeholder";
?>

<?php
	if(isset($_POST['submit'])){
		move_uploaded_file($_FILES['file']['temp_name'],"images/".$_FILES['file']['name']);
		$con = mysqli_connect("placerholder"); /* plats i databas */
		$q = mysqli_query($con,"UPDATE users SET image = '".$_FILES['file']['name']."' WHERE username = '".$_SESSION['username']."'");
	}
?>

<!DOCTYPE html>
<html>
	<head>
	
	</head>
	<body>
		<form action="" method="post" enctype="multipart/form-data">
			<input type="file" name="file">
			<input type="button" name="Take Picture" id="take-picture" accept="image/*">
			<input type="image" id="show-picture" accept="/image/*">
			<input type="submit" name="submit">
		</form>
		
		
		<?php
			$con = mysqli_connect("placeholder"); /*plats i databas*/
			$q = mysqli_query($con,"SELECT * FROM users");
			while($row = mysqli_fetch_assoc($q)){
				echo $row['username'];
				if($row['image'] == ""){
					echo "<img width='100' height='100' src='default.jpg' alt='Default profile pic>";
				} else {
					echo "<img width='100' height='100' src='pictures/".$row['image']."' alt='Profile Pic'>";
				}
				echo "<br>";
			}
		?>
	</body>

	<script>
	if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
		var takePicture = document.querySelector("#take-picture");
			takePicture.onchange = function (event) {
		var files = event.target.files,
			file;
		if (files && files.length > 0) {
			file = files[0];
			}
		}
		var showPicture = document.querySelector("#show-picture");
	}else{
		$("#camera").webcam({
		width: 320,
		height: 240,
		mode: "callback",
		onCapture: function () {
			webcam.save();
			}
		}) 
	};
	</script>
	

</html>
