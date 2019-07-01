<?php

//start session and connect
session_start();
include ('connection.php');

//get user_id
$id = $_SESSION['user_id'];

//Get username sent through Ajax
$plateno = $_POST['plateno'];

$sql = "SELECT * FROM cardetails WHERE user_id='$id'";
$result = mysqli_query($link, $sql);
$count = mysqli_num_rows($result);
//consoole.log("$count");
if($count==0){
    $sql="INSERT INTO cardetails (user_id) VALUES($id)";
    $result=mysqli_query($link,$sql);
}

$sql = "SELECT * FROM cardetails WHERE plateno='$plateno'";
$result = mysqli_query($link, $sql);
$count = $count = mysqli_num_rows($result);
if($count>0){
    echo "<div class='alert alert-danger'>There is already as user with that plate number!</div>"; exit;
}else{

//Run query and update username
$sql = "UPDATE cardetails SET plateno='$plateno' WHERE user_id='$id'";
$result = mysqli_query($link, $sql);
}

if(!$result){
    echo '<div class="alert alert-danger">There was an error updating storing the new username in the database!</div>';
}

?>