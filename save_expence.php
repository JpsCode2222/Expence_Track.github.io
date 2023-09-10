<?php
include('conn.php');
date_default_timezone_set('Asia/Kolkata');
$time = date('h:i:s:A');
extract($_POST);
$vendor = addslashes($vendor);
$amount = addslashes($amount);
$details = addslashes($details);
if(isset($exp_id)){
    $sql = "UPDATE expence SET vendor_name = '$vendor' , amount = '$amount' , details = '$details' , expence_date = '$date' , expence_time = '$time' WHERE expence_id = $exp_id";
}
else{
    $sql = "INSERT INTO expence(vendor_name,amount,details,expence_date,expence_time) VALUES ('$vendor','$amount','$details','$date','$time')";
}
mysqli_query($conn,$sql);
header('location:index.php');

?>