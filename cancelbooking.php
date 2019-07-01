<?php
//start session and connect
session_start();
include('connection.php');
$trip_id = $_POST['trip_id'];
$tbl_name='books';
$user_id=$_SESSION['user_id'];

$sql = "DELETE FROM $tbl_name WHERE trip_id='$trip_id' AND user_id='$user_id'";
$result = mysqli_query($link, $sql);
    //check if query is successful
    if(!$result){
        echo "<div class='alert alert-danger'>The request could not be made. Please try again.</div>";
    }else{
        echo "<div class='alert alert-success'>You have cancelled the booking successfully.</div>";
    }
?>