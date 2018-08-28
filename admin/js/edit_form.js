    $( document ).ready(function() {

        var festivalID = 0;

        $('.delete').on('click', function(ev) {

            ev.preventDefault();

            festivalID = $(this).attr("value");

            $('#confirm-delete').modal('show');

        });

         $('.edit').on('click', function(ev) {

            ev.preventDefault();

            festivalID = $(this).attr("value");

            $('#editID').val(festivalID);

            $('#confirm-edit').modal('show');           

            $.ajax({
               url: 'includes/get_festival_info.inc.php',
               type: 'GET',
               dataType: 'JSON',
               data: {
                    FID:festivalID,
               },

               success: function(data) {

                    console.log(data);  

                    $('#name').val(data.festivalName);
                    $('#description').val(data.festivalDescription);
                    $('#lineup').val(data.festivalLineup);
                    $('#image').val(data.festivalImage);

                    $('#location').val(data.venueLocation);
                    $('#startDate').val(data.venueStart);
                    $('#endDate').val(data.venueEnd);

                    $('#price').val(data.ticketPrice);
                    $('#numTicketes').val(data.numTickets);



                }, error: function(result){
                        console.log(result);
                }

                })           

        }); 

        $('#confirm-delete').on('click', '.btn-ok', function(e) {

          var $modalDiv = $(e.delegateTarget);

          $modalDiv.addClass('loading');

           $.ajax({

               url: 'includes/delete_festival.inc.php',
               type: 'POST',
               data: {
                    FID:festivalID,
               },

               success: function(result) {

                    $modalDiv.removeClass('loading');

                    $('#confirm-delete').modal('hide');

                    $("#"+ festivalID).slideUp("slow");             

            }, error: function(result){
                    console.log(result);
             }

            })


        });

        $("#edit_form").submit(function(e) {

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

                        var data = $('#edit_form').serializeArray();

                        console.log(data);  

                            $.ajax({

                               url: 'includes/update_festival.inc.php',
                               type: 'POST',

                               data: data,
                                

                               success: function(result) {
                                    console.log(result);
                                    location.reload();

                                    $('#confirm-edit').modal('hide');            

                                }, error: function(result){
                                        console.log(result);
                                }

                                })                        
                    }              

        });


    });