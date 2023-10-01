<?php

include('config.php');

$user_id = $_GET['id'];
$deldata ="DELETE  from category where id = '$user_id'";
$connection = mysqli_query($conn , $deldata);
if($connection){
    "<script> alert('are you sure?'); </script>";
    header('location:viewcat.php');
}

?>