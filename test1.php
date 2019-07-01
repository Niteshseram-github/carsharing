<!DOCTYPE html>
<html>
<body>

<?php
include('connection.php');
$duration = "";
$res = mysqli_query($link,"select * from test");
while($row = mysqli_fetch_array($res))
{
    $duration = $row["duration"];
}

$_SESSION["duration"] = $duration;
$_SESSION["start_time"] = date("Y-m-d H:i:s");
    
$end_time = date('Y-m-d H:i:s', strtotime('+'.$_SESSION["duration"].'minutes',strtotime($SESSION["start_time"])));
    
$_SESSION["end_time"] = $end_time;
?>

</body>
</html>