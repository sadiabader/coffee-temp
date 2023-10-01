
<?php

include('config.php');

$user_id = $_GET['id'];
$deldata ="DELETE  from product where id = '$user_id'";
$connection = mysqli_query($conn , $deldata);
if($connection){
    "<script> alert('are you sure?'); </script>";
    header('location:viewproduct.php');
}

?>