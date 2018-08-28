<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('admin-header.php');
include('../classes/event.class.php');

$event = new Event();

$sql = "SELECT * FROM festivals";
$stmt = $pdo->query($sql);

$user = new User();

if ($user->is_admin())
{



?>
<div class="page-header">
   <h2>View Festivals <small>[ADMIN]</small></h2>
</div>
<div class="container-fluid">
	<div class="panel panel-primary">
		<div class="panel-body" >
    		<div class="row">
            	<div class="col-md-12">
         			<table class="table table-striped"> 
              		<thead>
                        <tr>
                            <th>Festival ID</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Tickets Left</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 

                        $event->loadFestivals();
                    ?>
                <form action="" method="GET">
                    <input type="hidden" name="festivalID" id="FID" value=""/>
                </form>

                    </tbody>  
                    </table>
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

</div> <!--CONTAINER FR0M HEADER END-->

<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                Confirm Deleting This Festival
            </div>
            <div class="modal-body">
                Are you sure you want to delete this event?  
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger btn-ok">Delete</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade bs-example-modal-lg" id="confirm-edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
 <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                Edit Festival Information
            </div>
            <div class="modal-body">
             <form method="post" name="edit_form" id="edit_form" action="includes/update_festival.inc.php">
               <input type="hidden" id="editID" name="FID" value=""></input>
               <div class="row">
                    <div class="col-xs-6 col-sm-4">
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
                      <div class="col-xs-6 col-sm-4">    
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
                      <div class="col-xs-6 col-sm-4">
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
               </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>

                 <button type="submit" class="btn btn-success" id="btn-edit" name="btn-edit">
                        <i class="glyphicon glyphicon-floppy-saved"></i> &nbsp; Save Festival
                 </button>

            </div>
             </form>
        </div>
    </div>
</div>


<script src="../js/validate.min.js"></script>
<script src="../js/validate.ext.js"></script>
<script src="js/edit_form.js"></script>
</body>

