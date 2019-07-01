$(function(){
    
    
getCars();    
// Ajax call to updateusername.php
$("#updateusernameform").submit(function(event){ 
    //prevent default php processing
    event.preventDefault();
    //collect user inputs
    var datatopost = $(this).serializeArray();
//    console.log(datatopost);
    //send them to updateusername.php using AJAX
    $.ajax({
        url: "updateusername.php",
        type: "POST",
        data: datatopost,
        success: function(data){
            if(data){
                $("#updateusernamemessage").html(data);
            }else{
                location.reload();   
            }
        },
        error: function(){
            $("#updateusernamemessage").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");
            
        }
    
    });

});

// Ajax call to updatepassword.php
$("#updatepasswordform").submit(function(event){ 
    //prevent default php processing
    event.preventDefault();
    //collect user inputs
    var datatopost = $(this).serializeArray();
//    console.log(datatopost);
    //send them to updateusername.php using AJAX
    $.ajax({
        url: "updatepassword.php",
        type: "POST",
        data: datatopost,
        success: function(data){
            if(data){
                $("#updatepasswordmessage").html(data);
            }
        },
        error: function(){
            $("#updatepasswordmessage").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");
            
        }
    
    });

});



// Ajax call to updateemail.php
$('#loading').hide();
$("#updateemailform").submit(function(event){ 
    //prevent default php processing
    event.preventDefault();
    //collect user inputs
    var datatopost = $(this).serializeArray();
//    console.log(datatopost);
    //send them to updateusername.php using AJAX
    $.ajax({
        url: "updateemail.php",
        type: "POST",
        data: datatopost,
        success: function(data){
            if(data){
                $("#updateemailmessage").html(data);
            }
        },
        error: function(){
            $("#updateemailmessage").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");
            
        }
    
    });

});
    
    
$("#updatephonenumberform").submit(function(event){ 
    //prevent default php processing
    event.preventDefault();
    //collect user inputs
    var datatopost = $(this).serializeArray();
//    console.log(datatopost);
    //send them to updateusername.php using AJAX
    $.ajax({
        url: "updatephonenumber.php",
        type: "POST",
        data: datatopost,
        success: function(data){
            if(data){
                $("#updatephonenumbermessage").html(data);
            }else{
                location.reload();   
            }
        },
        error: function(){
            $("#updatephonenumbermessage").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");
            
        }
    
    });

});
$("#updateaboutmeform").submit(function(event){ 
    //prevent default php processing
    event.preventDefault();
    //collect user inputs
    var datatopost = $(this).serializeArray();
//    console.log(datatopost);
    //send them to updateusername.php using AJAX
    $.ajax({
        url: "updateaboutme.php",
        type: "POST",
        data: datatopost,
        success: function(data){
            if(data){
                $("#updateaboutmemessage").html(data);
            }else{
                location.reload();   
            }
        },
        error: function(){
            $("#updateaboutmemessage").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");
            
        }
    
    });

});


//Ajax Call for the insert car details form 
//Once the form is submitted
/*$("#insertcardetailsform").submit(function(event){
    //hide message
    $("#insertcardetailsmessage").hide();
    //show spinner
    $("#spinner").css("display", "block");
    //prevent default php processing
    event.preventDefault();
    //collect user inputs
    var datatopost = $(this).serializeArray();
//    console.log(datatopost);
    //send them to insertcardetails.php using AJAX
    $.ajax({
        url: "insertcardetails.php",
        type: "POST",
        dataType:"json",
        data: datatopost,
        success: function(data){
            if(data){
                $("#insertcardetailsmessage").html(data);
                //hide spinner
                $("#spinner").css("display", "none");
                //show message
                $("#insertcardetailsmessage").slideDown();
        
             }
            else{
                    getCars();
                    $("#result").hide();
                    $('#addcarModal').modal('hide');
                    $("#spinner").css("display", "none");
                    //empty form
                    $('#addcarform')[0].reset();
                }
            
        },
        error: function(){
            $("#insertcardetailsmessage").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");
            //hide spinner
            $("#spinner").css("display", "none");
            //show message
            $("#insertcardetailsmessage").slideDown();
            
        }
    
    });

});


//Ajax for updatecarbrand
/*$("#updatecarbrandform").submit(function(event){ 
    //prevent default php processing
    event.preventDefault();
    //collect user inputs
    var datatopost = $(this).serializeArray();
//    console.log(datatopost);
    //send them to updateusername.php using AJAX
    $.ajax({
        url: "updatecarbrand.php",
        type: "POST",
        data: datatopost,
        success: function(data){
            if(data){
                $("#updatecarbrandmessage").html(data);
            }else{
                location.reload();   
            }
        },
        error: function(){
            $("#updatecarbrandmessage").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");
            
        }
    
    });

});


//Ajax for updatecarmodel
$("#updatecarmodelform").submit(function(event){ 
    //prevent default php processing
    event.preventDefault();
    //collect user inputs
    var datatopost1 = $(this).serializeArray();
//    console.log(datatopost);
    //send them to updateusername.php using AJAX
    $.ajax({
        url: "updatecarmodel.php",
        type: "POST",
        data: datatopost1,
        success: function(data){
            if(data){
                $("#updatecarmodelmessage").html(data);
            }else{
                location.reload();   
            }
        },
        error: function(){
            $("#updatecarmodelmessage").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");
            
        }
    
    });

});

//Ajax for updateregno
$('#loading').hide();
$("#updateregistrationnoform").submit(function(event){ 
    //prevent default php processing
    event.preventDefault();
    //collect user inputs
    var datatopost = $(this).serializeArray(); 
    //console.log(datatopost);
    //send them to updateusername.php using AJAX
    $.ajax({
        url: "updateregno.php",
        type: "POST",
        data: datatopost,
        success: function(data){
            if(data){
                $("#updateregistrationnomessage").html(data);
            }
            else{
                location.reload();
            }
        },
        error: function(){
            $("#updateregistrationnomessage").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");
            
        }
    
    });

});

//Ajax for updateplateno
$('#loading').hide();
$("#updateplatenoform").submit(function(event){ 
    //prevent default php processing
    event.preventDefault();
    //collect user inputs
    var datatopost = $(this).serializeArray(); 
    //console.log(datatopost);
    //send them to updateusername.php using AJAX
    $.ajax({
        url: "updateplateno.php",
        type: "POST",
        data: datatopost,
        success: function(data){
            if(data){
                $("#updateplatenomessage").html(data);
            }
            else{
                location.reload();
            }
        },
        error: function(){
            $("#updateplatennomessage").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");
            
        }
    
    });

});*/


//Update picture
var file;

$("#updatepictureform").submit(function(event) {
    //hide message
    $("#updatepicturemessage").hide();
    //show spinner
    $("#spinner").css("display", "block");
    event.preventDefault();
    if(!file){
        $("#spinner").css("display", "none");
        $("#updatepicturemessage").html('<div class="alert alert-danger">Please upload a picture!</div>');
            $("#updatepicturemessage").slideDown();
        return false;
    }
    var imagefile = file.type;
    var match= ["image/jpeg","image/png","image/jpg"];
        if($.inArray(imagefile, match) == -1){
            $("#updatepicturemessage").html('<div class="alert alert-danger">Wrong File Format</div>');
            $("#updatepicturemessage").slideDown();
            $("#spinner").css("display", "none");
            return false;
        }else{
            $.ajax({
                url: "updatepicture.php", 
                type: "POST",             
                data: new FormData(this), 
                contentType: false,       // The content type used when sending data to the server.
                cache: false,             // To unable request pages to be cached
                processData:false,        // To send DOMDocument or non processed data file it is set to false
                success: function(data){
                    if(data){
                        $("#updatepicturemessage").html(data);
                        //hide spinner
                        $("#spinner").css("display", "none");
                        //show message
                        $("#updatepicturemessage").slideDown();
                        //update picture in the settings
                    }else{
                        location.reload();
                    }

                },
                error: function(){
                    $("#updatepicturemessage").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");
                    //hide spinner
                    $("#spinner").css("display", "none");
                    //show message
                    $("#signupmessage").slideDown();

                }
            });
        }

});

// Function to preview image after validation
$(function() {
$("#picture").change(function() {
$("#updatepicturemessage").empty();
file = this.files[0];
var imagefile = file.type;
var match= ["image/jpeg","image/png","image/jpg"];
    if($.inArray(imagefile, match) == -1){
        $("#updatepicturemessage").html("<div class='alert alert-danger'>Wrong file format!</div>");
        return false;
    }
    else{
        var reader = new FileReader();
        reader.onload = imageIsLoaded;
        reader.readAsDataURL(this.files[0]);
    }
});
});
function imageIsLoaded(event) {
    $('#previewing').attr('src', event.target.result);
};


//Click on Add Car Button
        $('#addcarform').submit(function(event){
            $("#result").hide();
            $("#spinner").css("display", "block");
            event.preventDefault();
            data = $('#addcarform').serializeArray();
            $.ajax({
            url: "addcar.php",
            data: data,
            type: "POST",
            success: function(data2){
                console.log(data);
                if(data2){
                    $('#result').html(data2);
                    $("#spinner").css("display", "none");
                    $("#result").slideDown();
                }else{
                    getCars();
                    $("#result").hide();
                    $('#addcarModal').modal('hide');
                    $("#spinner").css("display", "none");
                    //empty form
                    $('#addcarform')[0].reset();
                }
        },
            error: function(){
                $("#result").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");
                $("#spinner").css("display", "none");
                $("#result").fadeIn();

    }
        }); 
        });
    
    // Click on Edit Trip Button
    $('#editcarModal').on('show.bs.modal', function (e) {
        $('#result2').html("");
        var $invoker = $(e.relatedTarget);
        $.ajax({
                url: "getcardetails.php",
                method: "POST",
                data: {car_id:$invoker.data('car_id')},
                success: function(data2){
                    car = JSON.parse(data2);
                    //fill edit trip form inputs using AJAX returned JSON data
                    formatModal();
            },
                error: function(){
                    $('#result2').html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");
                    $('#result2').hide();
                    $('#result2').fadeIn();
        
                }
            
        });
        
        //setup delete button for AJAX Call
        $('#deletetrip').click(function(){
            $.ajax({
                url: "deletetrips.php",
                method: "POST",
                data: {trip_id:$invoker.data('trip_id')},
                success: function(){
                    $('#edittripModal').modal('hide');
                    getTrips();
            },
                error: function(){
                    $('#result2').html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");
                    $('#result2').hide();
                    $('#result2').fadeIn();
                }
            
        });
        });
        
        // Click on Edit Trip Button
        $('#edittripform').submit(function(event){
            $("#result2").hide();
            $("#spinner").css("display", "block");
            event.preventDefault();
            data = $('#edittripform').serializeArray();
            data.push({name: 'trip_id', value: $invoker.data('trip_id')});
            getEditTripDepartureCoordinates();
        });
        
    });
    
    function formatModal(){
        $('#brand2').val(car["brand"]);    
        $('#model2').val(car["model"]); 
        $('#regno2').val(car["regno"]);
        $('#plateno2').val(car["plateno"]);
        
    }
    
    
        function getCars(){
        $("#spinner").css("display", "block");
        $.ajax({
            url: "getcardetails.php",
            success: function(data2){
                console.log(data2);
                $("#spinner").css("display", "none");
                $('#mycar').html(data2);
                $('#mycar').hide();
                $('#mycar').fadeIn();
        },
            error: function(){
                $("#spinner").css("display", "none");
                $('#mycar').html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");
                $('#mycar').hide();
                $('#mycar').fadeIn();
    }
        }); 
    }
    
    
    $('#deletecarModal').on('show.bs.modal', function (e) {
        var $invoker = $(e.relatedTarget);
        console.log($invoker.data('car_id'));
        $("#deletecarmessage").hide();
    
    $('#deletecarform').submit(function(event){
            event.preventDefault();
            //var $invoker = $(event.relatedTarget);
            data = $('#deletecarform').serializeArray();
            data.push({name: 'car_id', value: $invoker.data('car_id')});
            $.ajax({
            url: "deletecar.php",
            type: "POST",
            data: data,
            success: function(data2){
            if(data2){
                    $("#deletecarmessage").html(data2);
                    $("#deletecarmessage").slideDown();
                    $("#deletecarModal").modal('hide');
                    
                }
                else{
                    location.reload();
                }
            },
            error: function(){
            $("#deletecarmessage").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Please try again later.</div>");
            $("#deletecarmessage").slideDown();
            
        }
     });
});     
});
    
});