<?php
//start session and connect
session_start();
include('connection.php');

//define error messages
$missingbrand = '<p><strong>Please enter your Car Brand!</strong></p>';
$missingmodel = '<p><strong>Please enter your Car Model!</strong></p>';
$missingregno = '<p><strong>Please enter your Registration number!</strong></p>';
$missingplateno = '<p><strong>Please enter your Plate number!</strong></p>';
$invalidregno = '<p><strong>Please enter a valid Registration Number!</strong></p>';
$invalidplateno = '<p><strong>Please enter a valid Plate Number!</strong></p>';
$existregno = '<p><strong>This registration number already exists! Please choose another one!</strong></p>';
$existplateno = '<p><strong>This plate number already exists! Please choose another one!</strong></p>';


//Get inputs:
$brand = ucfirst($_POST["brand"]);
$model = ucfirst($_POST["model"]);
$regno = $_POST["regno"];
$plateno = $_POST["plateno"];





//Check brand:
if(!$brand){
    $errors .= $missingbrand;   
}else{
    $brand = filter_var($brand, FILTER_SANITIZE_STRING); 
}

//Check destination:
if(!$model){
    $errors .= $missingmodel;   
}else{
    $model = filter_var($model, FILTER_SANITIZE_STRING); 
}

//Check Price
if(!$regno){
    $errors .= $missingregno; 
}else if(strlen($regno)==17)  
{
        $regno = filter_var($regno, FILTER_SANITIZE_STRING);  
}else{
    $errors .= $invalidregno;   
}

//Check Seats Available
if(!$plateno){
    $errors .= $missingplateno; 
}else if(strlen($plateno)==6)  // you can use ctype_digit($seatsavailable)
{
        $plateno = filter_var($plateno, FILTER_SANITIZE_STRING);  
}else{
       $errors .= $invalidplateno;  
}
$sql1 = "SELECT * FROM cardetails WHERE regno='$regno'";
$result1 = mysqli_query($link, $sql1);
if(mysqli_num_rows($result1)>0){
    $errors .= $existregno;
}

$sql2 = "SELECT * FROM cardetails WHERE plateno='$plateno'";
$result2 = mysqli_query($link, $sql2);
if(mysqli_num_rows($result2)>0){
    $errors .= $existplateno;
}


//if there is an error print error message
if($errors){
    $resultMessage = "<div class='alert alert-danger'>$errors</div>";
    echo $resultMessage;
}else{
    //no errors, prepare variables for the query
    $tbl_name = 'cardetails';
        //query for a regular trip
        $sql = "INSERT INTO cardetails (`user_id`,`carbrand`, `carmodel`, `regno`, `plateno`) VALUES ('".$_SESSION['user_id']."', '$brand','$model',UPPER('$regno'),UPPER('$plateno'))";
    $results = mysqli_query($link, $sql);
    //check if query is successful
    if(!$results){
        echo '<div class=" alert alert-danger">There was an error! The car details could not be added to database!</div>';        
    }
}

?>