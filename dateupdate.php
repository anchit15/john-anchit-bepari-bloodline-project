<?php
include_once "connection.php";
include_once "session.php";
session_start();
$date = date('Y/m/d');
$user = $_SESSION['user'];
$sql= "UPDATE donor_info SET lastdonate = '$date' WHERE username='$user'";
mysqli_query($conn,$sql);
header("Location:profile.php");
?>