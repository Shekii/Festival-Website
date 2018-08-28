<?php 	
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	include ('includes/header.php'); 

	if (isset($_SESSION['login']) == 0) { //IF THERE IS NO SESSION AND NOT LOGGED IN THEN
?>
	  
      <div class="page-header">
        <h1>Register <small>get connected</small></h1>
      </div>
	  
	  <div class="container-fluid" id="loginPanel">
		  <div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Register</h3>
				</div>
				<div class="panel-body">
					<form method="post" action="includes/registerAccount.php">
					  <div class="form-group">
						<label for="username">Username</label>
						<input type="text" class="form-control" id="username" placeholder="Username" name="username" required>
					  </div>
					  <div class="form-group">
						<label for="password">Password</label>
						<input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
					  </div>
					  <div class="form-group">
						<label for="password">Email Address</label>
						<input type="email" class="form-control" id="email" placeholder="Email" name="email" required>
					  </div>
					  <div class="form-group">
						<label for="password">First Name</label>
						<input type="text" class="form-control" id="firstName" placeholder="First Name" name="firstName" required>
					  </div>
					  <div class="form-group">
						<label for="password">Surname</label>
						<input type="text" class="form-control" id="surname" placeholder="Surname" name="surname" required>
					  </div>						  					  					  
					  <div class="form-group">
							<?php 
								if (isset($_GET['error']) == true) {
							?>
								<div class="alert alert-danger" role="alert">
									<i class="glyphicon glyphicon-remove-sign"></i> &nbsp; <strong>Registration Failed</strong>: 
							<?php
									if(isset($_GET['reason']) == "username")
										echo "Username is already registered.";
							?>
								</div>
							<?php 
								}
							?>						
					  </div>
					  <button type="submit" class="btn btn-default" name="btn-login">
					  	  <i class="glyphicon glyphicon-ok-sign"></i> &nbsp; Register Account
					  	</button>
					</form>
				</div>
			</div>	  
		</div>		  
</div>	
	<script src="js/validate.min.js"></script>
	<script>


	</script>
  
</body>

<?php 

	} else if (isset($_SESSION['login']) == 1) {
	
		echo " <div class='alert alert-danger' role='alert'><i class='glyphicon glyphicon-remove-sign'></i> &nbsp; <strong>Sorry!</strong> You are already registerd. You cannot have two accounts. -> Redirecting... </div> ";
		header('Refresh: 2; URL=index.php');
	}

	include ('includes/footer.php'); 

?>	
</html>	 