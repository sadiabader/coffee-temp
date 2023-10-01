<?php
include('admin/includes/header.php');
include('admin/includes/sidebar.php');
include('admin/includes/topbar.php');
include('config.php');

if(isset($_POST['addproduct'])){
    $pname = $_POST['pname'];
    $pcat = $_POST['pcategory'];
    $pdesc = $_POST['pdescription'];
    $price = $_POST['price'];
    $pimage = $_FILES['pimage']['name'];
    $pimage_tmp = $_FILES['pimage']['tmp_name'];
    $pimage_size = $_FILES['pimage']['size'];
   


    $product = "SELECT * from product where pname = '$pname'";
    $results = mysqli_query($conn, $product);
    if (mysqli_num_rows($results) > 0) {
        echo "<script> alert('Product already exist'); </script>";
    } else {
        $insert = "INSERT INTO `product` (`pname`, `pcategory`, `pdescription`, `price`, `pimage`)
         VALUES ('$pname', '$pcat', '$pdesc', '$price', '$pimage')";
        $connection_check = mysqli_query($conn, $insert);
        move_uploaded_file($pimage_tmp, 'img/' . $pimage);
        if($connection_check){
            echo "<script> alert('Product added successfully'); </script>";

        }
    }


}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Products</title>
</head>

<body>

    <div class="container">

        <!-- Outer Row -->
        <div class="justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">
                <h2>Add Products</h2>
                <hr>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data" class="form-group user">
            <div class="row">
                <div class="col-sm-6">
                <label for="pname"> Product Name </label>
                <input type="text" name="pname" class="form-control">
                </div>
            <div class="col-md-6">
                  <label for="Category"> Category </label>
                  <br>
                <?php
                $products = "SELECT * from category";
                $result1 = mysqli_query($conn, $products);
                if(mysqli_num_rows($result1) > 0) {
        ?>
                <select class="form-select col-md-12" name="pcategory" aria-label="Default select example">
                    <option selected>Select Category</option>
                    <?php
                    while($row = mysqli_fetch_assoc($result1)){
                    ?>
                    <option value="<?php echo $row['id']?>"><?php echo  $row['name']?></option>
                    <?php
                    }  
                    }                
                    ?>
                </select>
                </div>
                <label for="floatingTextarea">Description</label>
                <textarea name="pdescription" class="form-control col-md-12" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
        
                <label for="price"> Price </label>
                <input type="text" name="price" class="form-control">

                <label for="image"> Image </label>
                <input type="file" name="pimage" class="form-control">
                
                <input type="submit" style="margin-top: 20px;" class="btn btn-primary btn-user btn-block" name="addproduct">
            
</form>
        </div>
        </div>
    </div>
    </div>
</body>
</html>
<?php
include('admin/includes/footer.php');
?>