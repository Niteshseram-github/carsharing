<?php
//echo 'success';
//<!--Start session-->
session_start();
include('connection.php'); 
}/*
//<!--Check user inputs-->
//    <!--Define error messages-->
$missingcarbrand = '<p><strong>Please enter your Car Brand!</strong></p>';
$missingcarmodel = '<p><strong>Please enter your Car Model!</strong></p>';
$missingregno = '<p><strong>Please enter your registration number!</strong></p>';
$missingplateno = '<p><strong>Please enter your plate no.!</strong></p>';
//get car brand
if(empty($_POST["carbrand"])){
    $errors .= $missingcarbrand;
}else{
    $carbrand = filter_var($_POST["carbrand"], FILTER_SANITIZE_STRING);   
} 
//Get car model
if(empty($_POST["carmodel"])){
    $errors .= $missingcarmodel;
}else{
    $carmodel = filter_var($_POST["carmodel"], FILTER_SANITIZE_STRING);

//Get registration no.
if(empty($_POST["regno"])){
    $errors .= $missingregno;
}else{
    $regno = filter_var($_POST["regno"], FILTER_SANITIZE_STRING);
}

//Get plate no.
if(empty($_POST["plateno"])){
    $errors .= $missingplateno;
}else{
    $plateno = filter_var($_POST["plateno"], FILTER_SANITIZE_STRING);
}
    
//If there are any errors print error
if($errors){
    $resultMessage = '<div class="alert alert-danger">' . $errors .'</div>';
    echo $resultMessage;
    exit;
}

//no errors

//Prepare variables for the queries
$user_id = $SESSION('user_id');
$carbrand = mysqli_real_escape_string($link, $carbrand);
$carmodel = mysqli_real_escape_string($link, $carmodel);
$regno = mysqli_real_escape_string($link, $regno);
$plateno = mysqli_real_escape_string($link, $plateno);
    
//Insert car details
$sql = "INSERT INTO cardetails (`user_id`,`carbrand`, `carmodel`, `regno`, `plateno`) VALUES ('$user_id','$carbrand', '$carmodel', '$regno', '$plateno')";
    
$result = mysqli_query($link, $sql);
if(!$result){
    echo '<div class="alert alert-danger">There was an error inserting the users details in the database!</div>'; 
    exit;
}
else
    echo 'Car details added successfully';
    exit;
    */
?>