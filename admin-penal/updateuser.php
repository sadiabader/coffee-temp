<?php
include('admin/includes/header.php');
include('admin/includes/sidebar.php');
include('admin/includes/topbar.php');
include('config.php');

$user_id = $_GET['id'];
$getid = "SELECT * from `register-user` where id ='$user_id'";
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
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Update User Detail</title>
        </head>

        <body>

            <div class="container">

                <!-- Outer Row -->
                <div class="row justify-content-center">

                    <div class="col-xl-10 col-lg-12 col-md-9">
                        <h2>Update User Detail</h2>
                        <hr>
                        <form class="register" action="updatedetail.php" method="POST">
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="hidden" class="form-control form-control-user" id="exampleFirstName"
                                        placeholder="First Name" name="id" value="<?php echo $rows['id'] ?>">
                                    <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                        placeholder="First Name" name="FirstName" value="<?php echo $rows['fname'] ?>">
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control form-control-user" id="exampleLastName"
                                        placeholder="Last Name" name="LastName" value="<?php echo $rows['lname'] ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                                    placeholder="Email Address" name="email" value="<?php echo $rows['email'] ?>">
                            </div>
                    </div>
                    <input type="submit" class="btn btn-primary btn-user btn-block" name="register">

                    </form>

                </div>
                <?php
    }
}
?>

    </div>

    </div>


</body>

</html>










<?php
include('admin/includes/footer.php');
?>