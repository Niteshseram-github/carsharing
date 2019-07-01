$(function(){
getBooking();
getRequest();

function getBooking(){
        $("#spinner").css("display", "block");
        $.ajax({
            url: "getbooking.php",
            success: function(data2){
                //console.log(data2); 
                    $("#spinner").css("display", "none");
                    $('#mybooking').html(data2);
                $('#mybooking').hide();
                $('#mybooking').fadeIn();
        },
            error: function(){
                $("#spinner").css("display", "none");
                $('#mybooking').html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");
                $('#mybooking').hide();
                $('#mybooking').fadeIn();
    }
        }); 
}
    
function getRequest(){
        $("#spinner").css("display", "block");
        $.ajax({
            url: "getrequest.php",
            success: function(data2){
                //console.log(data2); 
                    $("#spinner").css("display", "none");
                    $('#myrequest').html(data2);
                $('#myrequest').hide();
                $('#myrequest').fadeIn();
        },
            error: function(){
                $("#spinner").css("display", "none");
                $('#myrequest').html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");
                $('#myrequest').hide();
                $('#myrequest').fadeIn();
    }
        }); 
}

$('#requestbookingModal').on('show.bs.modal', function (e) {
        var $invoker = $(e.relatedTarget);
        console.log($invoker.data('trip_id'));
        $("#bookingmessage").hide();
        var input = document.getElementById("pickup");
        var autocomplete = new google.maps.places.Autocomplete(input);
    $('#requestbookingform').submit(function(event){
            event.preventDefault();
            //var $invoker = $(event.relatedTarget);
            data = $('#requestbookingform').serializeArray();
            data.push({name: 'trip_id', value: $invoker.data('trip_id')});
            $.ajax({
            url: "addbooking.php",
            type: "POST",
            data: data,
            success: function(data2){
            if(data2){
                    $("#bookingmessage").html(data2);
                    $("#bookingmessage").slideDown();
                }
            },
            error: function(){
            $("#bookingmessage").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");
            $("#bookingmessage").slideDown();
            
        }
     });
});
});
    
$('#cancelbookingModal').on('show.bs.modal', function (e) {
        var $invoker = $(e.relatedTarget);
        console.log($invoker.data('book_id'));
        $("#cancelbookingmessage").hide();
    
    $('#cancelbookingform').submit(function(event){
            event.preventDefault();
            //var $invoker = $(event.relatedTarget);
            data = $('#cancelbookingform').serializeArray();
            data.push({name: 'book_id', value: $invoker.data('book_id')});
            $.ajax({
            url: "cancelbooking.php",
            type: "POST",
            data: data,
            success: function(data2){
            if(data2){
                    $("#cancelbookingmessage").html(data2);
                    $("#cancelbookingmessage").slideDown();
                    location.reload();
                }
            },
            error: function(){
            $("#cancelbookingmessage").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");
            $("#cancelbookingmessage").slideDown();
            
        }
     });
});     
});
    
$('#acceptbookingModal').on('show.bs.modal', function (e) {
        var $invoker = $(e.relatedTarget);
        console.log($invoker.data('trip_id'));
        $("#acceptbookingmessage").hide();
        
    $('#acceptbookingform').submit(function(event){
            event.preventDefault();
            //var $invoker = $(event.relatedTarget);
            data = $('#acceptbookingform').serializeArray();
            data.push({name: 'book_id', value: $invoker.data('book_id')});
            data.push({name: 'trip_id', value: $invoker.data('trip_id')});
            $.ajax({
            url: "acceptrequest.php",
            type: "POST",
            data: data,
            success: function(data2){
            if(data2){
                    $("#acceptbookingmessage").html(data2);
                    $("#acceptbookingmessage").slideDown();
                    location.reload();
                }
            },
            error: function(){
            $("#acceptbookingmessage").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");
            $("#acceptbookingmessage").slideDown();
            
        }
     });
});
});
    
    
$('#denybookingModal').on('show.bs.modal', function (e) {
        var $invoker = $(e.relatedTarget);
        console.log($invoker.data('book_id'));
        $("#denybookingmessage").hide();
        
    $('#denybookingform').submit(function(event){
            event.preventDefault();
            //var $invoker = $(event.relatedTarget);
            data = $('#denybookingform').serializeArray();
            data.push({name: 'book_id', value: $invoker.data('book_id')});
            $.ajax({
            url: "denyrequest.php",
            type: "POST",
            data: data,
            success: function(data2){
            if(data2){
                    $("#denybookingmessage").html(data2);
                    $("#denybookingmessage").slideDown();
                    location.reload();
                }
            },
            error: function(){
            $("#denybookingmessage").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");
            $("#denybookingmessage").slideDown();
            
        }
     });
});
});
    
});
