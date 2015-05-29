<?php
session_start();
	

	if(isset($_POST['submit'])){
		$target_dir = "uploads/";
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
			  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		 if($check !== false) {
        		echo "File is an image - " . $check["mime"] . ".";
        		$uploadOk = 1;
		 } else {
			  echo "File is not an image.";
        		$uploadOk = 0;
		 	}
		}
		// Check if file already exists
		if (file_exists($target_file)) {
			 echo "Sorry, file already exists.";
			 $uploadOk = 0;
		}
		// Check file size
		if ($_FILES["fileToUpload"]["size"] > 500000) {
			  echo "Sorry, your file is too large.";
			 $uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
			  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			 $uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		  echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
		 if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			 echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		 } else {
			 echo "Sorry, there was an error uploading your file.";
    			}
		}
	}
	
	foreach(glob('profile_pic/*_*') as $filename){
		echo $filename
	}

	if $filename != NULL) {
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
			<img src='$image' alt='Profile Pic'>
			</a>
			</div>
		";
		
		echo "
			<button id='take-picture' type='edit' class='btn btn-default'>Take A New Profile Picture</button>
			<form action='' method='post' enctype='multipart/form-data'>
                        <input type='file' name='file'>
                        <input type='submit' name='submit'>
			";
?>
<script>
	if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
		(function () {
		var takePicture = document.querySelector("#take-picture");
		var showPicture = document.querySelector("#profilepic");
		
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
			}catch (e) {
					try {
						var fileReader = new FileReader();
						fileReader.onload = function (event) {
						showPicture.src = event.target.result;
						};
					fileReader.readAsDataURL(file);
					}catch (e) {
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

