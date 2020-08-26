<?php
session_start();
include_once "connection.php";
if (isset($_POST['username1']) && isset($_POST['password1'])) {
$username1 = $_POST['username1'];
$password1 = $_POST['password1'];
$sql_2 = "SELECT * FROM donor_info WHERE username='$username1' AND password='$password1'";
$result_2 = mysqli_query($conn,$sql_2);

if (mysqli_num_rows($result_2) > 0) {
            
    while($row = mysqli_fetch_assoc($result_2)) {
        $_SESSION['user'] = $username1;
        header("Location:profile.php");
    }
} else {
    header("Location:index.php");
}


}
             
?>