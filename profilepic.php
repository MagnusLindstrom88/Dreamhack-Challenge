<?php
$servername = "mysql.dsv.su.se";
$username = "sewa2700";
$password = "eequishusaiz";
$dbname = "sewa2700";
$conn_error = "Could not connect";




		if(isset($_POST['submit'])){
				move_uploaded_file($_FILES['file']['tmp_name'],"profile_pic/".$_FILES['file']['name']);
				/*function check_file_uploaded_name (){
				(bool) ((preg_match("`^[-0-9A-Z_\.]+$`i",$filename)) ? true : false);
				}*/
				$con = mysqli_connect($servername,$username,$password,$dbname);
				$q = mysqli_query($con,"UPDATE users SET profile_pic = '".$_FILES['file']['name']."' WHERE username = '".$_SESSION['username']."'");
		}

		$conn = mysqli_connect($servername,$username,$password,$dbname);
		$q = mysqli_query($conn,"SELECT * FROM users");
		while($row = mysqli_fetch_assoc($q)) {
			if($row['username'] == $_SESSION['username']){
				
				if ($row['profile_pic'] != NULL) {
					$image = $row['profile_pic'];
				} else {
					$image = "nopic.jpg";
				}
			
				echo "
                	<div class='container'>
					<h3 id='profilepic'> <font color='white'> Profile Picture </h3>
					<div class='row'>
					<div class='col-xs-6 col-sm-3'>
					<a href='#' class='thumbnail'>
					<img src='/profile_pic/". $image ."' alt='Profile Pic'>
					</a>
					</div>
					";
			}
		}
		
		echo "
			<button id= "take-picture" type="edit" class="btn btn-default">Take A New Profile Picture</button>
			<form action="" method="post" enctype="multipart/form-data">
                        <input type="file" name="file">
                        <input type="submit" name="submit">
            </form>
			";
	?>
   	<script>
	if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
		(function () {
		var takePicture = document.querySelector("#take-picture");
			showPicture = document.querySelector("#profilepic");

			if (takePicture && showPicture) {
				takePicture.onchange = function (event) {
					var files = event.target.files,
						file;
					if (files && files.length > 0) {
						file = files[0];
						try {
							var URL = window.URL || window.webkitURL;
							var imgURL = URL.createObjectURL(file);
							showPicture.src = imgURL;
							URL.revokeObjectURL(imgURL);
						}
						catch (e) {
							try {
								var fileReader = new FileReader();
								fileReader.onload = function (event) {
									showPicture.src = event.target.result;
								};
								fileReader.readAsDataURL(file);
							}
							catch (e) {
								var error = document.querySelector("#error");
								if (error) {
									error.innerHTML = "Neither createObjectURL or FileReader are supported";
								}
							}
						}
					}
				};
			}
		})();
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

