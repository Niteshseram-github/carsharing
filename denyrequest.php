<?php
//start session and connect
session_start();
include('connection.php');
$book_id = $_POST['book_id'];
$tbl_name='booking';

$sql = "SELECT * FROM $tbl_name WHERE book_id='$book_id'";
$result = mysqli_query($link, $sql);
if($result){
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    if($row['status']=='Denied'){
        exit;
    }
}

$sql = "UPDATE $tbl_name SET status='Denied' WHERE book_id='$book_id'";
$result = mysqli_query($link, $sql);

$results = mysqli_query($link, $sql);
    //check if query is successful
    if(!$results){
        echo "<div class='alert alert-danger'>The request could not be made. Please try again.</div>";
    }else{
        echo "<div class='alert alert-success'>You have denied the booking successfully.</div>";
    }
?>