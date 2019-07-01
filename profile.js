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


//Ajax Call for the insert car details form 
//Once the form is submitted
$("#insertcardetailsform").submit(function(event){
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
$("#updatecarbrandform").submit(function(event){ 
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

});


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