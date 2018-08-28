<?php 
$pageTitle = "Home :: Wavents";
include ('includes/header.php'); 
?>

</div>
<div class="container-fluid home">
			<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

				  <ol class="carousel-indicators">
					<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
					<li data-target="#carousel-example-generic" data-slide-to="1"></li>
					<li data-target="#carousel-example-generic" data-slide-to="2"></li>
				  </ol>
				 
				  <div class="carousel-inner">
					<div class="item active">
					  <img src="images/slide1.jpg" alt="...">
					  <div class="carousel-caption">
						<h3>Nights Out Anywhere Anytime...</h3>
					  </div>
					</div>
					<div class="item">
					  <img src="images/slide2.jpg" alt="...">
					  <div class="carousel-caption">
						<h3>Buy Them Now</h3>
					  </div>
					</div>
					<div class="item">
					  <img src="images/slide3.jpg" alt="...">
					  <div class="carousel-caption">
						<h3>Only The Best...</h3>
					  </div>
					</div>
				  </div>
			 

				  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left"></span>
				  </a>
				  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right"></span>
				  </a>

			</div> 

			<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
			<!-- Include all compiled plugins (below), or include individual files as needed -->
			<script src="js/bootstrap.min.js"></script>

			<script>
  				$(document).ready(function() {

  					$('#btn-home').click(function(e) {
  						e.preventDefault();
  						url = "events.php";
      					$(location).attr("href", url);
  					})

  				});
			</script>
			
			
</div>

<div class="container" id="btn-home">
	<button type="button" class="btn btn-primary btn-lg btn-block">See Festivals</button>
</div>
</body>
<footer class="footer">
      <div class="container">
        <p class="text-muted">
        	&copy Harry Walker 2016 | Under Construction |

            <a href="admin/" role="button">
                <span class="glyphicon glyphicon-briefcase"></span>&nbsp; Admin Area
            </a>
      	</p>
      </div>
</footer>
</html>
