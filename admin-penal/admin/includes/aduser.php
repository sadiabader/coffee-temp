<?php

include("config.php");

if (isset($_POST["adduser"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $pass = $_POST["pass"];
    $cpass = $_POST["cpass"];
    $phone = $_POST["phone"];

    if ($pass === $cpass) {

        $password = password_hash($pass, PASSWORD_BCRYPT);

        $email_check = "SELECT * FROM  user-admin  where email = '$email'";
        $result = mysqli_query($conn, $email_check);
        if (mysqli_num_rows($result) > 0) {
            echo "<script> alert('Email already exist'); </script>";
        } else {
            $insert_query = "INSERT INTO `user-admin` (`name`, `email`, `Password`, `phone`) VALUES ('$name', '$email', '$password','$phone')";
            $connection_insert = mysqli_query($conn, $insert_query);
            header('location:registeredusers.php');
        }
    } else {
        echo "Password dosen't match";
    }
}
;
?>