<?php
include('admin/includes/header.php');
include('admin/includes/sidebar.php');
include('admin/includes/topbar.php');
include('config.php');

$user_id = $_GET['id'];
$getid = "SELECT * from `Product` where id ='$user_id'";
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
    <title>Update Products</title>
</head>

<body>

    <div class="container-fluid">

        <!-- Outer Row -->
        <div class="justify-content-center">
                <h2>Update Products</h2>
                <hr>
                <div class="row justify-content-center">
                <form action="updateproductsdetail.php" method="POST" enctype="multipart/form-data" class="form-group user">
                <input type="hidden" name="id" class="form-control" value="<?php echo $rows['id'] ?>">
                <div class="col-sm-12">
                    <label for="pname"> Product Name </label>
                    <input type="text" name="pname" class="form-control" value="<?php echo $rows['pname'] ?>">
                </div>
                
                <div class="col-sm-12">
                    <label style="margin-top: 20px;" for="floatingTextarea">Description</label>
                    <textarea name="pdescription" class="form-control col-md-12" placeholder="Leave a comment here" id="floatingTextarea"><?php echo $rows['pdescription'] ?></textarea>
                </div>
                
                <div class="col-sm-12">
                    <label for="price"> Price </label>
                    <input type="text" name="price" class="form-control" value="<?php echo $rows['price'] ?>">
                </div>
                
                <div class="col-sm-12">
                    <label for="image"> Image </label>
                    <input type="file" name="pimage" class="form-control" value= "<?php echo $rows['pimage']; ?>">
                </div>
                
                <input type="submit" style="margin-top: 20px;" class="btn btn-primary btn-user btn-block" name="addproducts">
            
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