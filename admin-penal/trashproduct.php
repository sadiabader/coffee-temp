<?php
include('config.php');
$id = $_GET['id'];

$delete = "UPDATE `product` SET status = '0' where id = $id";

$result = mysqli_query($conn, $delete);

if (!$delete) {
    die("Query Failed");
}
header('location:trashdataproduct.php');
?>