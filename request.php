<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header("location: index.php");
}
include('connection.php');


?>

<?php
$user_id = $_SESSION['user_id'];
define(MYSQL_ASSOC);

//get username and email
$sql = "SELECT * FROM users WHERE user_id='$user_id'";
$result = mysqli_query($link, $sql);

$count = mysqli_num_rows($result);

if($count == 1){
    $row = mysqli_fetch_array($result, MYSQL_ASSOC); 
    $username = $row['username'];
    $picture = $row['profilepicture'];
}else{
    echo "There was an error retrieving the username and email from the database";   
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Request</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="styling.css" rel="stylesheet">
      <link href='https://fonts.googleapis.com/css?family=Arvo' rel='stylesheet' type='text/css'>
      <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/sunny/jquery-ui.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
      <style>
        #requestcontainer{
            margin-top:120px;   
        }
          #acceptbutton, #denybutton{
              margin-bottom: 10px;
              width: 100%;
              text-align: center;
              font-size: 20px;
          }
        #notePad, #allNotes, #done, .delete{
            display: none;   
        }
        textarea{
            width: 100%;
            max-width: 100%;
            font-size: 16px;
            line-height: 1.5em;
            border-left-width: 20px;
            border-color: #CA3DD9;
            color: #CA3DD9;
            background-color: #FBEFFF;
            padding: 10px;
              
        }
        
        .noteheader{
            border: 1px solid grey;
            border-radius: 10px;
            margin-bottom: 10px;
            cursor: pointer;
            padding: 0 10px;
            background: linear-gradient(#FFFFFF,#ECEAE7);
        }
          
        .text{
            font-size: 20px;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
        }
          
        .timetext{
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
        }
        .notes{
            margin-bottom: 100px;
        }
          
        #googleMap{
            width: 300px;
            height: 200px;
            margin: 30px auto;
        }
        .modal{
            z-index: 20;   
        }
        .modal-backdrop{
            z-index: 10;        
        }
        #spinner{
          display: none;
          position: fixed;
          top: 0;
          left: 0;
          bottom: 0;
          right: 0;
          height: 85px;
          text-align: center;
          margin: auto;
          z-index: 1100;
      }
        .checkbox{
            margin-bottom: 10px;   
        }
        .trip{
            border:1px solid grey;
            border-radius: 10px;
            margin-top:10px;
            background: linear-gradient(#ECE9E6, #FFFFFF);
            padding: 10px;
        }
        .moreinfo{
            border:1px solid grey;
            border-radius: 10px;
            margin-bottom:10px;
            background: linear-gradient(#ECE9E6, #FFFFFF);
            padding: 10px;
            text-align: left;
        }
        .price{
            margin-top: 10px;
            font-size:1.3em;
            text-align: left;
        }
        .pricesize{
            font-size:1.1em;
          }
        .departure, .destination{
            font-size:1.5em;
        } 
        .status{
            font-size:1.3em;
        }
          .plate{
              font-size: 1.2em;
          }  
        
        .time{
            margin-top:10px;  
        }  
        .notrips{
            text-align:center;
        }
        .trips{
            margin-top: 20px;
        }
        .previewing2{
            margin: auto;
            height: 20px;
            border-radius: 50%;
        }
          .previewing{
              max-width: 100%;
              height: auto;
              border-radius: 50%;
          }
          #myrequest{
            margin-bottom: 100px;   
          }
          .driver{
            font-size:1.5em;
            text-transform:capitalize;
            text-align: center;
          }
      </style>
  </head>
  <body>
    <!--Navigation Bar-->  
      <nav role="navigation" class="navbar navbar-custom navbar-fixed-top">
      
          <div class="container-fluid">
            
              <div class="navbar-header">
              
                  <a class="navbar-brand">Car Sharing</a>
                  <button type="button" class="navbar-toggle" data-target="#navbarCollapse" data-toggle="collapse">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                  
                  </button>
              </div>
              <div class="navbar-collapse collapse" id="navbarCollapse">
                  <ul class="nav navbar-nav">
                    <li><a href="index.php">Search</a></li>  
                    <li ><a href="profile.php">Profile</a></li>
                    <li><a href="booking.php">Booking</a></li>
                    <li class="active"><a href="#">Request</a></li>
                      <li><a href="mainpageloggedin.php">My Trips</a></li>
                  </ul>
                  <ul class="nav navbar-nav navbar-right">
                      <li><a href="#">
                            <?php
                                if(empty($picture)){
                                    echo "<div class='image_preview'  data-target='#updatepicture' data-toggle='modal'><img class='previewing2' src='profilepicture/noimage.jpg' /></div>";
                                }else{
                                    echo "<div class='image_preview' data-target='#updatepicture' data-toggle='modal'><img class='previewing2' src='$picture' /></div>";
                                }

                              ?>
                          </a>
                      </li>
                      <li><a href="#"><b><?php echo $username; ?></b></a></li>
                    <li><a href="index.php?logout=1">Log out</a></li>
                  </ul>
              
              </div>
          </div>
      
      </nav>
    
<!--Container-->
      
      <div class="container" id="requestcontainer">
          <div class="row">
              <div class="col-sm-8 col-sm-offset-2">
                  <div id="myrequest" class="trips">
                      <!--Ajax Call to php file-->
                  </div>
              </div>

          </div>
      </div>
      
      <!--accept Booking Form-->    
      <form method="post" id="acceptbookingform">
        <div class="modal" id="acceptbookingModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button class="close" data-dismiss="modal">
                    &times;
                  </button>
                  <h4 id="myModalLabel">
                    Are you sure you want to accept this booking?
                  </h4>
              </div>
            <div class="modal-body">
                  
                  <!--Bokking message from PHP file-->
                  <div id="acceptbookingmessage"></div>
                  

                  <!--<div class="form-group">
                      <label for="loginemail" class="sr-only">Email:</label>
                      <input class="form-control" type="email" name="loginemail" id="loginemail" placeholder="Email" maxlength="50">
                  </div>-->
                  
              </div>
              <div class="modal-footer">
                  <input class="btn green" name="yes" type="submit" value="Yes">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                  No
                </button>
              </div>
          </div>
      </div>
      </div>
      </form>
      
      <!--Cancel Booking Form-->    
      <form method="post" id="denybookingform">
        <div class="modal" id="denybookingModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button class="close" data-dismiss="modal">
                    &times;
                  </button>
                  <h4 id="myModalLabel">
                    Are you sure you want to deny this booking?
                  </h4>
              </div>
            <div class="modal-body">
                  
                  <!--Bokking message from PHP file-->
                  <div id="denybookingmessage"></div>
                  

                  <!--<div class="form-group">
                      <label for="loginemail" class="sr-only">Email:</label>
                      <input class="form-control" type="email" name="loginemail" id="loginemail" placeholder="Email" maxlength="50">
                  </div>-->
                  
              </div>
              <div class="modal-footer">
                  <input class="btn green" name="cancel" type="submit" value="Yes">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                  No
                </button>
              </div>
          </div>
      </div>
      </div>
      </form>
      
    <!-- Footer-->
      <div class="footer">
          <div class="container">
              <p>MiniProject Copyright &copy; 2019.</p>
          </div>
      </div>
      <!--Spinner-->
      <div id="spinner">
         <img src='ajax-loader.gif' width="64" height="64" />
         <br>Loading..
      </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
      <script src="trip.js"></script>
  </body>
</html>