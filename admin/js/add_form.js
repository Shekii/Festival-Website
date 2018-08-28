  		$(document).ready(function() {


  			var selectedID = $('#selectedMusicId').val();
  			$('#musicTypeId').val(selectedID);

		    $('#selectedMusicId').change(function() {
		    	var selectedID = $(this).val();
		    	$('#musicTypeId').val(selectedID);

		  })


          $("#add_form").submit(function(e) {

          	e.preventDefault();

            }).validate({

                  onfocusout: false,
                  onkeyup: false,
                  onclick: false,

                        rules: {
                        	name: "required", 
                        	description: "required",
                        	lineup: "required",
                        	image: "required",
                        	location: "required",
                        	startDate: "required",
                        	endDate: {
                        		required: true,
                        		greaterThan: "#startDate"  
                        	},
                        	price: {
                        		required: true,
                        		number: true
                        	},
                        	numTickets: {
                        		required: true,
                        		number: true,
                        		min: 1,
                        		max: 1000
                        	}
                        },

                        messages: {
                        	endDate: "End date must be greater than start date",
                        	price: "Must be a number!"
                        },

                    submitHandler: function(form) {

						$('#loading').fadeIn(500);

                    	var data = $('#add_form').serializeArray();

                    	$.ajax({
                    		url: 'includes/add_festival.inc.php',
                    		type: 'POST',
                    		data: data,

                    		 success: function(result) {
								  $( "#loading" ).animate({
								    left: "+=500",
								    height: "toggle"
								  })


								  alert(result);

								  $('#add-panel').slideUp("slow");

								  $('#add-panel').slideDown("slow");

								  $('#add-panel').append(result);

								 

                    		 }, error: function(){
							        alert("Failed to send!");

							       alert(result);
							   }
                    	})               	

	
                             
                      }                 
                })          		
          });