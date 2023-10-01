<?php
include('admin/includes/header.php');
include('admin/includes/sidebar.php');
include('admin/includes/topbar.php');
include('config.php');
$user_id = $_GET['id'];
$getid = "SELECT * from `category` where id ='$user_id'";
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
            <title>Update Category</title>
        </head>

        <body>

            <div class="container">

                <!-- Outer Row -->
                <div class="row justify-content-center">

                    <div class="col-xl-10 col-lg-12 col-md-9">
                        <h2>Update Category</h2>
                        <hr>
                        <form class="user" action="updatedetailscat.php" method="POST">
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="hidden" class="form-control form-control-user" id="exampleFirstName"
                                        placeholder="id" name="id" value="<?php echo $rows['id'] ?>">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                        placeholder="Category Name" name="name" value="<?php echo $rows['name'] ?>">
                                </div>
                                <div class="col-sm-6">
                                    <label for="type">Type</label>
                                    <input type="text" class="form-control form-control-user" id="exampleLastName"
                                        placeholder="Category Type" name="type" value="<?php echo $rows['type'] ?>">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <label for="floatingTextarea">Comments</label>
                                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea"
                                    name="description"><?php echo $rows['description'] ?></textarea>
                            </div>
                            <br>
                            <input type="submit" class="btn btn-primary btn-user btn-block" name="category">

                        </form>

                    </div>

                </div>

            </div>
            <?php
    }
}
?>

</body>

</html>










<?php
include('admin/includes/footer.php');


?>