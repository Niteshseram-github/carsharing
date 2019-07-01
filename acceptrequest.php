<?php
//start session and connect
session_start();
include('connection.php');
$book_id = $_POST['book_id'];
$trip_id = $_POST['trip_id'];
$tbl_name='booking';

$sql = "SELECT * FROM $tbl_name WHERE book_id='$book_id'";
$result = mysqli_query($link, $sql);
if($result){
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    if($row['status']=='Accepted'){
        exit;
    }
}
$sql2="SELECT * FROM carsharetrips WHERE trip_id='$trip_id'";
$result2 = mysqli_query($link, $sql2);
$row2 = mysqli_fetch_array($result2);
$seat=$row2['seatsavailable']-1;
$sql = "UPDATE $tbl_name SET status='Accepted' WHERE book_id='$book_id'";
$result = mysqli_query($link, $sql);

$sql1 = "UPDATE carsharetrips SET seatsavailable='$seat' WHERE trip_id='$trip_id'";
$result1 = mysqli_query($link, $sql1);
    //check if query is successful
    if(!$result || !result1){
        echo "<div class='alert alert-danger'>The request could not be made. Please try again.</div>";
    }else{
        echo "<div class='alert alert-success'>You have accepted the booking successfully.</div>";
    }
?>