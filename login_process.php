<?php
session_start();
extract($_POST);
include('conn.php');
$user = addslashes($user);
$password = addslashes($password);
$res=mysqli_query($conn,"SELECT * FROM adminexpencejp WHERE user = '$user' AND password = '$password'");
if(mysqli_num_rows($res) > 0){
    $_SESSION['user_name'] = $user;
    header('location:index.php');
}
else{
    header('location:login.php');
}
?>