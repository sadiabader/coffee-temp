<?php
include('config.php');
$user_id = $_GET['id'];

$delete = "UPDATE `category` SET status = '0' where id = $user_id";

$result = mysqli_query($conn, $delete);

if (!$delete) {
    die("Query Failed");
}
header('location:trashdatacat.php');
?>