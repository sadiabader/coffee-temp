<?php
include('config.php');

$id = $_POST['id'];
$name = $_POST['pname'];
$pdescription = $_POST['pdescription'];
$price = $_POST['price'];
$pimage = $_FILES['pimage']['name'];
$pimage_tmp = $_FILES['pimage']['tmp_name'];
$pimage_size = $_FILES['pimage']['size'];


$updates = "UPDATE `product` SET `pname`='$name',`pdescription`='$pdescription',`price`='$price',`pimage`='$pimage' WHERE id ='$id'";
move_uploaded_file($pimage_tmp, 'img/' . $pimage);
$resu = mysqli_query($conn , $updates);
if (!$resu) {
    die("Query failed");
}
header('location:viewproduct.php');
?>