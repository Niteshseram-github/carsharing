<?php

//start session and connect
session_start();
include ('connection.php');

//get user_id
$id = $_SESSION['user_id'];

//Get username sent through Ajax
$carbrand = $_POST['carbrand'];

//Run query and update username
$sql = "SELECT * FROM cardetails WHERE user_id='$id'";
$result = mysqli_query($link, $sql);
$count = mysqli_num_rows($result);
//consoole.log("$count");
if($count==0){
    $sql="INSERT INTO cardetails (user_id) VALUES($id)";
    $result=mysqli_query($link,$sql);
}
$sql = "UPDATE cardetails SET carbrand='$carbrand' WHERE user_id='$id'";
$result = mysqli_query($link, $sql);

if(!$result){
    echo '<div class="alert alert-danger">There was an error updating storing the new username in the database!</div>';
}

?>