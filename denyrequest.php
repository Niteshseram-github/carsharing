<?php
//start session and connect
session_start();
include('connection.php');
$user_id = $_POST['user_id'];
$trip_id = $_POST['trip_id'];

$tbl_name='books';

$sql = "SELECT * FROM $tbl_name WHERE user_id='$user_id' AND trip_id='$trip_id'";
$result = mysqli_query($link, $sql);
if($result){
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    if($row['status']=='Denied'){
        exit;
    }
}

$sql = "UPDATE $tbl_name SET status='Denied' WHERE user_id='$user_id' AND trip_id='$trip_id'";
$result = mysqli_query($link, $sql);

$results = mysqli_query($link, $sql);
    //check if query is successful
    if(!$results){
        echo "<div class='alert alert-danger'>The request could not be made. Please try again.</div>";
    }else{
        echo "<div class='alert alert-success'>You have denied the booking successfully.</div>";
    }
?>