<?php
//start session and connect
session_start();
include('connection.php');

$sql="SELECT * FROM carsharetrips WHERE user_id='".$_SESSION['user_id']."'";
$result = mysqli_query($link, $sql);
if(mysqli_num_rows($result) == 0){
    exit;
}
if(mysqli_num_rows($result)>0){
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){

$sql1="SELECT * FROM booking WHERE trip_id='".$row['trip_id']."'";
$result1 = mysqli_query($link, $sql1);
if(mysqli_num_rows($result1) == 0){
    echo "<div class='alert alert-info noresults'>There is no request for any trips yet!</div>"; exit;
    }
if(mysqli_num_rows($result1) > 0 ){
while($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC)){
        //get trip user id
        
        //run query to get user details
        $sql2="SELECT * FROM users WHERE user_id='".$row1['user_id']."' LIMIT 1";
        $result2 = mysqli_query($link, $sql2);
        if($row1['status']=='Pending' || $row1['status']=='Accepted'){
            
            //get user details         
            $row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);
            
            $picture = $row2['profilepicture'];
            //get firstname
            $firstname = $row2['first_name'];
            
            
            if($row['regular']=="N"){
                $source = $row['date'];
                $tripDate = DateTime::createFromFormat('D d M, Y', $source);
            }
            
            //get trip departure
            //$tripDeparture = $row['departure'];
            
            //get trip destination
            //$tripDestination = $row['destination'];
            $pickup=$row1['pickup_location'];
            
            
            //Get trip frequency and time:
            if($row['regular']=="N"){
                $frequency = "One-off journey.";
                $time = $row['date']." at " .$row['time'].".";
            }else{
                $frequency = "Regular.";
                $weekdays=['monday'=>'Mon','tuesday'=>'Tue','wednesday'=>'Wed','thursday'=>'Thu','friday'=>'Fri','saturday'=>'Sat','sunday'=>'Sun'];
                $array = [];
                foreach($weekdays  as $key => $value){
                    if($row[$key]==1){
                        array_push($array,$value);
                    }
                    $time = implode("-", $array)." at " .$row['time'].".";
                }
            }
            //print trip
           echo 
             '<div class="row trip panel-heading" href="#info'.$row['book_id'].'" data-toggle="collapse">
                    <div class="col-sm-2 journey">
                        <div class="driver">'.$row2['first_name'].'
                        </div>
                        <div>
                            <img class="previewing" src="'.$picture.'" />
                        </div>
                    </div>

                    <div class="col-sm-8 journey">
                        <div><span class="departure">Departure:</span> '.$row['departure'].'.</div>
                        <div><span class="destination">Destination:</span> '. $row['destination'] .'.</div>
                        <div class="time">'.$time.'</div>
                        <div><span class="status">Price: Rs '.$row['price'].'';
                    if($pickup==NULL){
                        echo'
                                Pickup Location: </span>Not Provided
                            </div>';
                    }
                    else
                    {
                        echo'
                                Pickup Location: </span>'.$pickup.'
                            </div>';
                    }
            echo'</div>
                    <div class="col-sm-2">';
                    if($row1['status']=="Pending"){
                    echo'
                        <div>
                            <button id="acceptbutton" class= "btn green" data-target="
                            #acceptbookingModal" data-toggle="modal" data-book_id="'.$row1['book_id'].'" data-trip_id="'.$row['trip_id'].'""><h6>Accept</h6></button>
                        </div>
                        <div>
                            <button id="denybutton" class= "btn green" data-target="
                            #denybookingModal" data-toggle="modal" data-book_id="'.$row1['book_id'].'"><h6>Deny</h6></button>
                        </div>';
                    }
                    else if($row1['status']=='Accepted'){
                    echo'<button id="acceptbutton" class= "btn green"><h6>Accepted</h6></button>';
                    }
                    echo'</div>
                    
                </div>
               
                <div class="row moreinfo panel-body collapse" id="info'.$row['book_id'].'">
                    <div class="col-sm-2 journey">
                        <div>
                            Gender: '.$row2['gender'].'
                        </div>
                        <div class="telephone">
                            &#9742: '.$row2['phonenumber'].'
                        </div>
                         <div class="aboutme"> 
                        About me: '.$row2['moreinformation'].'
                        </div>
                    </div>
            </div>';
               
            
                
       }
    
    }
}
}
}else{
        echo '<div class="alert alert-warning">You have no request for any trips yet!</div>';
}
?>