<?php
include 'config.php';

$user_id = $_POST['id'];
$user_name = $_POST['name'];
$user_type = $_POST['type'];
$user_desc = $_POST['description'];
$update = "UPDATE `category` set name ='$user_name' ,type ='$user_type' , description = '$user_desc' where id = '$user_id' ";
$res = mysqli_query($conn, $update);
if (!$res) {
    die("Query failed");
}
header('location:viewcat.php');
?>