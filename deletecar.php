<?php
//start session and connect
session_start();
include('connection.php');
$sql="DELETE FROM cardetails WHERE id='".$_POST['car_id']."'";
$result = mysqli_query($link, $sql);

?>