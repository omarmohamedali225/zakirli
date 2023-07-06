<?php
 
 include('../connection/config.php');
 
session_start();
$userID = $_SESSION['user_id'];
$type = $_SESSION['type'];
if(!isset($userID)){
  header('location:login.php');
}
if($type=='user'){
    header('location:showlog.php');
}
$ID = $_GET['delete'];
mysqli_query($con, "DELETE FROM `users` WHERE id=$ID");
header('location:./admin.php');

?>