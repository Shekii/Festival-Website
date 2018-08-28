<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('admin-header.php');

$today = date("F j, Y, g:i a"); 

$user = new User();

if ($user->is_admin())
{

	$account = $user->getUser($userID);

?>

<div class="page-header">
   <h2>Adminstrator Area <small>[ADMIN]</small></h2>
</div>
<div class="container-fluid">

	<div class="panel panel-primary">
		<div class="panel-body" >
			<div class="panel panel-default">
				<div class="panel-heading" style="color: red">Welcome back, <?php echo $account[0]['username']; ?></div>
					<div class="panel-body">

						<h3 class="bg-primary" style="padding: 20px;">Today's date is: <?php echo $today ?></h3>
					</div>
				</div>
		</div>		
		</div>
	<?php 

	} else {

		include('denied.php');
	}

	?>
	</div>
</div>

</div> <!--CONTAINER FR0M HEADER END-->


