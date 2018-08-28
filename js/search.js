$( document ).ready(function() {

    var searchTerm;
    var resultsFound = 0;

    $('#numFound').html(resultsFound);


    $( "#search" ).keyup(function() {

        searchTerm = $('#search').val();

    })

    $("#p-low").click(function(e) {
      e.preventDefault();

      $('#festivalList').empty();
      resultsFound = 0;

      var type= "p-low";

          $.ajax({

            url: 'includes/search_festival.inc.php',
            type: 'POST',
            dataType: 'JSON',
            data: {
              type: type,
              searchTerm:searchTerm,
            },
                                

            success: function(result) {
                $.each(result, function (index, data) {
                  var festivalID = data.festivalID;
                  console.log(festivalID);
                    $('#festivalList').hide().slideDown("fast").append(
                                  "<li class='list-group-item'> <a href='details.php?festivalID=" + festivalID + "'>" + data.festivalName + " - £" + + data.ticketPrice + "</li></a>");

                    resultsFound++;
                })

                $('#numFound').html(resultsFound);

            }, error: function(result){
                console.log(result);
             }

            })        
    }) 

    $("#p-high").click(function(e) {
      e.preventDefault();

      $('#festivalList').empty();
      resultsFound = 0;

      var type= "p-high";

          $.ajax({

            url: 'includes/search_festival.inc.php',
            type: 'POST',
            dataType: 'JSON',
            data: {
              type: type,
              searchTerm:searchTerm,
            },
                                

            success: function(result) {
                $.each(result, function (index, data) {
                  var festivalID = data.festivalID;
                  console.log(festivalID);
                    $('#festivalList').hide().slideDown("fast").append(
                                  "<li class='list-group-item'> <a href='details.php?festivalID=" + festivalID + "'>" + data.festivalName + " - £" + + data.ticketPrice + "</li></a>");

                    resultsFound++;
                })

                $('#numFound').html(resultsFound);

            }, error: function(result){
                console.log(result);
             }

            })        
    })    

    $("#d-soonest").click(function(e) {
      e.preventDefault();

      $('#festivalList').empty();
      resultsFound = 0;

      var type= "d-soonest";

          $.ajax({

            url: 'includes/search_festival.inc.php',
            type: 'POST',
            dataType: 'JSON',
            data: {
              type: type,
              searchTerm:searchTerm,
            },
                                

            success: function(result) {
                $.each(result, function (index, data) {
                  var festivalID = data.festivalID;
                  console.log(festivalID);
                    $('#festivalList').hide().slideDown("fast").append(
                                  "<li class='list-group-item'> <a href='details.php?festivalID=" + festivalID + "'>" + data.festivalName + " - £" + data.ticketPrice + "</li></a>");

                    resultsFound++;
                })

                $('#numFound').html(resultsFound);

            }, error: function(result){
                console.log(result);
             }

            })        
    })

    $("#clear").click(function(e) {
      e.preventDefault();

      $('#festivalList').slideUp().empty();     
    })        


   $("#search-form").submit(function(e) {
      e.preventDefault();

      $('#festivalList').empty();
      resultsFound = 0;

      var type = "normal";

          $.ajax({

            url: 'includes/search_festival.inc.php',
            type: 'POST',
            dataType: 'JSON',
            data: {
              type: type,
              searchTerm:searchTerm,
            },
                                

            success: function(result) {
                $.each(result, function (index, data) {
                  var festivalID = data.festivalID;
                  console.log(festivalID);
                    $('#festivalList').hide().slideDown("fast").append(
                                  "<li class='list-group-item'> <a href='details.php?festivalID=" + festivalID + "'>" + data.festivalName + " - £" + + data.ticketPrice + "</li></a>");

                    resultsFound++;
                })

                $('#numFound').html(resultsFound);

            }, error: function(result){
                console.log(result);
             }

            })       

    })



  $('#cart-button').on('click', function(ev) {

    $('#myModal').modal('show');
    
  });


});  