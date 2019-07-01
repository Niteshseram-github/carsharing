<?php
//start session and connect
session_start();
include('connection.php');

//retrieve all trips
$sql="SELECT * FROM cardetails WHERE user_id='".$_SESSION['user_id']."'";
if($result = mysqli_query($link, $sql)){
    //print_r($result);
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_array($result)){
            $brand=ucfirst($row['carbrand']);
            $model=ucfirst($row['carmodel']);
            $regno=strtoupper($row['regno']);
            $plateno=strtoupper($row['plateno']);
            echo 
             '<div class="row trip">
                    <div class="col-sm-10 journey">
                        <div><span class="departure">Car Brand:</span> '.$brand.'</div>
                        <div><span class="destination">Car Model:</span> '.$model.'</div>
                        <div><span class="destination">Registration Number:</span>  '.$regno.'</div>
                        <div><span class="destination">Plate Number:</span> '.$plateno.'</div>
                    </div>
                    <div class="col-sm-1">
                        <button class= "btn btn-danger edit btn-lg pull-right" data-target="#deletecarModal" data-toggle="modal" data-car_id="'.$row['id'].'">Delete</button>
                        
                    </div>
                </div>';
        }
    }else{
        echo '<div class="notrips alert alert-warning">You have not added any car details yet</div>';
    }
}
?>