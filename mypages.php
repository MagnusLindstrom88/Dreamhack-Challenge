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
		 <div <li><a href="#" data-toggle="modal" data-target="#registration-modal" onclick="cleanForms()"> <button type="edit" class="btn btn-default">Edit</button>
			  <p2> <font color="white"> Click the Edit button in order to make changes in your user profile. </p2></a></li></ul>        </div>
    		</div>
		
			  
			  <br/>
<!--Registration Modal-->
<div class="modal fade" id="registration-modal" tabindex="-1" role="dialog" aria-labelledby="registrationHeading" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 id="registrationHeading" class="modal-title"> <font color="black"> User Information</h4>
      </div>
      <div class="modal-body">
        <form id="registration-form" role="form" method="post">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" class="form-control" maxlength="20">
            </div>
            <div class="form-group">
                <label for="registration-email">Email:</label>
                <input type="email" id="registration-email" name="email" class="form-control" maxlength="254">
            </div>
            <div class="form-group">
                <label for="registration-password">Password:</label>
                <input type="password" id="registration-password" name="password" class="form-control" maxlength="255">
            </div>
            <div class="form-group">
                <label for="confirm-password">Confirm Password:</label>
                <input type="password" id="confirm-password" name="confirm-password" class="form-control" maxlength="255">
            </div>
           
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="validateRegistration();">Confirm</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
    </div>
    
	</div>
  </div>
</div>			
<br/>
				
	<div
		<ul class="list-group"> <div class="col-lg-10"> <h3> <font color="white"> Betting History </h3> <p> Previously betted games </p> </div>
				<div class=  "col-md-4">
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
	</div>
</div>		 
		
		
		
<?php require_once 'template/footer.php'; ?>
   </body>
</html>

