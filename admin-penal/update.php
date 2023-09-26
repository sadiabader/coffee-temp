<?php
include 'config.php';

$user_id = $_POST['id'];
$user_name = $_POST['name'];
$user_email = $_POST['email'];
$user_phone = $_POST['phone'];

$update = "UPDATE `user-admin` SET name ='$user_name' , email = '$user_email' , phone = '$user_phone' where id = '$user_id' ";
$res = mysqli_query($conn, $update);
if (!$res) {
    die("Query failed");
}
header('location:registeredusers.php');
?>