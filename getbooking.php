<?php
//start session and connect
session_start();
include('connection.php');

//retrieve all trips
$sql="SELECT * FROM booking WHERE user_id='".$_SESSION['user_id']."'";
$result = mysqli_query($link, $sql);
if(mysqli_num_rows($result) == 0){
    echo "<div class='alert alert-info noresults'>You have not booked any trip yet!</div>"; exit;
}
echo '<div id="message">';
if(mysqli_num_rows($result) > 0){
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        //get trip user id
        $trip_id = $row['trip_id'];
        
        //run query to get user details
        $sql2="SELECT * FROM carsharetrips WHERE trip_id='$trip_id' LIMIT 1";
        $result2 = mysqli_query($link, $sql2);
        if($result2){
            
            //get user details         
            $row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);
            
            
            $sql3="SELECT * FROM users WHERE user_id='".$row2['user_id']."' LIMIT 1";
            $result3 = mysqli_query($link, $sql3);
            $row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC);
            
            
            $sql4="SELECT * FROM cardetails WHERE user_id='".$row2['user_id']."' LIMIT 1";
            $result4 = mysqli_query($link, $sql4);
            $row4 = mysqli_fetch_array($result4, MYSQLI_ASSOC);
            
            $picture = $row3['profilepicture'];
            //get firstname
            $firstname = $row3['first_name'];
            $pickup=$row['pickup_location'];
            
            
            if($row2['regular']=="N"){
                $source = $row2['date'];
                $tripDate = DateTime::createFromFormat('D d M, Y', $source);
            }
            
            //get trip departure
            $tripDeparture = $row2['departure'];
            
            //get trip destination
            $tripDestination = $row2['destination'];
            
            
            //Get trip frequency and time:
            if($row2['regular']=="N"){
                $frequency = "One-off journey.";
                $time = $row2['date']." at " .$row2['time'].".";
            }else{
                $frequency = "Regular.";
                $weekdays=['monday'=>'Mon','tuesday'=>'Tue','wednesday'=>'Wed','thursday'=>'Thu','friday'=>'Fri','saturday'=>'Sat','sunday'=>'Sun'];
                $array = [];
                foreach($weekdays  as $key => $value){
                    if($row2[$key]==1){
                        array_push($array,$value);
                    }
                    $time = implode("-", $array)." at " .$row2['time'].".";
                }
            }
            //print trip
           echo 
             '<div class="row trip panel-heading" href="#info'.$row['book_id'].'" data-toggle="collapse">
                    <div class="col-sm-2 journey">
                        <div class="driver">'.$row3['first_name'].'
                        </div>
                        <div>
                            <img class="previewing" src="'.$picture.'" />
                        </div>
                    </div>

                    <div class="col-sm-8 journey">
                        <div><span class="departure">Departure:</span> '.$row2['departure'].'.</div>
                        <div><span class="destination">Destination:</span> '. $row2['destination'] .'.</div>
                        <div class="time">'.$time.'</div>
                        <div><span class="status">Price: Rs '.$row2['price'].'</span><span class="status">     Status:</span> '.$row['status'].'</div>
                    </div>
                    <div class="col-sm-2">';
                        if($row['status']=='Pending'){
                        echo'<button id="cancelbutton" class= "btn green" data-target="
                        #cancelbookingModal" data-toggle="modal" data-book_id="'.$row['book_id'].'"><h6>Cancel</h6></button>';
                        }
                    echo'</div>
                </div>
               
                <div class="row moreinfo panel-body collapse" id="info'.$row['book_id'].'">
                    <div class="col-sm-4 journey">
                        <div>
                            Gender: '.$row3['gender'].'
                        </div>
                        <div class="telephone">
                            &#9742: '.$row3['phonenumber'].'
                        </div>
                         <div class="aboutme"> 
                        About me: '.$row3['moreinformation'].'
                        </div>
                    </div>
                    <div class="col-sm-4 align-items-center journey">
                        <div>Brand: '.$row4['carbrand'].'</div>
                        <div>Model: '. $row4['carmodel'] .'</div>
                        <div class="time">'. $row4['plateno'] .'</div>
                    </div>
                    
            </div>';
               
            
                
       }
    
    }
}else{
        echo '<div class="alert alert-warning">You Have not booked any trips yet</div>';
}
echo '</div>';
?>