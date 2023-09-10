<?php
include('conn.php');
date_default_timezone_set('Asia/Kolkata');
$time = date('h:i:s:A');
extract($_POST);
$amount = addslashes($amount);
    $sql = "INSERT INTO expence (income_amount,expence_date,expence_time) VALUES ('$amount','$date','$time')";
mysqli_query($conn,$sql);
header('location:index.php');

?>