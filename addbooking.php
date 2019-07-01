<?php
//start session and connect
session_start();
include('connection.php');
$trip_id = $_POST['trip_id'];
$pickup = $_POST['pickup'];
$tbl_name='booking';
$user_id=$_SESSION['user_id'];

$sql = "SELECT * FROM $tbl_name WHERE user_id='$user_id'";
$result = mysqli_query($link, $sql);
if($result){
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    if($trip_id==$row['trip_id']){
        exit;
    }
}

$sql = "INSERT INTO $tbl_name (`user_id`,`trip_id`,`pickup_location`,`status`) VALUES ( '$user_id','$trip_id','$pickup','Pending')";
$results = mysqli_query($link, $sql);
    //check if query is successful
    if(!$results){
        echo "<div class='alert alert-danger'>The request could not be made. Please try again.</div>";
    }else{
        echo "<div class='alert alert-success'>You have requested the booking successfully.</div>";
    }
?>