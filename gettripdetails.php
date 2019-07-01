<?php
//start session and connect
session_start();
include('connection.php');

$sql="SELECT * FROM carsharetrips WHERE trip_id='".$_POST['trip_id']."'"; 
$result = mysqli_query($link, $sql);
$row = mysqli_fetch_array($result);

$sql2="SELECT * FROM cardetails WHERE id='".$row['car_id']."'"; 
$result2 = mysqli_query($link, $sql2);
$row2 = mysqli_fetch_array($result2);

$array = array("trip_id"=>$row['trip_id'], "departure"=>$row['departure'], "destination"=>$row['destination'], "price"=>$row['price'], "seatsavailable"=>$row['seatsavailable'],"car"=>$row2['plateno'],"car_id"=>$row['car_id'], "date"=>$row['date'], "time"=>$row['time']);
echo json_encode($array);

?>