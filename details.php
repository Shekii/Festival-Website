<?php 
ini_set('display_errors', 1);
include ('includes/header.php'); 
include('includes/conn.inc.php');

$sFestivalID = $_GET['festivalID'];

$event = new Event();

$festival = $event->getFestival($sFestivalID);


?>
	  
      <div class="page-header details">
        <h1><?php  ?> <small><?php  ?></small></h1>
      </div>
      <div class="panel panel-primary">
        <div class="panel-heading"><?php echo $festival[0]['festivalName']; ?></div>
        <div class="panel-body">
            <div class="row">
             <div class="col-md-8">
                  <div class="panel panel-primary">
                  	<div class="panel-heading">
                  		<h3 class="panel-title">Descripton</h3>
                    </div>

                    	<div class="panel-body">
                        <?php echo $festival[0]['festivalDescription']; ?>

                        <span style="font-weight: bold; padding-top: 20px;">Lineup:</span>

                        <?php echo $festival[0]['festivalLineup']; ?> 
                    </div>

                  </div>

              <div class="col-md-6">   
                  <div class="panel panel-primary">
                    <div class="panel-heading">
                      <h3 class="panel-title">Price</h3>
                    </div>

                      <div class="panel-body">
                        &pound;<?php echo $festival[0]['ticketPrice']; ?>
                    </div>

                  </div>                  
              </div>

               <div class="col-md-6">   
                  <div class="panel panel-primary">
                    <div class="panel-heading">
                      <h3 class="panel-title">Price</h3>
                    </div>

                      <div class="panel-body">
                        <?php echo $festival[0]['numTickets']; ?> tickets left!
                    </div>

                  </div>                  
              </div>
               <div class="col-md-6">   
                  <div class="panel panel-primary">
                    <div class="panel-heading">
                      <h3 class="panel-title">Price</h3>
                    </div>

                      <div class="panel-body">
                        <?php echo $festival[0]['numTickets']; ?> tickets left!
                    </div>

                  </div>                  
              </div> 

               <div class="col-md-6">   
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h3 class="panel-title">Price</h3>
                    </div>

                      <div class="panel-body">
                        <div class="form-group">
                          <p>Quantity: </p>

                     <form action="includes/buy-ticket.inc.php" method="post">
                          <input type="number" required class="form-control" name="quantity" />
                        </div>

                          <div class="btn-group" role="group" aria-label="">
                              <button type="submit" class="btn btn-success" id="btn-add" name="btn-add">
                                <i class="glyphicon glyphicon-plus"></i> &nbsp; Buy Tickets
                              </button>                          
                        </div>

                        <input type="hidden" name="festivalID" value="<?php echo $festival[0]['festivalID'];?>"/>
                        <input type="hidden" name="userID" value="<?php if (isset($account)) echo $account[0]['userID']; ?>"/>


                    </form>

                    </div>

                  </div>                  
              </div>                                         

          </div>	
          <div class="col-md-4">     
                  <div class="panel panel-primary">
                    <div class="panel-heading">
                      <h3 class="panel-title"><?php echo $festival[0]['festivalName']; ?></h3>
                    </div>
                      <div class="panel-body detailImage">
                        <img src="images/events/<?php echo $festival[0]['festivalImage']; ?>" alt="..." class="img-rounded">
                      </div>

                  </div>    
          </div>
       </div>
    </div>
    </div>
		
</div> 	  	
</body>
</html>	 

