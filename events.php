<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

  include ('includes/header.php');
  $user = new User();
  $event = new Event();

  $festival = $event->getEvents();
  $count = implode($event->getAmountEvents());


$sql = "SELECT * FROM festivals";
$stmt = $pdo->query($sql);


?>
<div id="side-cart">
  <button type="button" class="btn btn-info" id="cart-button" data-toggle="modal" data-target="#exampleModal"><span class="glyphicon glyphicon-shopping-cart"></span></button>
</div>
      <div class="page-header">
        <h1>Tickets <small>get them before they go</small></h1>
      </div>

<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">Current Festivals<span style="float: right";>Total Festivals: <?php echo $count; ?> </span></h3>
  </div>

  	<div class="panel-body">


     <form method="post" class="form-inline" name="search-form" id="search-form" action="includes/search_festival.inc.php">
         <div class="form-group">
            <label for="search">Search: </label>
            <input type="text" name="search" class="form-control" id="search"/>
            <button type="submit" class="btn btn-primary" id="bnSearch">
                  <i class="glyphicon glyphicon-search"></i> &nbsp; Search
            </button>


           <div class="form-group">
             <p style="font-weight: bold;" class="d-inline">Sort by: </p>
              <a href="#" id="p-low" class="d-inline">Price (Low)</a> |
              <a href="#" id="p-high" class="d-inline">Price (High)</a> |
              <a href="#" id="festivalsAvailable" class="d-inline">Festivals Available</a> |
              <a href="#" id="clear" class="d-inline">Clear List</a>
           </div>

          </div>
      </form>

          <ul class="list-group festivals" id="festivalList">

          </ul>

        <p class="bg-success" style="padding: 20px">We found <span id="numFound"></span> result(s).</p>

  		<div class="row festivals">

          <?php
             while($row = $stmt->fetchObject()) {

                $ticketID = $row->ticketID;
                $venueID = $row->venueID;
                $festivalID = $row->festivalID;

                $ticketPriceSQL = "SELECT * FROM tickets WHERE ticketID = :ticketID";
                $ticketStmt = $pdo->  prepare($ticketPriceSQL);
                $ticketStmt->bindParam(':ticketID', $ticketID, PDO::PARAM_INT);
                $ticketStmt->execute();
                $ticket = $ticketStmt->fetchObject();

                $venuePriceSQL = "SELECT * FROM venue WHERE venueID = :venueID";
                $venueStmt = $pdo->  prepare($venuePriceSQL);
                $venueStmt->bindParam(':venueID', $venueID, PDO::PARAM_INT);
                $venueStmt->execute();
                $venue = $venueStmt->fetchObject();

          ?>
            			<div class="col-sm-6 col-md-4 festival" value="<?php echo $row->festivalID?>">
              			<div class="thumbnail" id="events">

                				<img src="images/events/<?php echo $row->festivalImage; ?>" alt="..." class="eventImage">
                					<div class="caption">

                  					<h3 class="eventName">
                                <?php echo $row->festivalName; ?>
                            </h3>
                  					<h4 class="eventDescription">
                                <?php echo $row->festivalDescription; ?>
                            </h4>
                            <h3 class="ticketPrice">
                                &pound;<?php echo $ticket->ticketPrice; ?>
                            </h3>

                            <h3 class="eventDate">
                                <?php
                                    $formattedStartDate = date("jS F Y", strtotime($venue->venueStart));
                                    echo $formattedStartDate;

                                  ?>
                            </h3>
                  					<p>
                              <?php
                                  if (!$event->hasFestivalPast($festivalID))
                                  {

                              ?>
                                <a href="<?php echo "details.php?festivalID={$row->festivalID}"; ?>" class="btn btn-success" role="button">
                                  <span class="glyphicon glyphicon-arrow-right"></span>&nbsp; See More
                              </a>

                              <?php
                                } else {
                              ?>

                              <?php

                              }

                            ?>

                            <h4><small> <?php echo $ticket->numTickets; ?> tickets left</small> </h4>
                            <?php
                                if ($event->hasFestivalPast($festivalID))
                                {

                            ?>
                            <h4><small style="color: red">FESTIVAL NO LONGER AVAILABLE</small> </h4>

                            <?php
                              } else {
                            ?>
                            <h4><small>Only <?php echo $event->getDaysLeft($festivalID);?> days left before the festival!</small> </h4>

                            <?php

                            }

                          ?>
                            </p>

                				</div>
              			</div>
            			</div>

          <?php
            }
          ?>
  		</div>

  </div>

  <div class="panel-footer">
    <nav aria-label="Page navigation">
      <ul class="pagination">
        <li>
          <a href="#" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
          </a>
        </li>
        <li><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">5</a></li>
        <li>
          <a href="#" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
          </a>
        </li>
      </ul>
    </nav>
  </div>

</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Shopping Cart</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes & Proceed To Checkout</button>
      </div>
    </div>
  </div>
</div>

</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
<script src="js/search.js"></script>
