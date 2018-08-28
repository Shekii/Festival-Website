
<?php 

	 include ('admin-header.php'); 
	 ini_set('display_errors', 1);	
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

      <div class="page-header">
        <h1>ADMIN LOGIN PANEL</h1>
      </div>
	  
	  <div class="container-fluid" id="loginPanel">

	  <?php

	  	if ( !isset($_SESSION['admin']) ) {
 
	  ?>
		  <div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title" id="loginTitle">Sign in securely  <i class="glyphicon glyphicon-ok"></i></h3>
				</div>

				<div class="panel-body">

						<div class="alert alert-danger" role="alert" id="notAdmin" style="display:none;">
							<i class="glyphicon glyphicon-remove-sign"></i> &nbsp; <strong id>Error:</strong> That account is not an admin!
						</div>

						<form method="post" action="admin-checklogic.php" name="login_form">

						  <div class="form-group">
							<label for="username">Admin Username</label>
							<input type="text" class="form-control" id="username" placeholder="Username" name="username">
						  </div>
						  <div class="form-group">
							<label for="password">Admin Password</label>
							<input type="password" class="form-control" id="password" placeholder="Password" name="password">
						  </div>

						  <div class="form-group">
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
						  <button type="submit" class="btn btn-default" name="btn-login" id="btn-login">
						  	  <i class="glyphicon glyphicon-log-in"></i> &nbsp; Sign In Securely
						  	</button>
						</form>

				</div>
			</div>
	  <?php
			}  
	  
 
	  ?>				  
		</div>		  
</div>	

<script>
	$( document ).ready(function() {


		$("#username").focusout(function (e){

				var user_name = $(this).val();
				check_username_ajax(user_name);			
			
	})

});


function check_username_ajax(username){
    $.post('is_admin.php', {'username':username}, function(data) {
      	// if (data == username) {
      	// 	$('#notAdmin').slideDown("slow");
      	console.log(data);
      	if (data != username) {
      		$('#notAdmin').slideDown("slow");
      	} else {
      		$('#notAdmin').slideUp("slow");
      	}
    });
}
</script>
</body>
</html>	 