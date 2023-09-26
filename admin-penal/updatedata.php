<?php
include('includes/header.php');
include('includes/topbar.php');
include('includes/sidebar.php');
include('config.php');
$user_id = $_GET['id'];
$getid = "SELECT * from `user-admin` where id ='$user_id'";
$result = mysqli_query($conn, $getid);
if (!$result) {
    die("Query Failed");
}
if (mysqli_num_rows($result) > 0) {
    while ($rows = mysqli_fetch_assoc($result)) {
        ?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="CSS/Updateuser.css">
            <title>Update User Details</title>
        </head>

        <body>
            <div class="col-md-6 zain">
                <form action="UpdateDetail.php" method="post" class="form-group ">
                    <h1>Update User Details</h1>
                    <div>
                        <input type="hidden" name="id" class="form-control" value="<?php echo $rows['id'] ?>">
                        <label for="name"> Name </label>
                        <input type="text" name="name" class="form-control" value="<?php echo $rows['name'] ?>">
                    </div>

                    <div>
                        <label for="email"> Email </label>
                        <input type="email" name="email" class="form-control" value="<?php echo $rows['email'] ?>">
                    </div>
                    <div>
                        <label for="phone"> Phone </label>
                        <input type="number" name="phone" class="form-control" value="<?php echo $rows['phone'] ?>">
                    </div>
            </div>
            <div class="modal-footer">
                <button href="registereduser.php" type="submit" class="btn btn-danger">Close</button>
                <button type="submit" name="adduser" class="btn btn-success">Update Details</button>
            </div>
            </form>
            </div>
            <?php
    }
}
include('includes/footer.php');
?>
</body>

</html>