<?php
//start session and connect
session_start();
include('connection.php');
$book_id = $_POST['book_id'];
$tbl_name='booking';
$user_id=$_SESSION['user_id'];

$sql = "DELETE FROM $tbl_name WHERE book_id='$book_id'";
$result = mysqli_query($link, $sql);
    //check if query is successful
    if(!$result){
        echo "<div class='alert alert-danger'>The request could not be made. Please try again.</div>";
    }else{
        echo "<div class='alert alert-success'>You have cancelled the booking successfully.</div>";
    }
?>