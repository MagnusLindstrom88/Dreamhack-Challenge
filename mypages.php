<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once 'template/head.php'; ?>
    <style>
        #section-image-container {
            background-color: #000000;
        }
    </style>
</head>

<body>
    <!--Header-->
    <?php require_once 'template/header&navbar.php'; ?>
    
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
	
	<div class="container">
	<h3> <font color="white"> Profile Picture </h3>
			<div class="row">
			<div class="col-xs-6 col-sm-3">
				<a href="#" class="thumbnail">
						<img src="images/logo.png" alt="...">
							</a>
  </div>

	</div>
			 
			<button type="edit" class="btn btn-default">Edit Profile Picture</button>
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
		
		
	  <?php require_once 'template/footer.php'; ?>
	</div>
   </body>

</html>

