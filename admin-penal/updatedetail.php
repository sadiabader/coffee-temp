<?php
include 'config.php';

$user_id = $_POST['id'];
$user_name = $_POST['FirstName'];
$user_lname = $_POST['LastName'];
$user_email = $_POST['email'];
$update = "UPDATE `register-user` set fname ='$user_name' ,lname ='$user_lname' , email = '$user_email' where id = '$user_id' ";
$res = mysqli_query($conn, $update);
if (!$res) {
    die("Query failed");
}
header('location:viewuser.php');
?>