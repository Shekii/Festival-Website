<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require('admin-header.php');

$sql = "SELECT * FROM music";
$stmt = $pdo->query($sql);

$user = new User();

if ($user->is_admin())
{

?>
<div class="page-header">
   <h2>Add New Festivals <small>[ADMIN]</small></h2>
</div>
	  <div class="container-fluid">
		  <div class="panel panel-primary">

				<div class="panel-body" id="add-panel">

						<div class="alert alert-info" role="alert" id="noInput" style="display:none;">
							<i class="glyphicon glyphicon-info-sign"></i> &nbsp; <strong id>Error:</strong> Must enter a username & password.
						</div>

						<form method="post" name="add_form" id="add_form" action="includes/add_festival.inc.php">

  						<div class="row">
	  						<div class="col-md-8">
								<div class="panel panel-default">
								  <div class="panel-heading">Festival Information</div>
								  <div class="panel-body">
									  <div class="form-group">
										<label for="username">Fesival Name</label>
										<input type="text" class="form-control" id="name" placeholder="Name" name="name" value="Leeds Festival">					
									  </div>

									  <div class="form-group">
										<label for="description">Fesival Description</label>
										<input type="text" class="form-control" id="description" placeholder="Description" name="description" value="Leeds">					
									  </div>

									  <div class="form-group">
										<label for="lineup">Festival Lineup (seperated by comma , )</label>
										<input type="text" class="form-control" id="lineup" placeholder="lineup (artists/groups)" name="lineup" value="Bob Marley">					
									  </div>

									  <div class="form-group">
										<label for="image">Festival Image</label>
										<input id="image" class="form-control" type="text" placeholder="image.jpg" name="image" value="tank.jpg">				
									  </div>								  

									</div>
								</div>
							</div>
	  				  <div class="col-md-4">	
							<div class="panel panel-default">
							  <div class="panel-heading">Venue Information</div>
							  <div class="panel-body">
								  	<div class="form-group">
										<label for="location">Location</label>
										<input type="text" class="form-control" id="location" placeholder="Location Name" name="location" value="Leeds">					
								  	</div>	

								  <div class="form-group">
									<label for="startDate">Start Date</label>
									<input type="date" class="form-control" id="startDate" placeholder="Start Date" name="startDate" value="2017-02-05">					
								  </div>

								  <div class="form-group">
									<label for="endDate">Start Date</label>
									<input type="date" class="form-control" id="endDate" placeholder="End Date" name="endDate" value="2017-02-08">					
								  </div>	
							</div>
							</div>		  				 
	  				 </div>	
	  			</div>

				<div class="row">					
	  				  <div class="col-md-8">
							<div class="panel panel-default">
							  <div class="panel-heading">Ticket Information</div>
								  <div class="panel-body">
								 	 <div class="form-group">
										<label for="price">Ticket Price £</label>
										<input type="text" class="form-control" id="price" placeholder="Price (0.00)" name="price" value="">					
								  	</div>

								  <div class="form-group">
										<label for="numTickets">Tickets On Sale</label>
										<input type="number" class="form-control" id="numTickets" placeholder="Number of tickets to sell" name="numTickets" value="100">					
								  </div>							   
								</div>
							</div>
					</div>
	  				  <div class="col-md-4">	  		
							<div class="panel panel-default">
							  <div class="panel-heading">Music Type</div>
							  <div class="panel-body">
								  <div class="form-group">
		   						  	<label for="musicType">Music Type</label>

		   						  	<input type="hidden" name="musicTypeId" value="0" id="musicTypeId">
							        <select class="form-control" id="selectedMusicId" name="musicType">

							        <?php

							        	$typeId = 1;
							        	while($row = $stmt->fetchObject()) { 
							        ?>

							          <option value = <?php echo $typeId; ?> > <?php echo $row->musicType; ?></option>

								     <?php 
								     		$typeId = $typeId  + 1;
								     	} 

								     ?>
							        </select>					  			  
							       </div>
							  </div>
							</div>	  				  
	  				  </div>

	  			<div class="col-md-2" id="btn-add-festival">	
	  		
					<button type="submit" class="btn btn-primary" id="btn-add" name="btn-add">
						<i class="glyphicon glyphicon-plus"></i> &nbsp; Add New Festival
					</button>


	  			</div>  

	  			<div class="col-md-2">
					<img src="../images/loader.gif" id="loading" hidden>
					<img src="../images/loader.gif" id="loading" hidden>
	  			</div>		  								
			</div>

	</form>

	</div>

	</div>

<?php
} else  {
	include ('denied.php');
}
?>
	</div>
	</div>	<!-- END OF CONTAINER FROM HEADER -->

	<script src="../js/validate.min.js"></script>
	<script src="js/clearform.js"></script>
	<script src="../js/validate.ext.js"></script>
	<script src="js/add_form.js"></script>  	
	</body>
	</html>	 
