<?php
include('conn.php');
extract($_GET);
mysqli_query($conn,"DELETE FROM expence WHERE expence_id = '$id'");
header('location:history.php');
?>