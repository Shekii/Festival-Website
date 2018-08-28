<?php 	
	include ('includes/header.php'); 	
	ini_set('display_errors', 1);

		if (isset($_SESSION['login']) == 0) { //IF THERE IS NO SESSION AND NOT LOGGED IN THEN
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

	  
      <div class="page-header">
        <h1>Login <small>get connected</small></h1>
      </div>
	  
	  <div class="container-fluid" id="loginPanel">
		  <div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title" id="loginTitle">Sign In</h3>
				</div>

				<div class="panel-body">

						<div class="alert alert-info" role="alert" id="noInput" style="display:none;">
							<i class="glyphicon glyphicon-info-sign"></i> &nbsp; <strong id>Error:</strong> Must enter a username & password.
						</div>

						<form method="post" action="includes/checklogin.php" name="login_form">
						  <div class="form-group">
							<label for="username">Username</label>
							<input type="text" class="form-control" id="username" placeholder="Username" name="username">
						  </div>
						  <div class="form-group">
							<label for="password">Password</label>
							<input type="password" class="form-control" id="password" placeholder="Password" name="password">
						  </div>

						  <div class="form-group">
						  	<p class="login-right">
						  	</p>
							<?php 
								if (isset($_GET['error']) == true) {
							?>
								<div class="alert alert-danger" role="alert">
									<i class="glyphicon glyphicon-remove-sign"></i> &nbsp; <strong>Login Failed</strong>: 
									<?php 
										$reasons = array("password" => "Wrong Username or Password.", "blank" => "You have left one or more fields blank.");
										if ($_GET["loginFailed"]) 
										echo $reasons[$_GET["reason"]]; 
									?>
								</div>
							<?php 
								}
							?>						
						  </div>
						 <div class="form-group">
						  <button type="submit" class="btn btn-default" name="btn-login">
						  	  <i class="glyphicon glyphicon-log-in"></i> &nbsp; Sign In
						  	</button>
						  </div>
						  <div class="form-group">						  	
						  	<p>
						  		<i class="glyphicon glyphicon-question-sign"></i> &nbsp;Don't have an account? Click <a href="#">here</a><br>
						  		<i class="glyphicon glyphicon-question-sign"></i> &nbsp Forgot Password? Click <a href="#">here</a>
						  	</p>
						  </div>
						</form>

				</div>
			</div>	  
		</div>		  
</div>	  	  	
<?php 

	} else if (isset($_SESSION['login']) == 1) {
	
		echo " <div class='alert alert-danger' role='alert'><i class='glyphicon glyphicon-remove-sign'></i> &nbsp; <strong>Sorry!</strong> Already logged -> Redirecting... </div> ";
		header('Refresh: 2; URL=index.php');
	} 


	include ('includes/footer.php'); 
?>	

<script>

$( document ).ready(function() {
	$( '#username' ).focusout(function() {
		$('#noInput').slideDown("slow");
	})
	$( '#password' ).focusout(function() {	
		$('#noInput').slideDown("slow");
	})
});

</script>  
</body>
</html>	 