<?php
session_start();

$servername = "mysql.dsv.su.se";
$username = "sewa2700";
$password = "eequishusaiz";
$dbname = "sewa2700";
$conn_error = "Could not connect";


if(isset($_POST['submit'])){
		move_uploaded_file($_FILES['file']['tmp_name'],"profile_pic/".$_FILES['file']['name']);
		function check_file_uploaded_name ($filename){
		(bool) ((preg_match("`^[-0-9A-Z_\.]+$`i",$filename)) ? true : false);
		}
		$con = mysqli_connect($servername,$username,$password,$dbname);
		$q = mysqli_query($con,"UPDATE users SET profile_pic = '".$_FILES['file']['name']."' WHERE username = '".$_SESSION['username']."'");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Prototyp</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
        
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    
    <link rel="stylesheet" href="CSS.css">
        <link href="http://s3.amazonaws.com/codecademy-content/courses/ltp/css/shift.css" rel="stylesheet">
    
    <style></style>
</head>

<body>
    <!--Header-->
    <header class="container">
        <a href="index.html"><img src="Logo.png" alt="Logo" style="width:300px"/></a>
    </header>
    
    <!--Navigation bar-->
    <nav id="navbar" class="navbar navbar-default">
        <div class="container">
            <!--The toggle button for collapsed menu.-->
            <button class="navbar-toggle" data-toggle="collapse" data-target="#menuFields">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!--The brand on the leftmost side.-->
            <div class="navbar-header">
                <a class="navbar-brand">Navigation</a>
            </div>

            <!--The menu fields. Will be collapsed on small screens.-->
            <div class="collapse navbar-collapse" id="menuFields">
                <!--Fields on the left.-->
                <ul class="nav navbar-nav">
                    <li><a href="#">Home</a></li>
                    <li class="active" "dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Games<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="csgo.html">Counter-Strike: Global Offensive</a></li>
                            <li><a href="dota2.html">Dota 2</a></li>
                            <li class="active"><a href="#">Starcraft II</a></li>
                        </ul>
                    </li>
                    <li><a href="#">About</a></li>
                </ul>
                <!--Fields on the right.-->
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-user"></span> Register</a></li>
					<li><a href="#"><span class="glyphicon glyphicon-user"></span> My Account</a></li>
                </ul>
            </div>
        </div>
    </nav>
    
    <!--Main image-->
	</br>
	
	<div>
		<div class="container">
		<header>
		 <div class="col-sm-"> </div>
			 <h1>  <font color="white"> Manage Account </font> </h1> 
				<p><div class="col-sm-0"> </div> <font color="white"> On this page you can manage your personal user account information,
				for example edit or update information about yourself. You can also see your previously betted games.  </font> <p/> 
	 </div>
		<header/>
		
	</div>
	</br>
	
	

	<?php
		$conn = mysqli_connect($servername,$username,$password,$dbname);
		$q = mysqli_query($conn,"SELECT * FROM users");
		while($row = mysqli_fetch_assoc($q)){
				if($row['profle_pic'] == ""){
						echo "
							<div class='container'>
							<h3 id='profilepic'> <font color='white'> Profile Picture </h3>
							<div class='row'>
							<div class='col-xs-6 col-sm-3'>
								<a href='#' class='thumbnail'>
									<img src="images/Cantona.jpg" alt='...'>
								</a>
							</div>
							";
				} else {
						echo 
						"
                        	<div class='container'>
							<h3 id='profilepic'> <font color='white'> Profile Picture </h3>
							<div class='row'>
							<div class='col-xs-6 col-sm-3'>
								<a href='#' class='thumbnail'>
									<src='pictures/".$row['profile_pic']."' alt='Profile Pic'>
								</a>
						</div>
                        ";
				}
				echo "<br>";
		}
    ?>
	
	</div class="container">
			 
			<button id= "take-picture" type="edit" class="btn btn-default">Take A New Profile Picture</button>
			<br/>
			<br/>
			<form action="" method="post" enctype="multipart/form-data">
                        <input type="file" name="file">
                        <input type="submit" name="submit">
            </form>
		<br/>
		 <br/>	
  </div>
	
	
	<div class="container">
		<div class="row">
		   <div class="col-md-7">  <h3> <font color="white"> User Information </h3>
			  
			  <br/>
			  
			  
			  
			  <button type="edit" class="btn btn-default">Edit</button>
			  <p2> <font color="white"> Click the Edit button in order to make changes in your user profile. </p2>
			  
			  <br/>
			  <br/>
			  
			  <form role="form"> <div class="col-sm-0"></div>
			  
			  <div class="col-sm-8">
				
				<div class="form-group">
				  <label for="email">User Name:</label>
				  <input type="email" class="form-control" id="email" placeholder="Enter a User Name">
				</div>
				
				<div class="form-group">
				  <label for="email">E-mail:</label>
				  <input type="email" class="form-control" id="email" placeholder="Enter E-mail">
				</div>
				
				<div class="form-group">
				  <label for="pwd">Password:</label>
				  <input type="password" class="form-control" id="pwd" placeholder="Enter password">
				</div>
				
				<div class="form-group">
				  <label for="pwd">Confirm Password:</label>
				  <input type="password" class="form-control" id="pwd" placeholder="Confrim Password">
				</div>
				 
				 <div class="checkbox">
						<label><input type="checkbox" id="tos-checkbox"> I accept the <a href="#">terms of service</a>.</label>
					</div>
				 <div class="g-recaptcha" data-sitekey="6LfzwQYTAAAAAGRb0kllCxB2qV3Jh-qPRcsU806x"></div>
				<button type="submit" class="btn btn-default">Submit</button>
			  </form>
			  </div></div>
			  
				<br/>
				
		
		  <div class="col-lg-5"> <h3> <font color="white"> Betting History </h3> <p> Previously betted games </p> </div>
				<div class="col-md-4">
					<ul class="list-group">
						   <a href="#" class="list-group-item list-group-item-success"> Dapibus ac facilisis in</a> 
						  <a href="#" class="list-group-item list-group-item-danger">Vestibulum at eros</a>
						   <a href="#" class="list-group-item list-group-item-success">Dapibus ac facilisis in</a>
						   <a href="#" class="list-group-item list-group-item-success">Dapibus ac facilisis in</a>
						  <a href="#" class="list-group-item list-group-item-success">Dapibus ac facilisis in</a>
						  <a href="#" class="list-group-item list-group-item-danger">Vestibulum at eros</a>
						   <a href="#" class="list-group-item list-group-item-danger">Vestibulum at eros</a>
								</ul>
						   </div>
								</div>
	
		
		<br/>
		<br/>
		<br/>
		
		


	</div>
   </body>
   	<script>
	if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
		(function () {
		var takePicture = document.querySelector("#take-picture"),
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
</html>
