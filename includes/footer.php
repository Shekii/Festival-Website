<?php
$dateToday = date("Y/m/d");
?> 

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>	

<footer class="footer">
      <div class="container">
        <p class="text-muted">
        	&copy Harry Walker 2016 | Under Construction | <?php echo $dateToday; ?> 

            <a href="admin/" role="button">
                <span class="glyphicon glyphicon-briefcase"></span>&nbsp; Admin Area
            </a>
      	</p>
      </div>
</footer>
</html>


