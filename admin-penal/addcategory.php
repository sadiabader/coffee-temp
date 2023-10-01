<?php
include('admin/includes/header.php');
include('admin/includes/sidebar.php');
include('admin/includes/topbar.php');
include('config.php');



if (isset($_POST["addcategory"])) {
    $Cid = $_POST['id'];
    $Cname = $_POST['name'];
    $Ctype = $_POST['type'];
    $Cdescription = $_POST['description'];
    $Cstatus = $_POST['status'];

    $Cat_check = "SELECT * from `category` where name = '$Cname'";
    $result = mysqli_query($conn, $Cat_check);
    if (mysqli_num_rows($result) > 0) {
        echo "<script> alert('Category already exist'); </script>";
    } else {
        $insert_query = "INSERT INTO `category` (`id`,`name`, `type`, `description`, `status`) 
        VALUES ('$Cid','$Cname', '$Ctype', '$Cdescription', '$Cstatus')";
        $connection_insert = mysqli_query($conn, $insert_query);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Category</title>
</head>

<body>

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">
                <h2>Add Category</h2>
                <hr>
                <form class="user" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="hidden" class="form-control form-control-user" id="exampleFirstName" name="id">
                            <label for="name">Name</label>
                            <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                placeholder="Category Name" name="name" required>
                        </div>
                        <div class="col-sm-6">
                            <label for="type">Type</label>
                            <input type="text" class="form-control form-control-user" id="exampleLastName"
                                placeholder="Category Type" name="type" required>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <label for="floatingTextarea">Description</label>
                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea"
                            name="description"></textarea>
                    </div>
                    <br>
                    <div>
                        <select class="form-control col-sm-11 form-select center" style="margin: 0 auto 0 auto;"
                            name="status" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            <option value="1">Active</option>
                            <option value="0">Deactive</option>
                        </select>
                    </div>
                    <br>
                    <input type="submit" class="btn btn-primary btn-user btn-block" name="addcategory">

                </form>

            </div>

        </div>

    </div>


</body>

</html>










<?php
include('admin/includes/footer.php');


?>